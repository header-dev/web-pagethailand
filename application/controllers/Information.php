<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Information extends CI_Controller
{
    
    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('member_id') == null) {
            redirect('authen/login', 'refresh');
            exit();
        }
        
        $this->load->library('upload');
        if ($this->session->userdata('lang') == null) {
            $lang = 'english';
        } 
        else {
            $lang = $this->session->userdata('lang');
        }
        $this->lang->load($lang, $lang);
        
        $this->load->model('About_model');
        $this->load->model('Contact_model');
    }
    
    public function about() {
        $data['data'] = $this->About_model->getallabout();
        $this->load->view('about/index', $data);
    }
    
    public function addabout() {
        $this->load->view('about/add');
    }
    
    public function saveabout() {
        
        $input = $this->input->post();
        $config = array();
        $config['upload_path'] = "assets/images/about/thumbnail";
        $config['allowed_types'] = "*";
        $config['max_size'] = 50000;
        $config['max_width'] = 2000;
        $config['max_height'] = 3000;
        
        $this->upload->initialize($config);
        
        if ($this->upload->do_upload("thumbnail")) {
            $data = $this->upload->data();
            $newName = date("YmdHis") . $data['file_ext'];
            rename($data['full_path'], $data['file_path'] . $newName);
            $config['image_library'] = 'gd2';
            $config['source_image'] = $this->upload->upload_path . $newName;
            $config['maintain_ratio'] = TRUE;
            $config['width'] = 750;
            $config['height'] = 450;
            $this->load->library('image_lib', $config);
            
            if ($this->image_lib->resize()) {
                $input['thumbnail'] = $newName;
                $rs = $this->About_model->saveabout($input);
                
                if ($rs) {
                    $this->session->set_flashdata('message', "<b>Save 'About' success.</b>");
                } 
                else {
                    unlink($newName);
                    unlink($data['full_path']);
                    $this->session->set_flashdata('error', "<b>Can't save 'About'</b><p>you're looking the data input.</p>");
                }
            } 
            else {
                unlink($data['full_path']);
                $this->session->set_flashdata('error', $this->image_lib->display_errors());
            }
        } 
        else {
            $this->session->set_flashdata('error', $this->upload->display_errors());
        }
        redirect('information/addabout', 'refresh');
    }
    
    public function editabout() {
        $rs['data'] = $this->About_model->getaboutbyid($this->input->get('about_id'));
        $this->load->view('about/edit', $rs);
    }
    
    public function saveeditabout() {
        $input = $this->input->post();
        if ($_FILES['thumbnail']['name'] != "") {
            
            $config = array();
            $config['upload_path'] = "assets/images/about/thumbnail";
            $config['allowed_types'] = "*";
            $config['max_size'] = 50000;
            $config['max_width'] = 2000;
            $config['max_height'] = 3000;
            
            $this->upload->initialize($config);
            
            if ($this->upload->do_upload("thumbnail")) {
                $data = $this->upload->data();
                $newName = date("YmdHis") . $data['file_ext'];
                rename($data['full_path'], $data['file_path'] . $newName);
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload->upload_path . $newName;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 750;
                $config['height'] = 450;
                $this->load->library('image_lib', $config);
                
                if ($this->image_lib->resize()) {
                    $input['thumbnail'] = $newName;
                    $rs = $this->About_model->updateabout($input);
                    if ($rs) {
                        $this->session->set_flashdata('message', "<b>Update 'about' success.</b>");
                    } 
                    else {
                        unlink($newName);
                        unlink($data['full_path']);
                        $this->session->set_flashdata('error', "<b>Can't update 'about'</b><p>you're looking the data input.</p>");
                    }
                } 
                else {
                    unlink($data['full_path']);
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                }
            } 
            else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
        } 
        else {
            $rs = $this->About_model->updateabout($input);
            if ($rs) {
                $this->session->set_flashdata('message', "<b>Update 'about' success.</b>");
            } 
            else {
                $this->session->set_flashdata('error', "<b>Can't update 'about'</b><p>you're looking the data input.</p>");
            }
        }
        redirect('information/about', 'refresh');
    }
    
    public function deleteabout() {
        $this->About_model->deleteabout($this->input->get('about_id'));
        redirect('information/about', 'refresh');
    }
    
    public function contact() {
        $data['data'] = $this->Contact_model->getcontact();
        $this->load->view('contact/index', $data);
    }
    
    public function savecontact() {
        if (empty($this->input->post('contact_id'))) {
            $input = $this->input->post();
            $config = array();
            $config['upload_path'] = "assets/images/map";
            $config['allowed_types'] = "*";
            $config['max_size'] = 50000;
            $config['max_width'] = 2000;
            $config['max_height'] = 3000;

            $this->upload->initialize($config);

            if ($this->upload->do_upload("image_map")) {
                $data = $this->upload->data();
                $newName = date("YmdHis") . $data['file_ext'];
                rename($data['full_path'], $data['file_path'] . $newName);
                $config['image_library'] = 'gd2';
                $config['source_image'] = $this->upload->upload_path . $newName;
                $config['maintain_ratio'] = TRUE;
                $config['width'] = 780;
                $config['height'] = 480;
                $this->load->library('image_lib', $config);
                if ($this->image_lib->resize()) {
                    $input['image_map'] = $newName;
                    $rs = $this->Contact_model->savecontact($input);
                    if ($rs) {
                        $this->session->set_flashdata('message', "<b>Save 'Contact' success.</b>");
                    } 
                    else {
                        unlink($newName);
                        unlink($data['full_path']);
                        $this->session->set_flashdata('error', "<b>Can't save 'Contact'</b><p>you're looking the data input.</p>");
                    }
                } 
                else {
                    unlink($data['full_path']);
                    $this->session->set_flashdata('error', $this->image_lib->display_errors());
                }
            }
            else {
                $this->session->set_flashdata('error', $this->upload->display_errors());
            }
            redirect('information/contact', 'refresh');

        }else{

            $input = $this->input->post();

            if ($_FILES['image_map']['name'] != "") {

                $config = array();
                $config['upload_path'] = "assets/images/map";
                $config['allowed_types'] = "*";
                $config['max_size'] = 50000;
                $config['max_width'] = 2000;
                $config['max_height'] = 3000;

                $this->upload->initialize($config);

                if ($this->upload->do_upload("image_map")) {
                    $data = $this->upload->data();
                    $newName = date("YmdHis") . $data['file_ext'];
                    rename($data['full_path'], $data['file_path'] . $newName);
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $this->upload->upload_path . $newName;
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 780;
                    $config['height'] = 480;
                    $this->load->library('image_lib', $config);

                    if ($this->image_lib->resize()) {
                        $input['image_map'] = $newName;
                        $rs = $this->Contact_model->updatecontact($input);

                        if ($rs) {
                            $this->session->set_flashdata('message', "<b>Update 'Contact' success.</b>");
                        }
                        else {
                            unlink($newName);
                            unlink($data['full_path']);
                            $this->session->set_flashdata('error', "<b>Can't update 'Contact'</b><p>you're looking the data input.</p>");
                        }
                    }
                    else {
                        unlink($data['full_path']);
                        $this->session->set_flashdata('error', $this->image_lib->display_errors());
                    }
                }
                else {
                    $this->session->set_flashdata('error', $this->upload->display_errors());
                }
            }
            else {
                $rs = $this->Contact_model->updatecontact($input);
                if ($rs) {
                    $this->session->set_flashdata('message', "<b>Update 'Contact' success.</b>");
                }
                else {
                    $this->session->set_flashdata('error', "<b>Can't update 'Contact'</b><p>you're looking the data input.</p>");
                }
            }
            redirect('information/contact', 'refresh');
        }
    }
}

/* End of file Information.php */

/* Location: ./application/controllers/Information.php */

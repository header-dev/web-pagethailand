<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Front extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        if ($this->session->userdata('lang') == null) {
            $lang = 'english';
            $this->session->set_userdata('lang', $lang);
        } else {
            $lang = $this->session->userdata('lang');
        }
        $this->lang->load($lang, $lang);
        $this->load->model('Front_model');
        // $this->load->model('LanguageModel');

        // $data['lang'] = $this->LanguageModel->getLang();
        $data['contacts'] = $this->Front_model->getcontact();
        $data['products'] = $this->Front_model->getproduct();
        $data['services'] = $this->Front_model->getservice();
        $data['language'] = $this->Language_model->getLang();
        
        // $this->load->view('temp_front/header');
        // $this->load->view('temp_front/menu_top', $data);

        $this->load->view('layouts_front/header');
        $this->load->view('layouts_front/navigation',$data);

        $this->load->library('pagination');

    }
    public function index()
    {

        //pagination settings
        $config['base_url']    = site_url('front/index');
        $config['total_rows']  = $this->db->count_all('tb_news', array('active' => 1));
        $config['per_page']    = "2";
        $config["uri_segment"] = 3;
        $choice                = $config["total_rows"] / $config["per_page"];
        $config["num_links"]   = floor($choice);

        //config for bootstrap pagination class integration
        $config['full_tag_open']   = '<ul class="pagination">';
        $config['full_tag_close']  = '</ul>';
        $config['first_link']      = false;
        $config['last_link']       = false;
        $config['first_tag_open']  = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link']       = '&laquo';
        $config['prev_tag_open']   = '<li class="prev">';
        $config['prev_tag_close']  = '</li>';
        $config['next_link']       = '&raquo';
        $config['next_tag_open']   = '<li>';
        $config['next_tag_close']  = '</li>';
        $config['last_tag_open']   = '<li>';
        $config['last_tag_close']  = '</li>';
        $config['cur_tag_open']    = '<li class="active"><a href="#">';
        $config['cur_tag_close']   = '</a></li>';
        $config['num_tag_open']    = '<li>';
        $config['num_tag_close']   = '</li>';

        $this->pagination->initialize($config);

        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

        $data['slide']    = $this->Front_model->getslide();
        $data['products'] = $this->Front_model->getproduct();
        $data['services'] = $this->Front_model->getservice();
        $data['contacts'] = $this->Front_model->getcontact();
        $data['news']     = $this->Front_model->getallnews($config["per_page"], $data['page']);
        // print_r($this->Language_model->getLang());

        $data['pagination'] = $this->pagination->create_links();

        $this->load->view('frontend/index', $data);
    }

    public function change($type)
    {
        $this->session->set_userdata('lang', $type);
        // redirect('', 'refresh');
        redirect($this->uri->uri_string(),'refresh');
    }

    public function about_us()
    {

        $data['abouts']    = $this->Front_model->getabouts();
        $data['customers'] = $this->Front_model->getallcustomers();

        $data['contacts'] = $this->Front_model->getcontact();

        $this->load->view('frontend/about', $data);
    }

    public function contact_us()
    {
        $data['data'] = $this->Front_model->getcontact();
        $this->load->view('frontend/contact', $data);
    }

    public function sendmessage()
    {

        $this->load->helper('email');

        $this->load->library('email');

        $data = $this->Front_model->getcontact();

        $email = $this->input->post('email', true);

        $name = '';

        $name = $this->input->post('name');

        $phone = '';

        $phone = $this->input->post('phone');

        $message = $this->input->post('message');

        $subject = "siam-northeast.com Contact Form:  " . $name . " , Phone: " . $phone;

        if (valid_email($email)) {

            $this->email->from($email, $this->input->post('name'));
            $this->email->to($data[0]['email']);
            $this->email->subject($subject);
            $this->email->message($message);

            if (!$this->email->send()) {
                echo "Email not sent \n" . $this->email->print_debugger();
            }
            echo "Email was successfully sent to siam-northeast.com";
        } else {
            echo 'Fail';
        }
    }

    public function career()
    {
        $data['careers']  = $this->Front_model->getcareer();
        $data['contacts'] = $this->Front_model->getcontact();
        $this->load->view('front/career', $data);
    }

    public function viewproduct()
    {
        $data['products'] = $this->Front_model->getproductbyid($this->input->get('product_id'));
        $data['imgs']     = $this->Front_model->getimagebyid($this->input->get('product_id'));
        $data['contacts'] = $this->Front_model->getcontact();
        $this->load->view('front/view_product', $data);
    }

    public function viewservice()
    {
        $data['services'] = $this->Front_model->getservicebyid($this->input->get('service_id'));
        $data['imgs']     = $this->Front_model->getimageservicebyid($this->input->get('service_id'));
        $data['contacts'] = $this->Front_model->getcontact();
        $this->load->view('front/view_service', $data);
    }

    public function viewnews()
    {
        $data['news']     = $this->Front_model->getnewsbyid($this->input->get('news_id'));
        $data['contacts'] = $this->Front_model->getcontact();
        $this->load->view('front/view_news', $data);
    }
}

/* End of file Front.php */

/* Location: ./application/controllers/Front.php */

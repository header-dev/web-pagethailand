<?php
class Onload
{
    private $ci;

    public function __construct() {
        $this->ci = & get_instance();
        $this->$ci->load->helper('language');
        $this->$ci->load->library('session');
    }


    public function check_login() {

        $controller = $this->ci->router->class;
        $method = $this->ci->router->method;

        if ($this->ci->session->userdata('member_id') == null) {
            if ($method != 'login') {
                redirect('authen/login', 'refresh');
                exit();
            }
        }else {
            if ($method == 'login') {
                redirect('administrator', 'refresh');
                exit();
            }
        }
    }
}
?>
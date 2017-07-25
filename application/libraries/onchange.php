<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Onchange
{

	private $ci;

    public function __construct() {
        $this->ci = & get_instance();
    }

    public function post_lang(){
        $controller = $this->ci->router->class;
        $method = $this->ci->router->method;
        $now = $controller.'/'.$method;
        $this->ci->session->set_flashdata('now',$now);
    }

}

/* End of file onchange.php */
/* Location: ./application/libraries/onchange.php */

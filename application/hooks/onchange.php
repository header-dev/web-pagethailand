<?php
class OnChange
{
    private $ci;

    public function __construct() {
        $this->ci = & get_instance();
    }

    public function post_change(){
        $controller = $this->ci->router->class;
        $method = $this->ci->router->method;
        $now = $controller.'/'.$method;
        $this->ci->session->set_flashdata('now',$now);
    }
}
?>
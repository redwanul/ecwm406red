<?php
class Auth extends CI_Controller {
 
    function __construct()
    {
        parent::__construct();
        $this->load->library('authlib');
        $this->load->helper('url');
    }
 public function index()
{
    redirect('/auth/login'); // url helper function
}

	
 public function login()
{
    $data['errmsg'] = '';
    $this->load->view('login_view',$data);
}
 
public function authenticate()
{
    $username = $this->input->post('uname');
    $password = $this->input->post('pword');
    $user = $this->authlib->login($username,$password);

    if ($user !== false) {
        $sessiondata = array('is_logged_in' => 'is_logged_in');
        $this->session->set_userdata($sessiondata);
        redirect('/hr/');
    }
    else {
        $data['errmsg'] = 'Unable to login - please try again';
        $this->load->view('login_view',$data);
    }
}
    function logout()
    {
        $this->session->sess_destroy();
           redirect('/hr');
              }

}

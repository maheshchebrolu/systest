<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_contrler extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	
	var $usrSessDat;
	
	function __construct()
	{
		parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
        
        $this->load->model('common');
    }
    
	public function index()
	{
		if($this->session->userdata('id'))
		{
			$this->showHome();
		}else{
			$this->load->view('head');
			$this->load->view('login');
		}
	}
	
	public function showHome()
	{
		$this->load->view('head');
		$this->load->view('home');
	}
	
	public function loginChk()
	{
		$out	=	$this->common->chkLogin($this->input->post(NULL, TRUE));
		if(count($out) > 0)
		{
			foreach($out as $rw)
			{
				$usrSessDat['id'] 				= $rw->id;
				$usrSessDat['email'] 			= $rw->email;
			}
			$this->session->set_userdata($usrSessDat);
			if($this->session->userdata('id')){
				echo 'loggedin';
			}
		}else{
			echo 'fail';
		}
	}
	
	public function usrSignout()
	{
		$this->session->sess_destroy();
		redirect(base_url(), 'refresh');
	}
}
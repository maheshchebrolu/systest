<?php
class Common extends CI_Model {
		public function __construct()
        {
        	parent::__construct();
            $this->load->database();
        }
        
        public function chkLogin($postInput){
        	$lquery	=	$this->db->query("SELECT * FROM tbl_user
        					 			WHERE email = '".$postInput['usrnme']."' AND password = '".$postInput['pwd']."'");
        	return $lquery->result();
        }
}
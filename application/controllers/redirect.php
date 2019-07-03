<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Redirect extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('session');
		if(!$this->session->userdata('logged_in')){
            echo "
                <script>alert('Maaf, akses tidak diijinkan.')</script>
                <script>window.location='".base_url()."login'</script>
            ";
        }

        if($this->session->userdata('user_role') == '1'){
            echo "
                <script>window.location='".base_url()."home_rt'</script>
            ";
        }

        if($this->session->userdata('user_role') == '2'){
            echo "
                <script>window.location='".base_url()."home_lurah'</script>
            ";
        }

        if($this->session->userdata('user_role') == '3'){
            echo "
                <script>window.location='".base_url()."admin'</script>
            ";
        }

        if($this->session->userdata('user_role') == '4'){
            echo "
                <script>window.location='".base_url()."home_rw'</script>
            ";
        }
	}
}
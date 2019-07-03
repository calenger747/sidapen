<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('m_sidapen');
    }

    function index(){
        $data['title'] = 'SIDAPEN &minus; Sistem Data Penduduk';
        $this->load->view('v_login', $data);
    }
    
    function masuk(){
        $user = $this->input->post('user_name');
        $pass = $this->input->post('user_password');

        $cek = $this->m_sidapen->cek_user($user, $pass);

        if($cek->num_rows() == 1){
            foreach($cek->result() as $sess)
            {
                $sess_data['user_id'] = $sess->user_id;
                $sess_data['user_name'] = $sess->user_name;
                $sess_data['user_nama'] = $sess->user_nama;
                $sess_data['user_role'] = $sess->user_role;
                $sess_data['rt'] = $sess->rt;
                $sess_data['rw'] = $sess->rw;
                $sess_data['logged_in'] = 'logged_in';
                $this->session->set_userdata($sess_data);
            }
            if ($sess->user_role == '1'){
                redirect('home_rt');
            }
            elseif ($sess->user_role == '2'){
                redirect('home_lurah');
            }
            elseif ($sess->user_role == '3'){
                redirect('admin');
            }
            elseif ($sess->user_role == '4'){
                redirect('home_rw');
            }

        }else{
            $this->session->set_flashdata('pesan', 'Maaf, kombinasi username dan password salah. Ulangi kembali.');
            redirect('login');
        }
    }
}
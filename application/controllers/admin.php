<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Admin extends CI_Controller{
	public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->model('m_sidapen');
        if(!$this->session->userdata('logged_in')){
            echo "
                <script>alert('Maaf, akses tidak diijinkan. Login terlebih dahulu.')</script>
                <script>window.location='/sidapen/index.php/login'</script>
            ";
        }

        if($this->session->userdata('user_role') != '3'){
            echo "
                <script>alert('Maaf, akses tidak diijinkan. Bukan administrator.')</script>
                <script>window.location='/sidapen/index.php/redirect'</script>
            ";
        }
    }

    function index(){
        $data['title'] = "Administrator &minus; SIDAPEN";
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rt'] = $this->m_sidapen->rt_hari()->result();
        $data['lurah'] = $this->m_sidapen->lurah_hari()->result();
        $data['penduduk_hari'] = $this->m_sidapen->data_penduduk_hari()->result();
    	$this->load->view('v_admin', $data);
    }

    function data_penduduk(){
        $data['title'] = 'Data Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['penduduk'] = $this->m_sidapen->data_penduduk()->result();
        $this->load->view('v_admin_lihat_data_penduduk', $data);
    }

    function data_penduduk_sementara(){
        $data['title'] = 'Data Penduduk Sementara &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['penduduk'] = $this->m_sidapen->data_penduduk_sementara()->result();
        $this->load->view('v_admin_lihat_data_penduduk_sementara', $data);
    }

    function data_kk(){
        $data['title'] = 'Data Kepala Keluarga &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['kk'] = $this->m_sidapen->data_kk()->result();

        $this->load->view('v_admin_kk', $data);
    }

    function data_statistik(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jml'] = $this->m_sidapen->data_penduduk()->num_rows();
        $data['jml_sementara'] = $this->m_sidapen->data_penduduk_sementara()->num_rows();
        $data['jml_rt'] = $this->m_sidapen->jumlah_rt()->num_rows();
        $data['jml_lurah'] = $this->m_sidapen->jumlah_lurah()->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk()->num_rows();

        $this->load->view('v_admin_statistik', $data);
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function profil(){
        $user_id = $this->session->userdata('user_id');
        $data['title'] = 'Profil User  &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['profil'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_admin_profil', $data);
    }

    function ubah_password(){
        $user_id = $this->session->userdata('user_id');
        $data['title'] = 'Ubah Password &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['profil'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_admin_ubah_password', $data);
    }

    function update_password(){
        $user_id = $this->input->post('user_id');
        $data = array('user_password' => $this->input->post('user_password'));

        $update = $this->m_sidapen->update_password($user_id, $data);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Password berhasil diubah.');
            redirect('admin/ubah_password');
        }else{
            $this->session->set_flashdata('pesan', 'Maaf, ada kesalahan. Password gagal diubah.');
            redirect('admin/ubah_password');
        }
    }

    function input_data(){
        $data['title'] = 'Input Data Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jenis_kelamin'] = $this->m_sidapen->jenis_kelamin();
        $data['pendidikan'] = $this->m_sidapen->pendidikan();
        $data['status_pernikahan'] = $this->m_sidapen->status_pernikahan();
        $data['status_sosial'] = $this->m_sidapen->status_sosial();
        $data['status_keluarga'] = $this->m_sidapen->status_keluarga();
        $data['agama'] = $this->m_sidapen->agama();
        $this->load->view('v_admin_input_data_penduduk', $data);
    }

    function data_input(){
        $kk = array(
                'kk_nama' => $this->input->post('kk_nama'),
                'kki' => $this->input->post('kki'),
                'kk_provinsi' => $this->input->post('kk_provinsi'),
                'kk_kab' => $this->input->post('kk_kab'),
                'kk_kec' => $this->input->post('kk_kec'),
                'kk_kel' => $this->input->post('kk_kel'),
                'kk_rw' => $this->input->post('kk_rw'),
                'kk_rt' => $this->input->post('kk_rt'),
                'kk_jalan' => $this->input->post('kk_jalan'),
                'kk_komplek' => $this->input->post('kk_komplek')
            );

        $simpan_kk = $this->m_sidapen->simpan_kk($kk);
        $id_kk = $this->db->insert_id();

        $km = array(
                'id_kk' => $id_kk,
                'ada_meninggal' => $this->input->post('ada_meninggal'),
                'umur_saat_meninggal' => $this->input->post('umur_saat_meninggal'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin_km'),
                'ibu_meninggal' => $this->input->post('ibu_meninggal')
            );

        $simpan_km = $this->m_sidapen->simpan_km($km);

        $ksb = array(
                'id_kk' => $id_kk,
                'jamkesnas' => $this->input->post('jamkesnas'),
                'metode_kb' => $this->input->post('metode_kb'),
                'sebab_non_kb' => $this->input->post('sebab_non_kb'),
                'kapan_kb' => $this->input->post('kapan_kb'),
                'tempat_kb' => $this->input->post('tempat_kb'),
                'ikut_posyandu' => $this->input->post('ikut_posyandu'),
                'ikut_bkb' => $this->input->post('ikut_bkb'),
                'remaja_bkr' => $this->input->post('remaja_bkr'),
                'remaja_pik' => $this->input->post('remaja_pik'),
                'lansia_bkl' => $this->input->post('lansia_bkl')
            );

        $simpan_ksb = $this->m_sidapen->simpan_ksb($ksb);

        $ks = array(
                'id_kk' => $id_kk,
                'status_tahapan' => $this->input->post('status_tahapan'),
                'alasan' => $this->input->post('alasan'),
                'fasilitas_kakus' => $this->input->post('fasilitas_kakus'),
                'fasilitas_listrik' => $this->input->post('fasilitas_listrik'),
                'fasilitas_airminum' => $this->input->post('fasilitas_airminum'),
                'fasilitas_memasak' => $this->input->post('fasilitas_memasak')
            );

        $simpan_ks = $this->m_sidapen->simpan_ks($ks);

        $kgm = array(
                'id_kk' => $id_kk,
                'dapat_modal' => $this->input->post('dapat_modal'),
                'ikut_uppks' => $this->input->post('ikut_uppks')
            );

        $simpan_kgm = $this->m_sidapen->simpan_kgm($kgm);

        $tgl_lahir = $this->input->post('tgl_lahir');
        $id_status = $this->input->post('id_status');
        $nik = $this->input->post('no_penduduk');
        $nama = $this->input->post('nama');
        $jenis_kelamin = $this->input->post('jenis_kelamin');
        $tmpt_lahir = $this->input->post('tmpt_lahir');
        $agama = $this->input->post('agama');
        $akte = $this->input->post('akte');
        $rt = $this->input->post('kk_rt');
        $rw = $this->input->post('kk_rw');
        $status_pendidikan = $this->input->post('status_pendidikan');
        $status_keluarga = $this->input->post('status_keluarga');
        $pekerjaan = $this->input->post('pekerjaan');
        $status_pernikahan = $this->input->post('status_pernikahan');
        $usia_kawin_pertama = $this->input->post('usia_kawin_pertama');
        $tempat_tinggal = $this->input->post('tempat_tinggal');
        $tgl_input = $this->input->post('tanggal_input_ik');

        if(is_array($nama)){
            foreach($nama as $d){
                $array3[] = $d;
            }
        }

        $count_nama = count($nama);

                for($i=0; $i<$count_nama; $i++){
                    $penduduk[$i] = array(
                        'id_kk' => $id_kk,
                        'id_status_penduduk' => $id_status[$i],
                        'nama' => $nama[$i],
                        'no_penduduk' => $nik[$i],
                        'tmpt_lahir' => $tmpt_lahir[$i],
                        'tgl_lahir' => $tgl_lahir[$i],
                        'rt' => $rt,
                        'rw' => $rw,
                        'jenis_kelamin' => $jenis_kelamin[$i],
                        'agama' => $agama[$i],
                        'pendidikan' => $status_pendidikan[$i],
                        'status_pernikahan' => $status_pernikahan[$i],
                        'pekerjaan' => $pekerjaan[$i],
                        'status_dalam_keluarga' => $status_keluarga[$i],
                        'tanggal_input' => $tgl_input[$i],
                        'akte' => $akte[$i],
                        'usia_kawin_pertama' => $usia_kawin_pertama[$i],
                        'tempat_tinggal' => $tempat_tinggal[$i]
                    );
                }

        $cek_no_penduduk = $this->m_sidapen->cek_nopen($nik, $count_nama);

        if($simpan_kk){
            if($cek_no_penduduk->num_rows() > 0){
                $this->m_sidapen->hapus_data_id_kk($id_kk);
                echo "<script>alert('Gagal menyimpan data. Nomor penduduk sudah ada di database.')</script>";
                echo "<script>window.history.back()</script>";
            }else{
                $simpan_ik = $this->m_sidapen->simpan_ik($penduduk);
                $this->session->set_flashdata('pesan', 'Data berhasil disimpan.');
                redirect('admin/input_data');
            }
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan. No. Penduduk sudah ada.');
        }
    }

    function edit_penduduk(){
        //$data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        //$data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $id_penduduk = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_penduduk($id_penduduk);
        $data['jenis_kelamin'] = $this->m_sidapen->jenis_kelamin();
        $data['pendidikan'] = $this->m_sidapen->pendidikan();
        $data['status_pernikahan'] = $this->m_sidapen->status_pernikahan();
        $data['status_keluarga'] = $this->m_sidapen->status_keluarga();
        $data['agama'] = $this->m_sidapen->agama();
        $this->load->view('v_admin_edit_penduduk', $data);
    }

    function update_penduduk(){
        $id_penduduk = $this->input->post('id_penduduk');
        $no_penduduk = $this->input->post('no_penduduk');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $interval = date_diff(date_create(), date_create($tgl_lahir));

        $data = array(
            'id_status_penduduk' => $this->input->post('id_status_penduduk'),
            'nama' => $this->input->post('nama'),
            'no_penduduk' => $this->input->post('no_penduduk'),
            'tmpt_lahir' => $this->input->post('tmpt_lahir'),
            'tgl_lahir' => $this->input->post('tgl_lahir'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'agama' => $this->input->post('agama'),
            'pendidikan' => $this->input->post('pendidikan'),
            'status_pernikahan' => $this->input->post('status_pernikahan'),
            'pekerjaan' => $this->input->post('pekerjaan'),
            'status_dalam_keluarga' => $this->input->post('status_keluarga'),
            'tempat_tinggal' => $this->input->post('tempat_tinggal')
        );
       
        $cek_nopen = $this->m_sidapen->cek_nopen_id($no_penduduk)->result();
        
        foreach($cek_nopen as $cp){
            if($cp->no_penduduk == $no_penduduk){
                $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
                redirect('admin/edit_penduduk/'.$id_penduduk);
            }
        }

        $update = $this->m_sidapen->update_penduduk($data, $id_penduduk);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('admin/edit_penduduk/'.$id_penduduk);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('admin/edit_penduduk/'.$id_penduduk);
        }
    }

    function hapus_data(){
        $id_penduduk = $this->uri->segment(3);
        $hapus = $this->m_sidapen->hapus_data($id_penduduk);
        echo "<script>location.replace(document.referrer)</script>";
    }

    function hapus_data_kk(){
        $id_kk = $this->uri->segment(3);
        $hapus = $this->m_sidapen->hapus_data_kk($id_kk);
        echo "<script>location.replace(document.referrer)</script>";
    }

    function add_rt(){
        $tambah_rt = $this->m_sidapen->tambah_rt();
        if($tambah_rt){
            $this->session->set_flashdata('pesan', 'Daftar berhasil.');
            redirect('admin/tambah_rt');
        } else {
            $this->session->set_flashdata('pesan', 'Daftar gagal. RT sudah terdaftar.');
            redirect('admin/tambah_rt');
        }
    }

    function tambah_rt(){
        $data['title'] = 'Tambah User &raquo; RT &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $this->load->view('v_admin_tambah_rt', $data);
    }

    function lihat_rt(){
        $data['title'] = 'Lihat User &raquo; RT &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rt'] = $this->m_sidapen->lihat_rt()->result();
        $this->load->view('v_admin_lihat_rt', $data);
    }

    function hapus_rt($user_id){
        $this->m_sidapen->hapus_rt($user_id);
        redirect('admin/lihat_rt');
    }

    function hapus_rw($user_id){
        $this->m_sidapen->hapus_rw($user_id);
        redirect('admin/lihat_rw');
    }

    function tambah_rw(){
        $data['title'] = 'Tambah User &raquo; RW &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $this->load->view('v_admin_tambah_rw', $data);
    }

    function add_rw(){
        $user = $this->input->post('user_name');
        $rw = $this->input->post('rw');

        $data = array(
            'user_nama' => $this->input->post('user_nama'),
            'user_role' => $this->input->post('user_role'),
            'rw' => $this->input->post('rw'),
            'user_name' => $this->input->post('user_name'),
            'user_password' => $this->input->post('user_password'),
            'tanggal_input' => $this->input->post('tanggal_input')
        );

        $cek_rw = $this->m_sidapen->cek_rw($user, $rw);
        if($cek_rw->num_rows() > 0){
            $this->session->set_flashdata('pesan', 'Data gagal disimpan. Username atau RW sudah terdaftar.');
            redirect('admin/tambah_rw');
        }else{
            $this->m_sidapen->tambah_rw($data);
            $this->session->set_flashdata('pesan', 'Data berhasil disimpan.');
            redirect('admin/tambah_rw');
        }
    }

    function lihat_rw(){
        $data['title'] = 'Lihat User &raquo; RW &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rw'] = $this->m_sidapen->lihat_rw()->result();
        $this->load->view('v_admin_lihat_rw', $data);
    }


    function edit_kk(){
        $id_kk = $this->uri->segment(3);
        $data['title'] = 'Edit Kepala Keluarga &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_penduduk_kk($id_kk)->result();

        $this->load->view('v_admin_edit_kk', $data);
    }

    function edit_rt(){
        $user_id = $this->uri->segment(3);

        $data['title'] = 'Edit User &raquo; RT &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit_rt'] = $this->m_sidapen->lihat_user($user_id)->row();
        $this->load->view('v_admin_edit_rt', $data);
    }

    function edit_rw(){
        $user_id = $this->uri->segment(3);

        $data['title'] = 'Edit User &raquo; RW &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit_rw'] = $this->m_sidapen->lihat_user($user_id)->row();
        $this->load->view('v_admin_edit_rw', $data);
    }

    function update_kk(){
        $id_kk = $this->input->post('id_kk');
        $kki = $this->input->post('kki');
        $data = array(
            'id_status_penduduk' => $this->input->post('id_status_penduduk'),
            'kk_nama' => $this->input->post('nama'),
            'kki' => $this->input->post('kki'),
            'kk_provinsi' => $this->input->post('provinsi'),
            'kk_kab' => $this->input->post('kab'),
            'kk_kec' => $this->input->post('kec'),
            'kk_kel' => $this->input->post('kel'),
            'kk_rw' => $this->input->post('rw'),
            'kk_rt' => $this->input->post('rt'),
            'kk_jalan' => $this->input->post('jalan'),
            'kk_komplek' => $this->input->post('komplek')
        );

        $cek_kk = $this->m_sidapen->cek_kk($kki, $id_kk)->result();
        
        foreach($cek_kk as $ck){
            if($ck->kki == $kki){
                $this->session->set_flashdata('pesan', 'Data gagal disimpan. NIK sudah ada.');
                redirect('admin/edit_kk/'.$id_kk);
            }
        }

        $update = $this->m_sidapen->update_kk($data, $id_kk);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('admin/edit_kk/'.$id_kk);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('admin/edit_kk/'.$id_kk);
        }
    }

    function update_rt(){
        $user_id = $this->input->post('user_id');
        $user_name = $this->input->post('user_name');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $user_role = 1;
        $data = array(
            'user_nama' => $this->input->post('user_nama'),
            'user_name' => $this->input->post('user_name'),
            'user_password' => $this->input->post('user_password'),
            'rt' => $this->input->post('rt'),
            'rw' => $this->input->post('rw')
        );

        $cek_user_rt = $this->m_sidapen->cek_user_rt($user_id, $user_role, $rt, $rw)->result();
        foreach($cek_user_rt as $cur){
            if($cur->user_name == $user_name){
                $this->session->set_flashdata('pesan', 'Maaf, username sudah terdaftar. Update gagal.');
                redirect('admin/edit_rt/'.$user_id);
            }

            if(($cur->rt == $rt) AND ($cur->rw == $rw)){
                $this->session->set_flashdata('pesan', 'Maaf, RT dan RW sudah terdaftar. Update gagal.');
                redirect('admin/edit_rt/'.$user_id);
            }
        }

        $update = $this->m_sidapen->update_rt($user_id, $data);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Update berhasil.');
            redirect('admin/edit_rt/'.$user_id);
        }else{
            $this->session->set_flashdata('pesan', 'Maaf, ada kesalahan. Update gagal.');
            redirect('admin/edit_rt/'.$user_id);
        }
    }

    function update_rw(){
        $user_id = $this->input->post('user_id');
        $user = $this->input->post('user_name');
        $rw = $this->input->post('rw');

        $data = array(
            'user_nama' => $this->input->post('user_nama'),
            'user_role' => $this->input->post('user_role'),
            'rw' => $this->input->post('rw'),
            'user_name' => $this->input->post('user_name'),
            'user_password' => $this->input->post('user_password')
        );

        $cek_rw = $this->m_sidapen->cek_rw($user, $rw, $user_id);
        if($cek_rw->num_rows() > 0){
            $this->session->set_flashdata('pesan', 'Data gagal disimpan. Username atau RW sudah terdaftar.');
            redirect('admin/edit_rw/'.$user_id);
        }else{
            $this->m_sidapen->update_rw($user_id, $data);
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('admin/edit_rw/'.$user_id);
        }
    }

    function add_lurah(){
        $tambah_lurah = $this->m_sidapen->tambah_lurah();
        if($tambah_lurah){
            $this->session->set_flashdata('pesan', 'Daftar berhasil.');
            redirect('admin/tambah_lurah');
        } else {
            $this->session->set_flashdata('pesan', 'Daftar gagal. Username sudah terdaftar.');
            redirect('admin/tambah_lurah');
        }
    }

    function tambah_lurah(){
        $data['title'] = 'Tambah User &raquo; Lurah &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $this->load->view('v_admin_tambah_lurah', $data);
    }

    function lihat_lurah(){
        $data['title'] = 'Lihat User &raquo; Lurah &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['lurah'] = $this->m_sidapen->lihat_lurah()->result();
        $this->load->view('v_admin_lihat_lurah', $data);
    }

    function hapus_lurah($user_id){
        $this->m_sidapen->hapus_lurah($user_id);
        redirect('admin/lihat_lurah');
    }

    function edit_lurah(){
        $user_id = $this->uri->segment(3);

        $data['title'] = 'Edit User &raquo; Lurah &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit_lurah'] = $this->m_sidapen->lihat_user($user_id)->row();
        $this->load->view('v_admin_edit_lurah', $data);
    }

    function update_lurah(){
        $user_id = $this->input->post('user_id');
        $user_name = $this->input->post('user_name');
        $user_role = 2;
        $data = array(
            'user_nama' => $this->input->post('user_nama'),
            'user_name' => $this->input->post('user_name'),
            'user_password' => $this->input->post('user_password'),

        );

        $cek_user_lurah = $this->m_sidapen->cek_user_lurah($user_id, $user_role)->result();
        foreach($cek_user_lurah as $cel){
            if($cel->user_name == $user_name){
                $this->session->set_flashdata('pesan', 'Maaf, username sudah terdaftar. Update gagal.');
                redirect('admin/edit_lurah/'.$user_id);
            }
        }

        $update = $this->m_sidapen->update_lurah($user_id, $data);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Update berhasil.');
            redirect('admin/edit_lurah/'.$user_id);
        }else{
            $this->session->set_flashdata('pesan', 'Maaf, ada kesalahan. Update gagal.');
            redirect('admin/edit_lurah/'.$user_id);
        }
    }

    function lihat_detail(){
        $user_id = $this->uri->segment(3);
        $data['title'] = 'Lihat Detail &raquo; Lurah &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['detail'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_admin_lihat_user', $data);
    }

    function lihat_detail_kk(){
        $id_kk = $this->uri->segment(3);
        $data['title'] = 'Detail Kepala Keluarga &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['detail'] = $this->m_sidapen->lihat_detail_penduduk_kk($id_kk)->result();
        $this->load->view('v_admin_lihat_detail_kk', $data);
    }

    function lihat_detail_rt(){
        $user_id = $this->uri->segment(3);
        $data['title'] = 'Lihat Detail &raquo; RT &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['detail'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_admin_lihat_user_rt', $data);
    }

    function lihat_detail_rw(){
        $user_id = $this->uri->segment(3);
        $data['title'] = 'Lihat Detail &raquo; RW &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['detail'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_admin_lihat_user_rw', $data);
    }

    function lihat_detail_penduduk(){
        $id_penduduk = $this->uri->segment(3);
        $data['title'] = 'Detail Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['detail'] = $this->m_sidapen->lihat_detail_penduduk($id_penduduk);
        $this->load->view('v_admin_lihat_detail', $data);
    }

    function cari_penduduk(){
        $cari = $this->input->post('cari');
        $data['cari'] = $cari;
        $data['title'] = 'Hasil Pencarian &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['hasil'] = $this->m_sidapen->cari_penduduk($cari)->result();
        $this->load->view('v_admin_hasil_pencarian', $data);
    }

    function cari_rtrw(){
        $data['title'] = 'Pencarian Data &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $data['rt'] = $rt;
        $data['rw'] = $rw;
        $data['cari'] ='';
        $data['hasil'] = $this->m_sidapen->cari_rtrw($rt, $rw)->result();
        
        $this->load->view('v_admin_hasil_pencarian', $data);
    }

    function cetak_data_penduduk_hari(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Pemilu &minus; SIDAPEN';
        
        $jml = $this->m_sidapen->data_penduduk_hari()->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA PENDUDUK MASUK HARI INI ('.date('d'.'/'.'m'.'/'.'Y').')', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(1.3, 1, 'NO.', 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, 'NAMA', 1, '', 'C');
        $this->fpdf->Cell(2, 1, 'LK/PR', 1, '', 'C');
        $this->fpdf->Cell(4, 1, 'RT/RW', 1, '', 'C');
        $this->fpdf->Cell(3, 1, 'USIA', 1, '', 'C');
        $this->fpdf->Ln();

        $no = 1;

        foreach($jml as $p){
            $usia = date_diff(date_create(), date_create($p->tgl_lahir));

                $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(8.7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(4, 1, $p->rt.'/'.$p->rw, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
                $this->fpdf->Ln();
        }

        $this->fpdf->Output('DATA_PENDUDUK_HARI'.date('dmY'), 'I');
    }

    function pemilu(){
        $data['title'] = 'Data Pemilu &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rt'] = $this->input->get('rt');
        $data['rw'] = $this->input->get('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['tgl_pemilu'] = $this->input->get('tgl_pemilu');
        $data['penduduk'] = $this->m_sidapen->data_penduduk_rt2($rt, $rw)->result();

        $this->load->view('v_admin_pemilu', $data);
    }

    function cetak_data_pemilu(){
        $tgl_pemilu = $this->uri->segment(3);
        $rt = $this->uri->segment(4);
        $rw = $this->uri->segment(5);
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Pemilu &minus; SIDAPEN';

        $penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DAFTAR PENDUDUK PEMILU', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Cell('', .3, 'RT '.$rt.' RW '.$rw, 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(1.3, 1, 'NO.', 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, 'NAMA', 1, '', 'C');
        $this->fpdf->Cell(2, 1, 'LK/PR', 1, '', 'C');
        $this->fpdf->Cell(4, 1, 'TANGGAL LAHIR', 1, '', 'C');
        $this->fpdf->Cell(3, 1, 'USIA', 1, '', 'C');
        $this->fpdf->Ln();

        $no = 1;

        foreach($penduduk as $p){
            $usia = date_diff(date_create($tgl_pemilu), date_create($p->tgl_lahir));

            if(($p->status_pernikahan =='K') OR ($usia->format('%y tahun') >= '17 tahun')){
                $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(8.7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(4, 1, $p->tgl_lahir, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
                $this->fpdf->Ln();
            }
        }

        $this->fpdf->Output('DAFTAR_DATA_PENDUDUK_PEMILU_RT'.$rt.'_RW'.$rw, 'I');
    }

    function imunisasi(){
        $data['title'] = 'Data Imunisasi &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rt'] = $this->input->get('rt');
        $data['rw'] = $this->input->get('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['tgl_imunisasi'] = $this->input->get('tgl_imunisasi');
        $data['penduduk'] = $this->m_sidapen->data_penduduk_rt2($rt, $rw)->result();

        $this->load->view('v_admin_imunisasi', $data);
    }

    function cetak_data_imunisasi(){
        $tgl_imunisasi = $this->uri->segment(3);
        $rt = $this->uri->segment(4);
        $rw = $this->uri->segment(5);
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Imunisasi &minus; SIDAPEN';

        $penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DAFTAR PENDUDUK IMUNISASI', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Cell('', .3, 'RT '.$rt.' RW '.$rw, 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(1.3, 1, 'NO.', 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, 'NAMA', 1, '', 'C');
        $this->fpdf->Cell(2, 1, 'LK/PR', 1, '', 'C');
        $this->fpdf->Cell(4, 1, 'TANGGAL LAHIR', 1, '', 'C');
        $this->fpdf->Cell(3, 1, 'USIA', 1, '', 'C');
        $this->fpdf->Ln();

        $no = 1;

        foreach($penduduk as $p){
            $usia = date_diff(date_create($tgl_imunisasi), date_create($p->tgl_lahir));

            if($usia->format('%Y tahun') <= '05 tahun'){
                $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(8.7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(4, 1, $p->tgl_lahir, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
                $this->fpdf->Ln();
            }
        }

        $this->fpdf->Output('DAFTAR_DATA_PENDUDUK_IMUNISASI_RT'.$rt.'_RW'.$rw, 'I');
    }

    function cetak_data_kk(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Kepala Keluarga &minus; SIDAPEN';

        $penduduk = $this->m_sidapen->data_kk()->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA KEPALA KELUARGA', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(1.3, 1, 'NO.', 1, '', 'C');
        $this->fpdf->Cell(7.7, 1, 'NAMA', 1, '', 'C');
        $this->fpdf->Cell(5, 1, 'KKI', 1, '', 'C');
        $this->fpdf->Cell(5, 1, 'RT/RW', 1, '', 'C');
        $this->fpdf->Ln();

        $no = 1;

        foreach($penduduk as $p){
            $this->fpdf->SetFont('Arial', '', 10);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(7.7, 1, $p->kk_nama, 1, '', 'C');
                $this->fpdf->Cell(5, 1, $p->kki, 1, '', 'C');
                $this->fpdf->Cell(5, 1, $p->kk_rt.'/'.$p->kk_rw, 1, '', 'C');
                $this->fpdf->Ln();
        }

        $this->fpdf->Output('DAFTAR_DATA_KEPALA_KELUARGA', 'I');
    }

    function cetak_kk(){
        $this->load->library('fpdf');

        $data['title'] = 'Data Keluarga &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $id_kk = $this->uri->segment(3);
        $kk = $this->m_sidapen->lihat_detail_penduduk_kk($id_kk)->result();
        $penduduk = $this->m_sidapen->ambil_penduduk($id_kk)->result();
        $keluarga_meninggal = $this->m_sidapen->ambil_keluarga_meninggal($id_kk)->result();
        $keluarga_status_kb = $this->m_sidapen->ambil_keluarga_status_kb($id_kk)->result();
        $keluarga_sejahtera = $this->m_sidapen->ambil_keluarga_sejahtera($id_kk)->result();
        $keluarga_get_modal = $this->m_sidapen->ambil_keluarga_get_modal($id_kk)->result();

        foreach($kk as $p){
            $kk_nama = $p->kk_nama;
            $kki = $p->kki;
            $kk_provinsi = $p->kk_provinsi;
            $kk_kab = $p->kk_kab;
            $kk_kec = $p->kk_kec;
            $kk_kel = $p->kk_kel;
            $kk_rw = $p->kk_rw;
            $kk_rt = $p->kk_rt;
            $kk_jalan = $p->kk_jalan;
            $kk_komplek = $p->kk_komplek;
        }

        foreach($keluarga_meninggal as $km){
            $ada_meninggal = $km->ada_meninggal;
            $umur_saat_meninggal = $km->umur_saat_meninggal;
            $jenis_kelamin_m = $km->jenis_kelamin;
            $ibu_meninggal = $km->ibu_meninggal;
        }

        foreach($keluarga_status_kb as $ksb){
            $jamkesnas = $ksb->jamkesnas;
            $metode_kb = $ksb->metode_kb;
            $sebab_non_kb = $ksb->sebab_non_kb;
            $kapan_kb = $ksb->kapan_kb;
            $tempat_kb = $ksb->tempat_kb;
            $ikut_posyandu = $ksb->ikut_posyandu;
            $ikut_bkb = $ksb->ikut_bkb;
            $remaja_bkr = $ksb->remaja_bkr;
            $remaja_pik = $ksb->remaja_pik;
            $lansia_bkl = $ksb->lansia_bkl;
        }

        foreach($keluarga_sejahtera as $ks){
            $status_tahapan = $ks->status_tahapan;
            $alasan = $ks->alasan;
            $fasilitas_kakus = $ks->fasilitas_kakus;
            $fasilitas_listrik = $ks->fasilitas_listrik;
            $fasilitas_airminum = $ks->fasilitas_airminum;
            $fasilitas_memasak = $ks->fasilitas_memasak;
        }

        foreach($keluarga_get_modal as $kgm){
            $dapat_modal = $kgm->dapat_modal;
            $ikut_uppks = $kgm->ikut_uppks;
        }

        $this->fpdf->FPDF('L', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'DATA KELUARGA', 0, 0, 'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 8);
        $this->fpdf->Cell(4, .5,'Nama Kepala Keluarga');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(5, .5, $kk_nama);
        $this->fpdf->Cell(1, .5,'');
        $this->fpdf->Cell(3, .5,'Desa/Kelurahan');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(5, .5, $kk_kel);
        $this->fpdf->Ln();

        $this->fpdf->Cell(4, .5,'KKI');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(5, .5, $kki);
        $this->fpdf->Cell(1, .5,'');
        $this->fpdf->Cell(3, .5,'RW');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(5, .5, $kk_rw);
        $this->fpdf->Ln();

        $this->fpdf->Cell(4, .5,'Alamat Kepala Keluarga');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(2, .5,'Provinsi');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(2.5, .5, $kk_provinsi);
        $this->fpdf->Cell(1, .5,'');
        $this->fpdf->Cell(3, .5,'RT');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(5, .5, $kk_rt);
        $this->fpdf->Ln();

        $this->fpdf->Cell(4, .5,'');
        $this->fpdf->Cell(.5, .5,'');
        $this->fpdf->Cell(2, .5,'Kab/Kota');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(2.5, .5, $kk_kab);
        $this->fpdf->Cell(1, .5,'');
        $this->fpdf->Ln();

        $this->fpdf->Cell(4, .5,'');
        $this->fpdf->Cell(.5, .5,'');
        $this->fpdf->Cell(2, .5,'Kecamatan');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(2.5, .5, $kk_kec);
        $this->fpdf->Cell(1, .5,'');
        $this->fpdf->Cell(3, .5,'JL.');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->Cell(5, .5, $kk_jalan);
        $this->fpdf->Cell(1, .5,'');
        $this->fpdf->Cell(3, .5,'Komplek');
        $this->fpdf->Cell(.5, .5,':');
        $this->fpdf->MultiCell(5, .5, $kk_komplek);

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'I. IDENTITAS KELUARGA', 0, 0, 'L');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', '', 6);
        $this->fpdf->Cell(3, .5, 'NIK', 1, '', 'C');
        $this->fpdf->Cell(5.5, .5, 'NAMA KEPALA DAN ANGGOTA KELUARGA', 1, '', 'C');
        $this->fpdf->Cell(1.2, .5, 'HUB. KEL.', 1, '', 'C');
        $this->fpdf->Cell(.8, .5, 'JK', 1, '', 'C');
        $this->fpdf->Cell(4, .5, 'TTL', 1, '', 'C');
        $this->fpdf->Cell(1, .5, 'UMUR', 1, '', 'C');
        $this->fpdf->Cell(1.5, .5, 'AGAMA', 1, '', 'C');
        $this->fpdf->Cell(2, .5, 'PUNYA AKTE ', 1, '', 'C');
        $this->fpdf->Cell(2, .5, 'PENDIDIKAN', 1, '', 'C');
        $this->fpdf->Cell(3, .5, 'PEKERJAAN', 1, '', 'C');
        $this->fpdf->Cell(1.5, .5, 'S. KAWIN', 1, '', 'C');
        $this->fpdf->Cell(2.5, .5, 'USIA KAWIN PERTAMA', 1, '', 'C');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', '', 6);
        foreach($penduduk as $pp){
            $usia = date_diff(date_create(), date_create($pp->tgl_lahir));
            $this->fpdf->Cell(3, .5, $pp->no_penduduk, 1, '', 'C');
            $this->fpdf->Cell(5.5, .5, $pp->nama, 1, '', 'C');
            $this->fpdf->Cell(1.2, .5, $pp->status_dalam_keluarga, 1, '', 'C');
            $this->fpdf->Cell(.8, .5, $pp->jenis_kelamin, 1, '', 'C');
            $this->fpdf->Cell(4, .5, $pp->tmpt_lahir.', '.$pp->tgl_lahir, 1, '', 'C');
            $this->fpdf->Cell(1, .5, $usia->format('%Y'), 1, '', 'C');
            $this->fpdf->Cell(1.5, .5, $pp->agama, 1, '', 'C');
            $this->fpdf->Cell(2, .5, $pp->akte, 1, '', 'C');
            $this->fpdf->Cell(2, .5, $pp->pendidikan, 1, '', 'C');
            $this->fpdf->Cell(3, .5, $pp->pekerjaan, 1, '', 'C');
            $this->fpdf->Cell(1.5, .5, $pp->status_pernikahan, 1, '', 'C');
            $this->fpdf->Cell(2.5, .5, $pp->usia_kawin_pertama, 1, '', 'C');
            $this->fpdf->Ln();
        }

        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', '', 6);
        $this->fpdf->Cell(10, .5, 'DALAM SETAHUN TERAKHIR ADA ANGGOTA KELUARGA YANG MENINGGAL DUNIA : '.$ada_meninggal, 1, '', 'C');
        $this->fpdf->Cell(1, .5, 'JIKA YA', 1, '', 'C');
        $this->fpdf->Cell(7, .5, 'UMUR SAAT MENINGGAL : '.$umur_saat_meninggal.' | JK : '.$jenis_kelamin_m, 1, '', 'C');
        $this->fpdf->Cell(10, .5, 'APAKAH ADA IBU MENINGGAL KARENA MELAHIRKAN SELAMA 1 TAHUN TERAKHIR : '.$ibu_meninggal, 1, '', 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'II. STATUS KELUARGA DAN KESERTAAN KB', 0, 0, 'L');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', '', 6);
        $this->fpdf->Cell(7, .5, 'PESERTA JAMINAN KESEHATAN NASIONAL', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$jamkesnas, 0, '', 'L');
        $this->fpdf->Cell(6, .5, 'PAKAI KB DENGAN METODE', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$metode_kb, 0, '', 'L');
        $this->fpdf->Cell(6, .5, 'TIDAK PAKE KB SEBAB', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$sebab_non_kb, 0, '', 'L');
        $this->fpdf->Ln();

        $this->fpdf->Cell(7, .5, 'KAPAN MENJADI PESERTA KB', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$kapan_kb, 0, '', 'L');
        $this->fpdf->Cell(6, .5, 'TEMPAT PELAYANAN KB', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$tempat_kb, 0, '', 'L');
        $this->fpdf->Cell(6, .5, 'IKUT POSYANDU', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$ikut_posyandu, 0, '', 'L');
        $this->fpdf->Ln();

        $this->fpdf->Cell(7, .5, 'IKUT BKB', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$ikut_bkb, 0, '', 'L');
        $this->fpdf->Cell(6, .5, 'KELUARGA PUNYA REMAJA IKUT BKR', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$remaja_bkr, 0, '', 'L');
        $this->fpdf->Ln();

        $this->fpdf->Cell(7, .5, 'KELUARGA ADA LANSIA (USIA 60 TAHUN KE ATAS) IKUT BKL', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$lansia_bkl, 0, '', 'L');
        $this->fpdf->Cell(6, .5, 'ADA REMAJA (USIA 10-24 THN) IKUT PIK-REMAJA', 0, '', 'L');
        $this->fpdf->Cell(3, .5, ': '.$remaja_pik, 0, '', 'L');
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'III. STATUS TAHAPAN KELUARGA SEJAHTERA', 0, 0, 'L');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', '', 6);
        $this->fpdf->Cell(6, .5, 'STATUS TAHAPAN KELUARGA SEJAHTERA', 0, '', 'L');
        $this->fpdf->Cell(4, .5, ': '.$status_tahapan.' '.$alasan, 0, '', 'L');
        $this->fpdf->Cell(7, .5, 'KELUARGA MEMILIKI FASILITAS BUANG AIR BESAR SENDIRI', 0, '', 'L');
        $this->fpdf->Cell(2, .5, ': '.$fasilitas_kakus, 0, '', 'L');
        $this->fpdf->Cell(7, .5, 'KELUARGA MENGGUNAKAN SUMBER PENERANGAN LISTRIK', 0, '', 'L');
        $this->fpdf->Cell(2, .5, ': '.$fasilitas_listrik, 0, '', 'L');
        $this->fpdf->Ln();

        $this->fpdf->Cell(6, .5, 'KELUARGA MEMILIKI SUMBER AIR MINUM BERSIH', 0, '', 'L');
        $this->fpdf->Cell(4, .5, ': '.$fasilitas_airminum, 0, '', 'L');
        $this->fpdf->Cell(7, .5, 'KELUARGA MENGGUNAKAN BBG/L UNTUK MEMASAK SEHARI-HARI', 0, '', 'L');
        $this->fpdf->Cell(2, .5, ': '.$fasilitas_memasak, 0, '', 'L');
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'IV. KELUARGA MENDAPATKAN MODAL TAHUN INI DAN KELUARGA IKUT UPPKS', 0, 0, 'L');
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', '', 6);
        $this->fpdf->Cell(8, .5, 'KELUARGA MENDAPATKAN BANTUAN MODAL DALAM 1 TAHUN TERAKHIR', 0, '', 'L');
        $this->fpdf->Cell(2, .5, ': '.$dapat_modal, 0, '', 'L');
        $this->fpdf->Cell(6, .5, 'KELUARGA IKUT UPPKS', 0, '', 'L');
        $this->fpdf->Cell(4, .5, ': '.$ikut_uppks, 0, '', 'L');


        $this->fpdf->Output('DATA_KELUARGA('.$kk_nama.')_RT'.$kk_rt.'_RW'.$kk_rw, 'I');
    }

    function export(){
        $tgl_pemilu = $this->uri->segment(3);
        $rt = $this->uri->segment(4);
        $rw = $this->uri->segment(5);
        $i=0;
        $data = array();
        $penduduk = $this->m_sidapen->data_penduduk_rt2($rt, $rw)->result();

        $data[0] = array('NO', 'NAMA', 'NO. PENDUDUK', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'USIA', 'RT', 'RW', 'JENIS KELAMIN', 'PENDIDIKAN', 'STATUS PERNIKAHAN', 'PEKERJAAN', 'STATUS DALAM KELUARGA', 'PUNYA AKTE', 'USIA KAWIN PERTAMA', 'TEMPAT TINGGAL');
    
        foreach ($penduduk as $row) {
            $usia = date_diff(date_create($tgl_pemilu), date_create($row->tgl_lahir));
            if(($row->status_pernikahan == 'K') OR ($usia->format('%Y tahun') >= '17 tahun')){
                $data[++$i] = array($i, $row->nama, $row->no_penduduk, $row->tmpt_lahir, $row->tgl_lahir, $usia->format('%Y tahun'), $row->rt, $row->rw, $row->jenis_kelamin, $row->pendidikan, $row->status_pernikahan, $row->pekerjaan, $row->status_dalam_keluarga, $row->akte, $row->usia_kawin_pertama, $row->tempat_tinggal);
            }
        } 

        $this->load->helper('csv');
        array_to_csv($data, 'data_pemilu_rt'.$rt.'rw'.$rw.'.csv');
    }

    function export2(){
        $tgl_imunisasi = $this->uri->segment(3);
        $rt = $this->uri->segment(4);
        $rw = $this->uri->segment(5);
        $i=0;
        $data = array();
        $penduduk = $this->m_sidapen->data_penduduk_rt2($rt, $rw)->result();

        $data[0] = array('NO', 'NAMA', 'NO. PENDUDUK', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'USIA', 'RT', 'RW', 'JENIS KELAMIN', 'PENDIDIKAN', 'STATUS PERNIKAHAN', 'PEKERJAAN', 'STATUS DALAM KELUARGA', 'PUNYA AKTE', 'USIA KAWIN PERTAMA', 'TEMPAT TINGGAL');
    
        foreach ($penduduk as $row) {
            $usia = date_diff(date_create($tgl_imunisasi), date_create($row->tgl_lahir));
            if($usia->format('%Y tahun') <= '05 tahun'){
                $data[++$i] = array($i, $row->nama, $row->no_penduduk, $row->tmpt_lahir, $row->tgl_lahir, $usia->format('%Y tahun'), $row->rt, $row->rw, $row->jenis_kelamin, $row->pendidikan, $row->status_pernikahan, $row->pekerjaan, $row->status_dalam_keluarga, $row->akte, $row->usia_kawin_pertama, $row->tempat_tinggal);
            }
        } 

        $this->load->helper('csv');
        array_to_csv($data, 'data_balita_rt'.$rt.'rw'.$rw.'.csv');
    }

    function grafik_penduduk(){
        $data['title'] = 'Grafik Penduduk &minus; SIDAPEN';
        $data['rt'] = $this->input->get('rt');
        $data['rw'] = $this->input->get('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->num_rows();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_kawin'] = $this->m_sidapen->total_kawin($rt, $rw)->num_rows();
        $data['total_belum_kawin'] = $this->m_sidapen->total_belum_kawin($rt, $rw)->num_rows();
        $data['total_pria'] = $this->m_sidapen->total_pria($rt, $rw)->num_rows();
        $data['total_wanita'] = $this->m_sidapen->total_wanita($rt, $rw)->num_rows();
        $data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$data['jumlah4'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan($rt, $rw)->result();
		$data['jumlah5'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki($rt, $rw)->result();
		
        $this->load->view('v_admin_grafik_penduduk', $data);
    }
	
	function grafik_penduduk1(){
        $data['title'] = 'Grafik Penduduk &minus; SIDAPEN';
        $data['rt'] = $this->input->get('rt');
        $data['rw'] = $this->input->get('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rw($rw)->num_rows();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rw_sementara($rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt2($rw)->num_rows();
        $data['total_kawin1'] = $this->m_sidapen->total_kawin1($rw)->num_rows();
        $data['total_belum_kawin1'] = $this->m_sidapen->total_belum_kawin1($rw)->num_rows();
        $data['total_pria1'] = $this->m_sidapen->total_pria1($rw)->num_rows();
        $data['total_wanita1'] = $this->m_sidapen->total_wanita1($rw)->num_rows();
        $data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();

        $this->load->view('v_admin_grafik_penduduk1', $data);
    }
}
<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Home_rt extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
        $this->load->helper('file');
        $this->load->model('m_sidapen');
        if(!$this->session->userdata('logged_in')){
            echo "
                <script>alert('Maaf, akses tidak diijinkan. Login terlebih dahulu.')</script>
                <script>window.location='".base_url()."login'</script>
            ";
        }

        if($this->session->userdata('user_role') != '1'){
            echo "
                <script>alert('Maaf, akses tidak diijinkan. Bukan RT.')</script>
                <script>window.location='".base_url()."redirect'</script>
            ";
        }
    }
    
    function index(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['title'] = 'Home RT &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['data_penduduk'] = $this->m_sidapen->data_penduduk_hari_rt($rt, $rw)->result();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();

        $this->load->view('v_rt', $data);
    }

    function data_penduduk_rt(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['title'] = 'Data Penduduk';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['penduduk'] = $this->m_sidapen->data_penduduk_rt($rt, $rw)->result();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        
        $this->load->view('v_rt_data_penduduk', $data);
    }

    function data_penduduk_rt_sementara(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['title'] = 'Data Penduduk Sementara';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['penduduk'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->result();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        
        $this->load->view('v_rt_data_penduduk_sementara', $data);
    }

    function kepala_keluarga_rt(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['title'] = 'Data Kepala Keluarga';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['kk'] = $this->m_sidapen->data_kk_rt($rt, $rw)->result();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();

        $this->load->view('v_rt_data_kepala_keluarga', $data);
    }

    function cari_penduduk(){
        $cari = $this->input->post('cari');
        $data['cari'] = $cari;
        $rt = $this->session->userdata('rt');
        $rw = $this->session->userdata('rw');
        $data['hasil'] = $this->m_sidapen->cari_penduduk_rt($rt, $rw, $cari)->result();
        $data['title'] = 'Hasil Pencarian &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();

        $this->load->view('v_rt_hasil_pencarian', $data);
    }

    function profil(){
        $user_id = $this->session->userdata('user_id');
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $data['title'] = 'Lihat Detail &raquo; Lurah &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['profil'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_rt_profil', $data);
    }
    
    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }
    
    function input_data(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['title'] = 'Input Data Keluarga &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jenis_kelamin'] = $this->m_sidapen->jenis_kelamin();
        $data['gol_darah'] = $this->m_sidapen->gol_darah();
        $data['pendidikan'] = $this->m_sidapen->pendidikan();
        $data['status_pernikahan'] = $this->m_sidapen->status_pernikahan();
        $data['status_sosial'] = $this->m_sidapen->status_sosial();
        $data['agama'] = $this->m_sidapen->agama();
        $data['warga_negara'] = $this->m_sidapen->warga_negara();
        $data['status_keluarga'] = $this->m_sidapen->status_keluarga();
        $data['kontrasepsi'] = $this->m_sidapen->kontrasepsi();
        $data['imunisasi'] = $this->m_sidapen->imunisasi();

        $this->load->view('v_rt_input_data_penduduk', $data);
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
                redirect('home_rt/input_data');
            }
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan. No. Penduduk sudah ada.');
        }
    }
	
	 function import(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
        $data = array();
        $tgl_pemilu = $this->uri->segment(3);
        $penduduk = $this->m_sidapen->data_penduduk_rt2($rt, $rw)->result();
		
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
		
		$data[0] = array('NO', 'NAMA', 'NO. PENDUDUK', 'TEMPAT LAHIR', 'TANGGAL LAHIR', 'RT', 'RW', 
		'JENIS KELAMIN');
        if(is_array($nama)){
        foreach ($penduduk as $row) {
           
                $data[++$i] = array($i, $nama, $nik, $tmpt_lahir, $tgl_lahir, $rt, 
				$rw, $jenis_kelamin);
     
			}
        }

        $count_nama = count($nama);

                for($i=0; $i<$count_nama; $i++){
                    $penduduk[$i] = array(
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
		$simpan_data_penduduk1 = $this->m_sidapen->simpan_data_penduduk1($penduduk);
        $cek_no_pend = $this->m_sidapen->simpan_data_penduduk1($penduduk); 

		 foreach( $cek_no_pend as $cp){
            if($cp->no_penduduk == $nik){
                $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
                redirect('home_rt/import');
            }else{
			 $this->session->set_flashdata('pesan', 'Data disimpan.');
            redirect('home_rt/import');
			}
        }
          	
    }
	
	 function import1(){
	 $data['nama'] = $this->session->userdata('user_nama');
	  	 $data['title'] = 'Export Excel &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
     $data['nama'] = $this->session->userdata('user_nama');
        $data['jml'] = $this->m_sidapen->data_penduduk()->num_rows();
		$data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jml_sementara'] = $this->m_sidapen->data_penduduk_sementara()->num_rows();
        $data['jml_rt'] = $this->m_sidapen->jumlah_rt()->num_rows();
        $data['jml_lurah'] = $this->m_sidapen->jumlah_lurah()->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk()->num_rows();
		$data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->num_rows();
		$data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
		$data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_kawin'] = $this->m_sidapen->total_kawin($rt, $rw)->num_rows();
        $data['total_belum_kawin'] = $this->m_sidapen->total_belum_kawin($rt, $rw)->num_rows();
        $data['total_pria'] = $this->m_sidapen->total_pria($rt, $rw)->num_rows();
        $data['total_wanita'] = $this->m_sidapen->total_wanita($rt, $rw)->num_rows();
		$data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$data['jumlah4'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan($rt, $rw)->result();
		$data['jumlah5'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki($rt, $rw)->result();
		$data['jumlah6'] = $this->m_sidapen->jumlah_penduduk_kawin_rt($rt, $rw)->result();
		$data['jumlah7'] = $this->m_sidapen->jumlah_penduduk_belumkawin_rt($rt, $rw)->result();
	  
	  
	  
	  $this->load->view('v_rt_excel1', $data);
		
	 }
	 
	 function import2(){
	  	$data['title'] = 'Export Excel &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama'); 
	  
	  $this->load->view('v_rt_excel_olahraga', $data);
		
	 }
	 
	 function import3(){
	  	$data['title'] = 'Export Excel &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama'); 
	  
	  $this->load->view('v_rt_excel_kesehatan', $data);
		
	 }
	 
	  function import4(){
	  	$data['title'] = 'Export Excel &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama'); 
	  
	  $this->load->view('v_rt_excel_pemkel', $data);
		
	 }
	 
	 function import5(){
	  	$data['title'] = 'Export Excel &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama'); 
	  
	  $this->load->view('v_rt_excel_perekonomian', $data);
		
	 }
	 
	  function import6(){
	  	$data['title'] = 'Export Excel &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama'); 
	  
	  $this->load->view('v_rt_excel_peribadatan', $data);
		
	 }
	 
	   function import7(){
	  	$data['title'] = 'Export Excel &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama'); 
	  
	  $this->load->view('v_rt_excel_sosial', $data);
		
	 }
	 
	 function import8(){
	  	$data['title'] = 'Export Excel &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama'); 
	  
	  $this->load->view('v_rt_excel_pendidikan', $data);
		
	 }

    function lihat_detail(){
        $id_penduduk = $this->uri->segment(3);
        $data['title'] = 'Detail Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $data['detail'] = $this->m_sidapen->lihat_detail_penduduk($id_penduduk);

        $this->load->view('v_rt_lihat_detail', $data);
    }

    function lihat_detail_kk(){
        $id_kk = $this->uri->segment(3);
        $data['title'] = 'Detail Kepala Keluarga &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $data['detail'] = $this->m_sidapen->lihat_detail_penduduk_kk($id_kk)->result();
		$data['penduduk'] = $this->m_sidapen->ambil_penduduk($id_kk)->result();

        $this->load->view('v_rt_lihat_detail_kk', $data);
    }

    function edit_kk(){
        $id_kk = $this->uri->segment(3);
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['title'] = 'Edit Kepala Keluarga &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        $data['edit'] = $this->m_sidapen->lihat_detail_penduduk_kk($id_kk)->result();

        $this->load->view('v_rt_edit_kk', $data);
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
                redirect('home_rt/edit_kk/'.$id_kk);
            }
        }

        $update = $this->m_sidapen->update_kk($data, $id_kk);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_kk/'.$id_kk);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_kk/'.$id_kk);
        }
    }

    function edit_penduduk(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        $id_penduduk = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_penduduk($id_penduduk);
        $data['jenis_kelamin'] = $this->m_sidapen->jenis_kelamin();
        $data['gol_darah'] = $this->m_sidapen->gol_darah();
        $data['pendidikan'] = $this->m_sidapen->pendidikan();
        $data['status_pernikahan'] = $this->m_sidapen->status_pernikahan();
        $data['status_sosial'] = $this->m_sidapen->status_sosial();
        $data['agama'] = $this->m_sidapen->agama();
        $data['warga_negara'] = $this->m_sidapen->warga_negara();
        $data['status_keluarga'] = $this->m_sidapen->status_keluarga();
        $data['kontrasepsi'] = $this->m_sidapen->kontrasepsi();
        $data['imunisasi'] = $this->m_sidapen->imunisasi();
        $this->load->view('v_rt_edit_data_penduduk', $data);
    }
	
	function edit_sarana(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        $id_kesehatan = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_kesehatan($id_kesehatan);
        
        $this->load->view('v_rt_edit_data_sarana', $data);
    }
	
	function edit_sarana_pemkel(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $id_pemerintah = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_pemkel($id_pemerintah);
        
        $this->load->view('v_rt_edit_data_sarana_pemerintah', $data);
    }
	
	function edit_sarana_pendidikan(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $id_pendidikan = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_pendidikan($id_pendidikan);
        
        $this->load->view('v_rt_edit_data_sarana_pendidikan', $data);
    }
	
	function edit_sarana_peribadatan(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $id_peribadatan = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_peribadatan($id_peribadatan);
        
        $this->load->view('v_rt_edit_data_sarana_peribadatan', $data);
    }
	
	function edit_sarana_perekonomian(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $id_perekonomian = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_perekonomian($id_perekonomian);
        
        $this->load->view('v_rt_edit_data_sarana_perekonomian', $data);
    }
	
	function edit_sarana_olahraga(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $id_olahraga = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_olahraga($id_olahraga);
        
        $this->load->view('v_rt_edit_data_sarana_olahraga', $data);
    }
	
	function edit_sarana_sosial(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $id_sosial = $this->uri->segment(3);
        $data['title'] = 'Edit Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['edit'] = $this->m_sidapen->lihat_detail_sosial($id_sosial);
        
        $this->load->view('v_rt_edit_data_sarana_sosial', $data);
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
                redirect('home_rt/edit_penduduk/'.$id_penduduk);
            }
        }

        $update = $this->m_sidapen->update_penduduk($data, $id_penduduk);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_penduduk/'.$id_penduduk);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_penduduk/'.$id_penduduk);
        }
    }
	
	 function update_sarana_kesehatan(){
        $id_kesehatan = $this->input->post('id_kesehatan');
        $puskesmas = $this->input->post('puskesmas');
        $posyandu = $this->input->post('posyandu');
		$praktek_bidan = $this->input->post('praktek_bidan');

        $data = array(
            'puskesmas' => $this->input->post('puskesmas'),
            'posyandu' => $this->input->post('posyandu'),
            'praktek_bidan' => $this->input->post('praktek_bidan')
        );
       
        //$cek_nopen = $this->m_sidapen->cek_nopen_id($no_penduduk)->result();
        
        //foreach($cek_nopen as $cp){
          //  if($cp->no_penduduk == $no_penduduk){
            //    $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
              //  redirect('home_rt/edit_penduduk/'.$id_penduduk);
            //}
        //}

        $update = $this->m_sidapen->update_sarana_kesehatan($data, $id_kesehatan);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_sarana/'.$id_kesehatan);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_sarana/'.$id_kesehatan);
        }
    }
	
	function update_sarana_pemkel(){
        $id_pemerintah = $this->input->post('id_pemerintah');
        $kantor_lurah = $this->input->post('kantor_lurah');
        $balai_pertemuan = $this->input->post('balai_pertemuan');
		$pos_rw = $this->input->post('pos_rw');

        $data = array(
            'kantor_lurah' => $this->input->post('kantor_lurah'),
            'balai_pertemuan' => $this->input->post('balai_pertemuan'),
            'pos_rw' => $this->input->post('pos_rw')
        );
       
        //$cek_nopen = $this->m_sidapen->cek_nopen_id($no_penduduk)->result();
        
        //foreach($cek_nopen as $cp){
          //  if($cp->no_penduduk == $no_penduduk){
            //    $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
              //  redirect('home_rt/edit_penduduk/'.$id_penduduk);
            //}
        //}

        $update = $this->m_sidapen->update_sarana_pemkel($data, $id_pemerintah);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_sarana_pemkel/'.$id_pemerintah);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_sarana_pemkel/'.$id_pemerintah);
        }
    }
	
	function update_sarana_pendidikan(){
        $id_pendidikan = $this->input->post('id_pendidikan');
        $paud = $this->input->post('paud');
        $sd_negeri = $this->input->post('sd_negeri');
		$sd_swasta = $this->input->post('sd_swasta');
		$madrasah_ibridaiyah = $this->input->post('madrasah_ibridaiyah');
		$sltp_negeri = $this->input->post('sltp_negeri');
		$sltp_swasta = $this->input->post('sltp_swasta');
		$madrasah_tsanawiyah = $this->input->post('madrasah_tsanawiyah');
		$slta_negeri = $this->input->post('slta_negeri');
		$slta_swasta = $this->input->post('slta_swasta');
		$madrasah_aliyah = $this->input->post('madrasah_aliyah');
		$pt_negeri = $this->input->post('pt_negeri');
		$pt_swasta = $this->input->post('pt_swasta');
		$pesantren = $this->input->post('pesantren');

        $data = array(
            'paud' => $this->input->post('paud'),
            'sd_negeri' => $this->input->post('sd_negeri'),
            'sd_swasta' => $this->input->post('sd_swasta'),
			'madrasah_ibridaiyah' => $this->input->post('madrasah_ibridaiyah'),
			'sltp_negeri' => $this->input->post('sltp_negeri'),
            'sltp_swasta' => $this->input->post('sltp_swasta'),
			'madrasah_tsanawiyah' => $this->input->post('madrasah_tsanawiyah'),
			'slta_negeri' => $this->input->post('slta_negeri'),
            'slta_swasta' => $this->input->post('slta_swasta'),
			'madrasah_aliyah' => $this->input->post('madrasah_aliyah'),
			'pt_negeri' => $this->input->post('pt_negeri'),
            'pt_swasta' => $this->input->post('pt_swasta'),
			'pesantren' => $this->input->post('pesantren')
        );
       
        //$cek_nopen = $this->m_sidapen->cek_nopen_id($no_penduduk)->result();
        
        //foreach($cek_nopen as $cp){
          //  if($cp->no_penduduk == $no_penduduk){
            //    $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
              //  redirect('home_rt/edit_penduduk/'.$id_penduduk);
            //}
        //}

        $update = $this->m_sidapen->update_sarana_pendidikan($data, $id_pendidikan);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_sarana_pendidikan/'.$id_pendidikan);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_sarana_pendidikan/'.$id_pendidikan);
        }
    }
	
	function update_sarana_peribadatan(){
        $id_peribadatan = $this->input->post('id_peribadatan');
        $masjid = $this->input->post('masjid');
        $mushollah = $this->input->post('mushollah');
		$gereja = $this->input->post('gereja');
		$vihara = $this->input->post('vihara');
		$pure = $this->input->post('pure');

        $data = array(
            'masjid' => $this->input->post('masjid'),
            'mushollah' => $this->input->post('mushollah'),
            'gereja' => $this->input->post('gereja'),
			'vihara' => $this->input->post('vihara'),
			'pure' => $this->input->post('pure')
        );
       
        //$cek_nopen = $this->m_sidapen->cek_nopen_id($no_penduduk)->result();
        
        //foreach($cek_nopen as $cp){
          //  if($cp->no_penduduk == $no_penduduk){
            //    $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
              //  redirect('home_rt/edit_penduduk/'.$id_penduduk);
            //}
        //}

        $update = $this->m_sidapen->update_sarana_peribadatan($data, $id_peribadatan);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_sarana_peribadatan/'.$id_peribadatan);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_sarana_peribadatan/'.$id_peribadatan);
        }
    }
	
	function update_sarana_perekonomian(){
        $id_perekonomian = $this->input->post('id_perekonomian');
        $pasar = $this->input->post('pasar');
        $wartel_warnet = $this->input->post('wartel_warnet');
		$warung_kelontong = $this->input->post('warung_kelontong');
		$toko_material = $this->input->post('toko_material');
		$indomart = $this->input->post('indomart');
		$rumah_kost = $this->input->post('rumah_kost');
		$rumah_makan = $this->input->post('toko_makan');

        $data = array(
            'pasar' => $this->input->post('pasar'),
            'wartel_warnet' => $this->input->post('wartel_warnet'),
            'warung_kelontong' => $this->input->post('warung_kelontong'),
			'toko_material' => $this->input->post('toko_material'),
			'indomart' => $this->input->post('indomart'),
			'rumah_kost' => $this->input->post('rumah_kost'),
			'rumah_makan' => $this->input->post('rumah_makan')
        );
       
        //$cek_nopen = $this->m_sidapen->cek_nopen_id($no_penduduk)->result();
        
        //foreach($cek_nopen as $cp){
          //  if($cp->no_penduduk == $no_penduduk){
            //    $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
              //  redirect('home_rt/edit_penduduk/'.$id_penduduk);
            //}
        //}

        $update = $this->m_sidapen->update_sarana_perekonomian($data, $id_perekonomian);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_sarana_perekonomian/'.$id_perekonomian);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_sarana_perekonomian/'.$id_perekonomian);
        }
    }
	
	function update_sarana_olahraga(){
        $id_olahraga = $this->input->post('id_olahraga');
        $lapangan_bola = $this->input->post('lapangan_bola');
        $lapangan_basket = $this->input->post('lapangan_basket');
		$lapangan_volly = $this->input->post('lapangan_volly');
		$lapangan_badminton = $this->input->post('lapangan_badminton');
		$lapangan_futsal = $this->input->post('lapangan_futsal');

        $data = array(
            'lapangan_bola' => $this->input->post('lapangan_bola'),
            'lapangan_basket' => $this->input->post('lapangan_basket'),
            'lapangan_volly' => $this->input->post('lapangan_volly'),
			'lapangan_badminton' => $this->input->post('lapangan_badminton'),
			'lapangan_futsal' => $this->input->post('lapangan_futsal')
        );
       
        //$cek_nopen = $this->m_sidapen->cek_nopen_id($no_penduduk)->result();
        
        //foreach($cek_nopen as $cp){
          //  if($cp->no_penduduk == $no_penduduk){
            //    $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
              //  redirect('home_rt/edit_penduduk/'.$id_penduduk);
            //}
        //}

        $update = $this->m_sidapen->update_sarana_olahraga($data, $id_olahraga);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_sarana_olahraga/'.$id_olahraga);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_sarana_olahraga/'.$id_olahraga);
        }
    }
	
	function update_sarana_sosial(){
        $id_sosial = $this->input->post('id_sosial');
        $pkk = $this->input->post('pkk');
        $karang_taruna = $this->input->post('karang_taruna');
		$lsm = $this->input->post('lsm');
		$satgas_rt = $this->input->post('satgas_rt');
		$pos_kamling = $this->input->post('pos_kamling');
		$gerobak_sampah = $this->input->post('gerobak_sampah');

        $data = array(
            'pkk' => $this->input->post('pkk'),
            'karang_taruna' => $this->input->post('karang_taruna'),
            'lsm' => $this->input->post('lsm'),
			'satgas_rt' => $this->input->post('satgas_rt'),
			'pos_kamling' => $this->input->post('pos_kamling'),
			'gerobak_sampah' => $this->input->post('gerobak_sampah')
        );
       
        //$cek_nopen = $this->m_sidapen->cek_nopen_id($no_penduduk)->result();
        
        //foreach($cek_nopen as $cp){
          //  if($cp->no_penduduk == $no_penduduk){
            //    $this->session->set_flashdata('pesan', 'No. Penduduk sudah ada. Data gagal disimpan.');
              //  redirect('home_rt/edit_penduduk/'.$id_penduduk);
            //}
        //}

        $update = $this->m_sidapen->update_sarana_sosial($data, $id_sosial);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Data berhasil diupdate.');
            redirect('home_rt/edit_sarana_sosial/'.$id_sosial);
        }else{
            $this->session->set_flashdata('pesan', 'Data gagal disimpan.');
            redirect('home_rt/edit_sarana_sosial/'.$id_sosial);
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

    function ubah_password(){
        $user_id = $this->session->userdata('user_id');
        $data['title'] = 'Ubah Password &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $data['profil'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_rt_ubah_password', $data);
    }

    function update_password(){
        $user_id = $this->input->post('user_id');
        $data = array(
            'user_nama' => $this->input->post('user_nama'),
            'user_password' => $this->input->post('user_password')
            );

        $update = $this->m_sidapen->update_password($user_id, $data);
        if(!$update){
            $this->session->set_flashdata('pesan', 'Profil berhasil diubah.');
            redirect('home_rt/ubah_password');
        }else{
            $this->session->set_flashdata('pesan', 'Maaf, ada kesalahan. Password gagal diubah.');
            redirect('home_rt/ubah_password');
        }
    }

    function pemilu(){
        $data['title'] = 'Data Pemilu &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['tgl_pemilu'] = $this->input->post('tgl_pemilu');
        $data['penduduk'] = $this->m_sidapen->data_penduduk_rt2($rt, $rw)->result();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();

        $this->load->view('v_rt_pemilu', $data);
    }

    function imunisasi(){
        $data['title'] = 'Data imunisasi &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['tgl_imunisasi'] = $this->input->post('tgl_imunisasi');
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['penduduk'] = $this->m_sidapen->data_penduduk_rt($rt, $rw)->result();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();

        $this->load->view('v_rt_imunisasi', $data);
    }

    function cetak_data_penduduk_hari(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Pemilu &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];

        $penduduk = $this->m_sidapen->data_penduduk_hari_rt_cetak($rt, $rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA PENDUDUK MASUK HARI INI ('.date('d'.'/'.'m'.'/'.'Y').')', 0, 0, 'C');
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
            $usia = date_diff(date_create(), date_create($p->tgl_lahir));

                $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(8.7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(4, 1, $p->tgl_lahir, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
                $this->fpdf->Ln();
        }

        $this->fpdf->Output('DATA_PENDUDUK_RT'.$rt.'_RW'.$rw.'_'.date('dmY'), 'I');
    }

    function cetak_data_penduduk(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Pemilu &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];

        $penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA PENDUDUK', 0, 0, 'C');
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
            $usia = date_diff(date_create(), date_create($p->tgl_lahir));

            $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(8.7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(4, 1, $p->tgl_lahir, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
                $this->fpdf->Ln();
        }

        $this->fpdf->Output('DAFTAR_DATA_PENDUDUK_RT'.$rt.'_RW'.$rw, 'I');
    }

    function cetak_data_penduduk_sementara(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Penduduk Sementara &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];

        $penduduk = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA PENDUDUK SEMENTARA', 0, 0, 'C');
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
            $usia = date_diff(date_create(), date_create($p->tgl_lahir));

            $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(8.7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(4, 1, $p->tgl_lahir, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
                $this->fpdf->Ln();
        }

        $this->fpdf->Output('DAFTAR_DATA_PENDUDUK_SEMENTARA_RT'.$rt.'_RW'.$rw, 'I');
    }

    function cetak_data_kk(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Kepala Keluarga &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];

        $penduduk = $this->m_sidapen->data_kk_rt($rt, $rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA KEPALA KELUARGA', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Cell('', .3, 'RT '.$rt.' RW '.$rw, 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 8);
        $this->fpdf->Cell(1.3, 1, 'NO.', 1, '', 'C');
        $this->fpdf->Cell(7.7, 1, 'NAMA', 1, '', 'C');
        $this->fpdf->Cell(3, 1, 'KKI', 1, '', 'C');
        $this->fpdf->Cell(7, 1, 'JALAN', 1, '', 'C');
        $this->fpdf->Ln();

        $no = 1;

        foreach($penduduk as $p){
            $this->fpdf->SetFont('Arial', '', 8);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(7.7, 1, $p->kk_nama, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $p->kki, 1, '', 'C');
                $this->fpdf->Cell(7, 1, $p->kk_jalan, 1, '', 'C');
                $this->fpdf->Ln();
        }

        $this->fpdf->Output('DAFTAR_DATA_KEPALA_KELUARGA_RT'.$rt.'_RW'.$rw, 'I');
    }

    function cetak_data_pemilu(){
        $tgl_pemilu = $this->uri->segment(3);
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Pemilu &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];

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

           if(($p->status_pernikahan == 'K') OR ($usia->format('%Y tahun') >= '17 tahun') ) {
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

    function cetak_data_imunisasi(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Pemilu &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $tgl_imunisasi = $this->uri->segment(3);
        $penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DAFTAR PENDUK IMUNISASI', 0, 0, 'C');
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
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
        $data = array();
        $tgl_pemilu = $this->uri->segment(3);
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
	
	 function export_datakk(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
        $data = array();
		$penduduk = $this->m_sidapen->data_kk_rt($rt, $rw)->result();

        $data[0] = array('NO', 'NAMA', 'KKI', 'JALAN', 'KOMPLEK', 'RT', 'RW', 'KELURAHAN', 'KECAMATAN', 'KABUPATEN', 'PROVINSI');
    
        foreach ($penduduk as $row) {
            if(($row->id_status_penduduk = '1')){
                $data[++$i] = array($i, $row->kk_nama, $row->kki, $row->kk_jalan, 
				$row->kk_komplek, $row->kk_rt, $row->kk_rw, $row->kk_kel, $row->kk_kec, $row->kk_kab, $row->kk_provinsi);
            }
        } 

        $this->load->helper('csv');
        array_to_csv($data, 'data_kepala Keluarga_rt'.$rt.'rw'.$rw.'.csv');
    }
	
	function export_datapenduduk(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
		$j=0;
        $data = array();
		 $penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();

        $data[0] = array('NO', 'NAMA', 'NO PENDUDUK', 'Laki/Perempuan', 'TEMPAT LAHIR','TANGGAL LAHIR',
						'AGAMA','USIA','PENDIDIKAN','PEKERJAAN','STATUS PERNIKAHAN','STATUS DALAM KELUARGA','RT','RW');
    
        foreach ($penduduk as $row) {
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));
                $data[++$i] = array($i, $row->nama, $row->no_penduduk, $row->jenis_kelamin, $row->tmpt_lahir, $row->tgl_lahir, 
				$row->agama, $usia->format('%Y tahun'), $row->pendidikan, $row->pekerjaan, $row->status_pernikahan,
				$row->status_dalam_keluarga, $row->rt, $row->rw);
            
        } 
		
		$data[++$i] = array('');
		$data[++$i] = array('', 'NB :');
		$data[++$i] = array('', 'Jenis Kelamin -> (PR = Perempuan, LK = Laki - laki)');
		$data[++$i] = array('', 'Status Pernikahan -> (K = Kawin, BK = Belum Kawin)');

        $this->load->helper('csv');
         array_to_csv($data, 'data_penduduk_rt'.$rt.'rw'.$rw.'.csv');
    }
	
	function export_datapenduduk_sementara(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
        $data = array();
		 $penduduk = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->result();

       $data[0] = array('NO', 'NAMA', 'Laki/Perempuan', 'TEMPAT LAHIR','TANGGAL LAHIR',
						'AGAMA','USIA','PENDIDIKAN','PEKERJAAN','STATUS PERNIKAHAN','STATUS DALAM KELUARGA','RT','RW');
    
        foreach ($penduduk as $row) {
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));
                $data[++$i] = array($i, $row->nama, $row->jenis_kelamin, $row->tmpt_lahir, $row->tgl_lahir, 
				$row->agama, $usia->format('%Y tahun'), $row->pendidikan, $row->pekerjaan, $row->status_pernikahan,
				$row->status_dalam_keluarga, $row->rt, $row->rw);
            
        } 
		
		$data[++$i] = array('');
		$data[++$i] = array('', 'NB :');
		$data[++$i] = array('', 'Jenis Kelamin -> (PR = Perempuan, LK = Laki - laki)');
		$data[++$i] = array('', 'Status Pernikahan -> (K = Kawin, BK = Belum Kawin)');

        $this->load->helper('csv');
        array_to_csv($data, 'data_penduduk_sementara_rt'.$rt.'rw'.$rw.'.csv');
    }
	
	function export_datastatistik_rt(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=5;
		$n=0;
		$r=0;
		$m=0;
		$a=0;
		$u=0;
		$l=0;
		$v=0;
		$g=0;
		$h=0;
		$o=0;
		$o1=0;
        $data = array();
		$penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$penduduk_laki = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki($rt, $rw)->result();
		$penduduk_wanita = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan($rt, $rw)->result();
		$total_sementara = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        $jumlah_kk = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $total_kawin = $this->m_sidapen->total_kawin($rt, $rw)->num_rows();
        $total_belum_kawin = $this->m_sidapen->total_belum_kawin($rt, $rw)->num_rows();
        $total_pria = $this->m_sidapen->total_pria($rt, $rw)->num_rows();
        $total_wanita = $this->m_sidapen->total_wanita($rt, $rw)->num_rows();
		$jumlah3 = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$jumlah6 = $this->m_sidapen->jumlah_penduduk_kawin_rt($rt, $rw)->result();
		$jumlah7 = $this->m_sidapen->jumlah_penduduk_belumkawin_rt($rt, $rw)->result();

        $data[0] = array('PENDUDUK SEMENTARA', 'JUMLAH KEPALA KELUARGA', 'PRIA', 
						'WANITA', 'KAWIN', 'BELUM KAWIN','BALITA','ANAK DI ATAS 5 TAHUN', 
						'17 TAHUN KE ATAS', 'USIA PRODUKTIF', '60 TAHUN KE ATAS', 'Kawin di bawah 17 tahun', 'Kawin di atas 17 tahun');
									
									$balita = array();
									foreach($jumlah3 as $j){
										$usia = date_diff(date_create(), date_create($j->tgl_lahir));
										if($usia->format('%Y') <= '05'){
										   $balita[] = $j->id_status_penduduk;
										}
									}

									$anak = array();
									foreach($jumlah3 as $j4){
										$usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
										if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
										   $anak[] = $j4->id_status_penduduk;
										}
									}

									$dewasa = array();
									foreach($jumlah3 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $dewasa[] = $j13->id_status_penduduk;
										}
									}

									$produktif = array();
									foreach($jumlah3 as $j2){
										$usia2 = date_diff(date_create(), date_create($j2->tgl_lahir));
										if(($usia2->format('%Y') >= '17') AND ($usia2->format('%Y') <= '59')){
										   $produktif[] = $j2->id_status_penduduk;
										}
									}

									$lansia = array();
									foreach($jumlah3 as $j3){
										$usia3 = date_diff(date_create(), date_create($j3->tgl_lahir));
										if($usia3->format('%Y') >= '60'){
										   $lansia[] = $j3->id_status_penduduk;
										}
									}
									
									$kw = array();
									foreach($jumlah6 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){
										   $kw[] = $j10->id_status_penduduk;
										}
									}

									foreach($jumlah6 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $bk[] = $j8->id_status_penduduk;
										}
									}

	   foreach ($penduduk as $row) {
				
                $data[1] = array( $total_sementara,  $jumlah_kk,  $total_pria,  $total_wanita,
				$total_kawin, $total_belum_kawin, count($balita), count($anak), count($dewasa), count($produktif),
				count($lansia), count($kw), count($bk));
            
        }
		$data[++$i] = array('');
		 $data[++$i] = array('','','','Data Pria');
		 $data[++$i] = array('','NO', 'NAMA', 'NOMOR PENDUDUK','JENIS KELAMIN', 'TEMPAT LAHIR','TANGGAL LAHIR', 
		 'AGAMA','PENDIDIKAN','PEKERJAAN','USIA','RT','RW');
    
        foreach ($penduduk_laki as $row) {	
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));		
                $data[++$i] = array('',++$n, $row->nama, $row->no_penduduk, $row->jenis_kelamin, $row->tmpt_lahir, 
				$row->tgl_lahir, $row->agama, $row->pendidikan, $row->pekerjaan, $usia->format('%Y tahun'), $row->rt, $row->rw);
        } 
		$data[++$i] = array('');
		 $data[++$i] = array('', '','','Data wanita');
		 $data[++$i] = array('','NO', 'NAMA', 'NOMOR PENDUDUK','JENIS KELAMIN', 'TEMPAT LAHIR','TANGGAL LAHIR', 
		 'AGAMA','PENDIDIKAN','PEKERJAAN','USIA','RT','RW');
    
        foreach ($penduduk_wanita as $row) {	
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));				
               $data[++$i] = array('',++$r, $row->nama, $row->no_penduduk, $row->jenis_kelamin, $row->tmpt_lahir, 
				$row->tgl_lahir, $row->agama, $row->pendidikan, $row->pekerjaan, $usia->format('%Y tahun'),$row->rt, $row->rw);
        }
		$data[++$i] = array('');
		 $data[++$i] = array('', '','','Data Kawin Keseluruhan');
		 $data[++$i] = array('','NO', 'NAMA', 'NOMOR PENDUDUK','LAKI/PEREMPUAN', 'TEMPAT LAHIR','TANGGAL LAHIR', 
		 'AGAMA','PENDIDIKAN','PEKERJAAN', 'STATUS PERNIKAHAN', 'USIA','RT','RW');
    
        foreach ($jumlah6 as $row) {	
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));		
                $data[++$i] = array('',++$g, $row->nama, $row->no_penduduk, $row->jenis_kelamin, $row->tmpt_lahir, 
				$row->tgl_lahir, $row->agama, $row->pendidikan, $row->pekerjaan, $row->status_pernikahan, $usia->format('%Y tahun'),$row->rt, $row->rw);
        } 
		$data[++$i] = array('');
		 $data[++$i] = array('', '','','Data Kawin Dibawah 17 Tahun');
		 $data[++$i] = array('','NO', 'NAMA', 'NOMOR PENDUDUK','LAKI/PEREMPUAN', 'TEMPAT LAHIR','TANGGAL LAHIR', 
		 'AGAMA','PENDIDIKAN','PEKERJAAN', 'STATUS PERNIKAHAN', 'USIA','RT','RW');
    
        foreach ($jumlah6 as $row) {	
				$usia10 = date_diff(date_create(), date_create($row->tgl_lahir));	
					if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){					
						$data[++$i] = array('',++$o, $row->nama, $row->no_penduduk, $row->jenis_kelamin, $row->tmpt_lahir, 
						$row->tgl_lahir, $row->agama, $row->pendidikan, $row->pekerjaan, $row->status_pernikahan, $usia10->format('%Y tahun'),$row->rt, $row->rw);
			}
		}
		$data[++$i] = array('');
		 $data[++$i] = array('', '','','Data Kawin Diatas 17 Tahun');
		 $data[++$i] = array('','NO', 'NAMA', 'NOMOR PENDUDUK','LAKI/PEREMPUAN', 'TEMPAT LAHIR','TANGGAL LAHIR', 
		 'AGAMA','PENDIDIKAN','PEKERJAAN', 'STATUS PERNIKAHAN', 'USIA','RT','RW');
    
        foreach ($jumlah6 as $row) {	
				$usia10 = date_diff(date_create(), date_create($row->tgl_lahir));	
					if($usia10->format('%Y') >= '17'){					
						$data[++$i] = array('',++$o1, $row->nama, $row->no_penduduk, $row->jenis_kelamin, $row->tmpt_lahir, 
						$row->tgl_lahir, $row->agama, $row->pendidikan, $row->pekerjaan, $row->status_pernikahan, $usia10->format('%Y tahun'),$row->rt, $row->rw);
			}
		}
		$data[++$i] = array('');
		 $data[++$i] = array('', '','','Data Belum Kawin');
		 $data[++$i] = array('','NO', 'NAMA', 'NOMOR PENDUDUK','LAKI/PEREMPUAN', 'TEMPAT LAHIR','TANGGAL LAHIR', 
		 'AGAMA','PENDIDIKAN','PEKERJAAN', 'STATUS PERNIKAHAN', 'USIA','RT','RW');
        foreach ($jumlah7 as $row) {	
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));				
               $data[++$i] = array('',++$h, $row->nama, $row->no_penduduk, $row->jenis_kelamin, $row->tmpt_lahir, 
				$row->tgl_lahir, $row->agama, $row->pendidikan, $row->pekerjaan, $row->status_pernikahan, $usia->format('%Y tahun'),$row->rt, $row->rw);
        }
		 $data[++$i] = array('');
		 $data[++$i] = array('', '','','Data Balita');
		 $data[++$i] = array('','NO', 'NAMA', 'Laki/Perempuan', 'TANGGAL LAHIR', 'USIA','RT','RW');
    
        foreach ($penduduk as $row) {
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));
				if($usia->format('%Y') <= '05'){						
                $data[++$i] = array('',++$m, $row->nama,  $row->jenis_kelamin, $row->tgl_lahir, $usia->format('%Y tahun'),$row->rt, $row->rw);
            }
        } 
		$data[++$i] = array('');
		$data[++$i] = array('', '','','Data anak di atas 5 tahun');
		 $data[++$i] = array('','NO', 'NAMA', 'Laki/Perempuan', 'TANGGAL LAHIR', 'USIA','RT','RW');
    
        foreach ($penduduk as $row) {
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));
				if(($usia->format('%Y') >= '06') AND ($usia->format('%Y') <= '16')){						
                $data[++$i] = array('',++$a, $row->nama,  $row->jenis_kelamin, $row->tgl_lahir, $usia->format('%Y tahun'),$row->rt, $row->rw);
            }
        } 
		
		$data[++$i] = array('');
		$data[++$i] = array('', '','','Data usia di atas 17 tahun');
		 $data[++$i] = array('','NO', 'NAMA', 'Laki/Perempuan', 'TANGGAL LAHIR', 'USIA','RT','RW');
    
        foreach ($penduduk as $row) {
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));
				if($usia->format('%Y') >= '17'){						
                $data[++$i] = array('',++$u, $row->nama,  $row->jenis_kelamin, $row->tgl_lahir, $usia->format('%Y tahun'),$row->rt, $row->rw);
            }
        } 
		
		$data[++$i] = array('');
		$data[++$i] = array('', '','','Data usia produktif');
		 $data[++$i] = array('','NO', 'NAMA', 'Laki/Perempuan', 'TANGGAL LAHIR', 'USIA','RT','RW');
    
        foreach ($penduduk as $row) {
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));
				if(($usia->format('%Y') >= '17') AND ($usia->format('%Y') <= '59')){						
                $data[++$i] = array('',++$l, $row->nama,  $row->jenis_kelamin, $row->tgl_lahir, $usia->format('%Y tahun'),$row->rt, $row->rw);
            }
        } 
		
		$data[++$i] = array('');
		$data[++$i] = array('', '','','Data usia di atas 60 tahun');
		 $data[++$i] = array('','NO', 'NAMA', 'Laki/Perempuan', 'TANGGAL LAHIR', 'USIA','RT','RW');
    
        foreach ($penduduk as $row) {
				$usia = date_diff(date_create(), date_create($row->tgl_lahir));
				if($usia->format('%Y') >= '60'){						
                $data[++$i] = array('',++$v, $row->nama,  $row->jenis_kelamin, $row->tgl_lahir, $usia->format('%Y tahun'),$row->rt, $row->rw);
            }
        } 

		$data[++$i] = array('');
		$data[++$i] = array('', 'NB :');
		$data[++$i] = array('', 'Jenis Kelamin -> (PR = Perempuan, LK = Laki - laki)');
		$data[++$i] = array('', 'Status Pernikahan -> (K = Kawin, BK = Belum Kawin)');

        $this->load->helper('csv');
        array_to_csv($data, 'data_statistik_rt'.$rt.'rw'.$rw.'.csv');
    }
	
    function export2(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
        $data = array();
        $tgl_imunisasi = $this->uri->segment(3);
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
	
	 function cetak_data_statistik_rt(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Penduduk Sementara &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];

        $penduduk = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->result();
		$total_sementara = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
		$jumlah_kk = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $total_kawin = $this->m_sidapen->total_kawin($rt, $rw)->num_rows();
        $total_belum_kawin = $this->m_sidapen->total_belum_kawin($rt, $rw)->num_rows();
        $total_pria = $this->m_sidapen->total_pria($rt, $rw)->num_rows();
        $total_wanita = $this->m_sidapen->total_wanita($rt, $rw)->num_rows();
		$jumlah3 = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		
									foreach($jumlah3 as $j){
										$usia = date_diff(date_create(), date_create($j->tgl_lahir));
										if($usia->format('%Y') <= '05'){
										   $balita[] = $j->id_status_penduduk;
										}
									}

									
								
									foreach($jumlah3 as $j4){
										$usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
										if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
										   $lebihdari5[] = $j4->id_status_penduduk;
										}
									}
									
									foreach($jumlah3 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $atas17[] = $j13->id_status_penduduk;
										}
									}
									
									foreach($jumlah3 as $j2){
										$usia2 = date_diff(date_create(), date_create($j2->tgl_lahir));
										if(($usia2->format('%Y') >= '17') AND ($usia2->format('%Y') <= '59')){
										   $produktif[] = $j2->id_status_penduduk;
										}
									}
									
									foreach($jumlah3 as $j3){
										$usia3 = date_diff(date_create(), date_create($j3->tgl_lahir));
										if($usia3->format('%Y') >= '60'){
										   $lebih60[] = $j3->id_status_penduduk;
										}
									}
									
		$jumlah5 = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki($rt, $rw)->result();
									foreach($jumlah5 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') <= '05'){
										   $jk_balita[] = $j8->id_status_penduduk;
										}
									}
									foreach($jumlah5 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){
										   $jk_atas5[] = $j10->id_status_penduduk;
										}
									}
									foreach($jumlah5 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $jk_17tahun[] = $j13->id_status_penduduk;
										}
									}
									foreach($jumlah5 as $j6){
										$usia6 = date_diff(date_create(), date_create($j6->tgl_lahir));
										if(($usia6->format('%Y') >= '17') AND ($usia6->format('%Y') <= '59')){
										   $jk_produktif[] = $j6->id_status_penduduk;
										}
									}
									foreach($jumlah5 as $j12){
										$usia12 = date_diff(date_create(), date_create($j12->tgl_lahir));
										if($usia12->format('%Y') >= '60'){
										   $jk_60tahun[] = $j12->id_status_penduduk;
										}
									}

									
									
		$jumlah4 = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan($rt, $rw)->result();						
									
								
									foreach($jumlah4 as $j7){
										$usia7 = date_diff(date_create(), date_create($j7->tgl_lahir));
										if($usia7->format('%Y') <= '05'){
										   $jkw_balita[] = $j7->id_status_penduduk;
										}
									}

									
									foreach($jumlah4 as $j9){
										$usia9 = date_diff(date_create(), date_create($j9->tgl_lahir));
										if(($usia9->format('%Y') >= '06') AND ($usia9->format('%Y') <= '16')){
										   $jkw_atas5[] = $j9->id_status_penduduk;
										}
									}

									foreach($jumlah4 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $jkw_17tahun[] = $j13->id_status_penduduk;
										}
									}

									foreach($jumlah4 as $j5){
										$usia5 = date_diff(date_create(), date_create($j5->tgl_lahir));
										if(($usia5->format('%Y') >= '17') AND ($usia5->format('%Y') <= '59')){
										   $jkw_produktif[] = $j5->id_status_penduduk;
										}
									}

								
									foreach($jumlah4 as $j11){
										$usia11 = date_diff(date_create(), date_create($j11->tgl_lahir));
										if($usia11->format('%Y') >= '60'){
										   $jkw_60tahun[] = $j11->id_status_penduduk;
										}
									}
		$jumlah6 = $this->m_sidapen->jumlah_penduduk_kawin_rt($rt, $rw)->result();
									$kurang = array();
									foreach($jumlah6 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $kurang[] = $j10->id_status_penduduk;
										}
									}

									$k_17 = array();
									foreach($jumlah6 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $k_17[] = $j8->id_status_penduduk;
										}
									}
		
		
		$jumlah7 = $this->m_sidapen->jumlah_penduduk_belumkawin_rt($rt, $rw)->result();
		
									foreach($jumlah7 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $bk_17kurang[] = $j10->id_status_penduduk;
										}
									}

									
									foreach($jumlah7 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $bk_17[] = $j8->id_status_penduduk;
										}
									}
									
									foreach($jumlah3 as $j){
										$usia = date_diff(date_create(), date_create($j->tgl_lahir));
										if($usia->format('%Y') <= '05'){
										$status_kependudukan[] = $j->id_status_penduduk;
								}
							}
							
							foreach($jumlah3 as $j4){
								$usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
								if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
								   $status_anakdibawah5[] = $j4->id_status_penduduk;
								}
							}
							foreach($jumlah3 as $j2){
								$usia2 = date_diff(date_create(), date_create($j2->tgl_lahir));
								if(($usia2->format('%Y') >= '17') AND ($usia2->format('%Y') <= '59')){
								   $status_17tahun[] = $j2->id_status_penduduk;
								}
							}
							foreach($jumlah3 as $j3){
								$usia3 = date_diff(date_create(), date_create($j3->tgl_lahir));
								if($usia3->format('%Y') >= '60'){
								   $status_60tahun[] = $j3->id_status_penduduk;
								}
							}


        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA STATISTIK', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Cell('', .3, 'RT '.$rt.' RW '.$rw, 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(10, 1, 'PENDUDUK SEMENTARA', 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, 'JUMLAH KEPALA KELUARGA', 1, '', 'C');
		$this->fpdf->Ln();
		$this->fpdf->Cell(10, 1, $total_sementara, 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, $jumlah_kk, 1, '', 'C');
        $this->fpdf->Ln();
		$this->fpdf->Ln();
				
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(4.5, 1, 'PRIA', 1, '', 'C');
        $this->fpdf->Cell(4.5, 1, 'WANITA', 1, '', 'C');
		$this->fpdf->Cell(4.5, 1, 'KAWIN', 1, '', 'C');
        $this->fpdf->Cell(5.2, 1, 'BELUM KAWIN', 1, '', 'C');
        $this->fpdf->Ln();
		$this->fpdf->Cell(4.5, 1, $total_pria, 1, '', 'C');
        $this->fpdf->Cell(4.5, 1, $total_wanita, 1, '', 'C');
		$this->fpdf->Cell(4.5, 1, $total_kawin, 1, '', 'C');
        $this->fpdf->Cell(5.2, 1, $total_belum_kawin, 1, '', 'C');
		$this->fpdf->Ln();
        $this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(6.2, 1, 'BALITA', 1, '', 'C');
        $this->fpdf->Cell(6.2, 1, 'ANAK DIATAS 5 TAHUN', 1, '', 'C');
		$this->fpdf->Cell(6.2, 1, '17 TAHUN KEATAS', 1, '', 'C');
        $this->fpdf->Ln();
		$this->fpdf->Cell(6.2, 1, count($balita), 1, '', 'C');
        $this->fpdf->Cell(6.2, 1, count($lebihdari5), 1, '', 'C');
		$this->fpdf->Cell(6.2, 1, count($atas17), 1, '', 'C');
		$this->fpdf->Ln();
        $this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(10, 1, 'USIA PRODUKTIF', 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, '60 TAHUN KE ATAS', 1, '', 'C');
        $this->fpdf->Ln();
		       $this->fpdf->Cell(10, 1, count($produktif), 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, count($lebih60), 1, '', 'C');
		$this->fpdf->Ln();
        $this->fpdf->Ln();
		
		
			
			
		
		
		$this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'BERDASARKAN JENIS KELAMIN', 0, 0, 'L');
        $this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'PRIA', 0, 0, 'L');
        $this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(3.5, 1, 'BALITA', 1, '', 'C');
        $this->fpdf->Cell(4.5, 1, 'ANAK DIATAS 5 TAHUN', 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, '17 TAHUN KEATAS', 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, 'USIA PRODUKTIF', 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, 'DIATAS 60 TAHUN', 1, '', 'C');
        $this->fpdf->Ln();
	    $this->fpdf->Cell(3.5, 1, count($jk_balita), 1, '', 'C');
        $this->fpdf->Cell(4.5, 1, count($jk_atas5), 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, count($jk_17tahun), 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, count($jk_produktif), 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, count($jk_60tahun), 1, '', 'C');
		$this->fpdf->Ln();
	
		
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'WANITA', 0, 0, 'L');
        $this->fpdf->Ln();
		
		
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(3.5, 1, 'BALITA', 1, '', 'C');
        $this->fpdf->Cell(4.5, 1, 'ANAK DIATAS 5 TAHUN', 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, '17 TAHUN KEATAS', 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, 'USIA PRODUKTIF', 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, 'DIATAS 60 TAHUN', 1, '', 'C');
        $this->fpdf->Ln();
		$this->fpdf->Cell(3.5, 1, count($jkw_balita), 1, '', 'C');
        $this->fpdf->Cell(4.5, 1, count($jkw_atas5), 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, count($jkw_17tahun), 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, count($jkw_produktif), 1, '', 'C');
		$this->fpdf->Cell(3.5, 1, count($jkw_60tahun), 1, '', 'C');
		$this->fpdf->Ln();
		$this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'BERDASARKAN STATUS PERKAWINAN', 0, 0, 'L');
        $this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'KAWIN', 0, 0, 'L');
        $this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial', 'B', 10);
         $this->fpdf->Cell(10, 1, 'DIBAWAH 17 TAHUN', 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, '17 TAHUN KE ATAS', 1, '', 'C');
        $this->fpdf->Ln();
		$this->fpdf->Cell(10, 1, count($kurang), 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, count($k_17), 1, '', 'C');
		$this->fpdf->Ln();
		$this->fpdf->Ln();
		
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'BELUM KAWIN', 0, 0, 'L');
        $this->fpdf->Ln();
		
		
		$this->fpdf->SetFont('Arial', 'B', 10);
       $this->fpdf->Cell(10, 1, 'DIBAWAH 17 TAHUN', 1, '', 'C');
        $this->fpdf->Cell(8.7, 1, '17 TAHUN KE ATAS', 1, '', 'C');
        $this->fpdf->Ln();
		$this->fpdf->Cell(10, 1, count($bk_17kurang), 1, '', 'C');
        $this->fpdf->Cell(8.7, 1,count($bk_17) , 1, '', 'C');
		$this->fpdf->Ln();
		$this->fpdf->Ln();
		
		
				
		$this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'STATUS KEPENDUDUKAN', 0, 0, 'L');
        $this->fpdf->Ln();
		$this->fpdf->SetFont('Arial', '', 10);
        $this->fpdf->Cell('', 1, 'BALITA', 0, 0, 'L');
		$this->fpdf->Cell('', 1, count($status_kependudukan), 0, 0, 'C');
        $this->fpdf->Ln();
		$this->fpdf->Cell('', 1, 'ANAK DIATAS 5 TAHUN', 0, 0, 'L');
		$this->fpdf->Cell('', 1, count($status_anakdibawah5), 0, 0, 'C');
		 $this->fpdf->Ln();
		$this->fpdf->Cell('', 1, '17 TAHUN KE ATAS', 0, 0, 'L');
		$this->fpdf->Cell('', 1, count($status_17tahun), 0, 0, 'C');
		 $this->fpdf->Ln();
		$this->fpdf->Cell('', 1, '60 TAHUN KE ATAS', 0, 0, 'L');
		$this->fpdf->Cell('', 1, count($status_60tahun), 0, 0, 'C');
		$this->fpdf->Ln();
		$this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell('', 1, 'JUMLAH KEPALA PENDUDUK', 0, 0, 'L');
		$this->fpdf->Cell('', 1, $jumlah_kk, 0, 0, 'C');
		$this->fpdf->Ln();
		$this->fpdf->Cell('', 1, 'JUMLAH PENDUDUK SEMENTARA', 0, 0, 'L');
		$this->fpdf->Cell('', 1, $total_sementara, 0, 0, 'C');
		
        $no = 1;

        foreach($penduduk as $p){
            $usia = date_diff(date_create(), date_create($p->tgl_lahir));

            $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1.3, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(8.7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(4, 1, $p->tgl_lahir, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
                $this->fpdf->Ln();
        }

        $this->fpdf->Output('DAFTAR_DATA_PENDUDUK_SEMENTARA_RT'.$rt.'_RW'.$rw, 'I');
    }
	
    function grafik_penduduk(){
        $data['title'] = 'Grafik Penduduk &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
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
		$data['jumlah8'] = $this->m_sidapen->total_kawin_pria($rt, $rw)->result();
		$data['jumlah9'] = $this->m_sidapen->total_kawin_wanita($rt, $rw)->result();
		$data['jumlah10'] = $this->m_sidapen->total_belum_kawin_pria($rt, $rw)->result();
		$data['jumlah11'] = $this->m_sidapen->total_belum_kawin_wanita($rt, $rw)->result();

        $this->load->view('v_rt_grafik_penduduk', $data);
    }
	
	function data_statistik1(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jml'] = $this->m_sidapen->data_penduduk()->num_rows();
        $data['jml_sementara'] = $this->m_sidapen->data_penduduk_sementara()->num_rows();
        $data['jml_rt'] = $this->m_sidapen->jumlah_rt()->num_rows();
        $data['jml_lurah'] = $this->m_sidapen->jumlah_lurah()->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk()->num_rows();
		$data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->num_rows();
		$data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
		$data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_kawin'] = $this->m_sidapen->total_kawin($rt, $rw)->num_rows();
        $data['total_belum_kawin'] = $this->m_sidapen->total_belum_kawin($rt, $rw)->num_rows();
        $data['total_pria'] = $this->m_sidapen->total_pria($rt, $rw)->num_rows();
        $data['total_wanita'] = $this->m_sidapen->total_wanita($rt, $rw)->num_rows();
		$data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$data['jumlah4'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan($rt, $rw)->result();
		$data['jumlah5'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki($rt, $rw)->result();
		$data['jumlah6'] = $this->m_sidapen->jumlah_penduduk_kawin_rt($rt, $rw)->result();
		$data['jumlah7'] = $this->m_sidapen->jumlah_penduduk_belumkawin_rt($rt, $rw)->result();
		$data['total_sd'] = $this->m_sidapen->data_penduduk_SD($rt, $rw)->num_rows();
		$data['total_smp'] = $this->m_sidapen->data_penduduk_SMP($rt, $rw)->num_rows();
		$data['total_sma'] = $this->m_sidapen->data_penduduk_SMA($rt, $rw)->num_rows();
		$data['total_d3'] = $this->m_sidapen->data_penduduk_D3($rt, $rw)->num_rows();
		$data['total_s1'] = $this->m_sidapen->data_penduduk_S1($rt, $rw)->num_rows();
		$data['total_s2'] = $this->m_sidapen->data_penduduk_S2($rt, $rw)->num_rows();
		$data['total_s3'] = $this->m_sidapen->data_penduduk_S3($rt, $rw)->num_rows();
		$data['jumlah8'] = $this->m_sidapen->total_kawin_pria($rt, $rw)->result();
		$data['jumlah9'] = $this->m_sidapen->total_kawin_wanita($rt, $rw)->result();
		$data['jumlah10'] = $this->m_sidapen->total_belum_kawin_pria($rt, $rw)->result();
		$data['jumlah11'] = $this->m_sidapen->total_belum_kawin_wanita($rt, $rw)->result();
        $this->load->view('v_rt_statistik', $data);
    }
	
		function data_statistik2(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah7'] = $this->m_sidapen->jumlah_penduduk_belumkawin_rt($rt, $rw)->result();
		$data['total_s3'] = $this->m_sidapen->data_penduduk_S3($rt, $rw)->num_rows();
		$data['jumlah_puskesmas'] = $this->m_sidapen->jumlah_puskesmas($rt, $rw)->result();
		
        $this->load->view('v_rt_statistik1', $data);
    }
	
	function data_statistik_pemkel(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_pemkel'] = $this->m_sidapen->jumlah_pemkel($rt, $rw)->result();
		
        $this->load->view('v_rt_statistik_pemkel', $data);
    }
	
	function data_statistik_pendidikan(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_pendidikan'] = $this->m_sidapen->jumlah_pendidikan($rt, $rw)->result();
		
        $this->load->view('v_rt_statistik_pendidikan', $data);
    }
	
	function data_statistik_peribadatan(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_peribadatan'] = $this->m_sidapen->jumlah_peribadatan($rt, $rw)->result();
		
        $this->load->view('v_rt_statistik_peribadatan', $data);
    }
	
	function data_statistik_perekonomian(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_perekonomian'] = $this->m_sidapen->jumlah_perekonomian($rt, $rw)->result();
		
        $this->load->view('v_rt_statistik_perekonomian', $data);
    }
	
	function data_statistik_olahraga(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_olahraga'] = $this->m_sidapen->jumlah_olahraga($rt, $rw)->result();
		
        $this->load->view('v_rt_statistik_olahraga', $data);
    }
	
	function data_statistik_sosial(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_sosial'] = $this->m_sidapen->jumlah_sosial($rt, $rw)->result();
		
        $this->load->view('v_rt_statistik_sosial', $data);
    }
	
	function foto(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jml'] = $this->m_sidapen->data_penduduk()->num_rows();
		$data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jml_sementara'] = $this->m_sidapen->data_penduduk_sementara()->num_rows();
        $data['jml_rt'] = $this->m_sidapen->jumlah_rt()->num_rows();
        $data['jml_lurah'] = $this->m_sidapen->jumlah_lurah()->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk()->num_rows();
		$data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->num_rows();
		$data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
		$data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_kawin'] = $this->m_sidapen->total_kawin($rt, $rw)->num_rows();
        $data['total_belum_kawin'] = $this->m_sidapen->total_belum_kawin($rt, $rw)->num_rows();
        $data['total_pria'] = $this->m_sidapen->total_pria($rt, $rw)->num_rows();
        $data['total_wanita'] = $this->m_sidapen->total_wanita($rt, $rw)->num_rows();
		$data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$data['jumlah4'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan($rt, $rw)->result();
		$data['jumlah5'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki($rt, $rw)->result();
		$data['jumlah6'] = $this->m_sidapen->jumlah_penduduk_kawin_rt($rt, $rw)->result();
		$data['jumlah7'] = $this->m_sidapen->jumlah_penduduk_belumkawin_rt($rt, $rw)->result();
		
        $this->load->view('v_rt_foto1', $data);
    }
	
	function view_foto(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['title'] = 'Data Penduduk';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->result();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->result();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
       
		$data['lihat_foto'] = $this->m_sidapen->lihat_foto($rt, $rw)->result();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        
        $this->load->view('v_rt_data_foto', $data);
    }
}
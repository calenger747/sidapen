<?php if(!defined('BASEPATH')) exit('No direct script allowed');

class Home_rw extends CI_Controller{
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

        if($this->session->userdata('user_role') != '4'){
            echo "
                <script>alert('Maaf, akses tidak diijinkan. Bukan RW.')</script>
                <script>window.location='/sidapen/index.php/redirect'</script>
            ";
        }
    }

    function index(){
        $data['penduduk_hari'] = $this->m_sidapen->data_penduduk_hari()->result();
        $data['title'] = 'Home RW &minus; SIDAPEN';
        $rw = $this->session->userdata('rw');
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rw'] = $this->session->userdata('rw');
        $data['penduduk_hari'] = $this->m_sidapen->penduduk_rw_hari($rw)->result();
        $data['penduduk'] = $this->m_sidapen->penduduk_rw($rw)->result();
        $data['total_hari'] = $this->m_sidapen->penduduk_rw_hari($rw)->num_rows();
        $data['total'] = $this->m_sidapen->penduduk_rw($rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->penduduk_rw_sementara($rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->data_kk_rw($rw)->num_rows();
        
        $this->load->view('v_rw', $data);
    }

    function logout(){
        $this->session->sess_destroy();
        redirect(base_url());
    }

    function profil(){
        $user_id = $this->session->userdata('user_id');
        $data['title'] = 'Profil User  &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rw'] = $this->session->userdata('rw');
        $data['profil'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_rw_profil', $data);
    }

    function ubah_password(){
        $user_id = $this->session->userdata('user_id');
        $data['title'] = 'Ubah Profil &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['rw'] = $this->session->userdata('rw');
        $data['profil'] = $this->m_sidapen->lihat_user($user_id)->result();

        $this->load->view('v_rw_ubah_password', $data);
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
            redirect('home_rw/ubah_password');
        }else{
            $this->session->set_flashdata('pesan', 'Maaf, ada kesalahan. Password gagal diubah.');
            redirect('home_rw/ubah_password');
        }
    }

    function lihat_detail(){
        $id_penduduk = $this->uri->segment(3);
        $data['title'] = 'Detail Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['detail'] = $this->m_sidapen->lihat_detail_penduduk($id_penduduk);
        $this->load->view('v_rw_lihat_detail', $data);
    }
	
	function lihat_detail1(){
        $user_id = $this->uri->segment(3);
        $data['title'] = 'Detail Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['detail'] = $this->m_sidapen->lihat_detail_penduduk1($user_id);
        $this->load->view('v_rw_lihat_detail1', $data);
    }

    function data_kk(){
        $data['title'] = 'Data Kepala Keluarga &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $rw = $this->session->userdata('rw');
        $data['kk'] = $this->m_sidapen->data_kk_rw($rw)->result();
        $data['rw'] = $this->session->userdata('rw');
        $data['total_hari'] = $this->m_sidapen->penduduk_rw_hari($rw)->num_rows();
        $data['total'] = $this->m_sidapen->penduduk_rw($rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->data_kk_rw($rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->penduduk_rw_sementara($rw)->num_rows();

        $this->load->view('v_rw_kk', $data);
    }

    function lihat_detail_kk(){
        $id_kk = $this->uri->segment(3);
        $data['rw'] = $this->session->userdata('rw');
        $data['title'] = 'Detail Kepala Keluarga &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $data['detail'] = $this->m_sidapen->lihat_detail_penduduk_kk($id_kk)->result();
		$data['penduduk'] = $this->m_sidapen->ambil_penduduk($id_kk)->result();
        $this->load->view('v_rw_lihat_detail_kk', $data);
    }

    function data_penduduk(){
        $data['title'] = 'Data Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $rw = $this->session->userdata('rw');
        $data['penduduk'] = $this->m_sidapen->penduduk_rw($rw)->result();
        $data['rw'] = $this->session->userdata('rw');
        $data['total_hari'] = $this->m_sidapen->penduduk_rw_hari($rw)->num_rows();
        $data['total'] = $this->m_sidapen->penduduk_rw($rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->data_kk_rw($rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->penduduk_rw_sementara($rw)->num_rows();
        
        $this->load->view('v_rw_data_penduduk', $data);
    }

    function data_penduduk_sementara(){
        $data['title'] = 'Data Penduduk &minus; SIDAPEN';
        $data['nama'] = $this->session->userdata('user_nama');
        $rw = $this->session->userdata('rw');
        $data['penduduk'] = $this->m_sidapen->penduduk_rw_sementara($rw)->result();
        $data['rw'] = $this->session->userdata('rw');
        $data['total_hari'] = $this->m_sidapen->penduduk_rw_hari($rw)->num_rows();
        $data['total'] = $this->m_sidapen->penduduk_rw($rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->data_kk_rw($rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->penduduk_rw_sementara($rw)->num_rows();

        $this->load->view('v_rw_lihat_penduduk_sementara', $data);
    }

    function cetak_kk(){
        $this->load->library('fpdf');

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
	
	 function cetak_data_penduduk(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Pemilu &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
		$penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA PENDUDUK', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Cell('', .3, ' RW '.$rw, 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(1, 1, 'NO.', 1, '', 'C');
        $this->fpdf->Cell(7, 1, 'NAMA', 1, '', 'C');
        $this->fpdf->Cell(2, 1, 'LK/PR', 1, '', 'C');
        $this->fpdf->Cell(3, 1, 'TANGGAL LAHIR', 1, '', 'C');
        $this->fpdf->Cell(3, 1, 'USIA', 1, '', 'C');
		$this->fpdf->Cell(1.5, 1, 'RT', 1, '', 'C');
		$this->fpdf->Cell(1.5, 1, 'RW', 1, '', 'C');
        $this->fpdf->Ln();

        $no = 1;

        foreach($penduduk as $p){
            $usia = date_diff(date_create(), date_create($p->tgl_lahir));

            $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $p->tgl_lahir, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
				$this->fpdf->Cell(1.5, 1, $p->rt, 1, '', 'C');
				$this->fpdf->Cell(1.5, 1, $p->rw, 1, '', 'C');
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

        
		$penduduk = $this->m_sidapen->data_penduduk_rw_sementara($rw)->result();
        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA PENDUDUK SEMENTARA', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Cell('', .3, ' RW '.$rw, 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

        $this->fpdf->SetFont('Arial', 'B', 10);
        $this->fpdf->Cell(1, 1, 'NO.', 1, '', 'C');
        $this->fpdf->Cell(7, 1, 'NAMA', 1, '', 'C');
        $this->fpdf->Cell(2, 1, 'LK/PR', 1, '', 'C');
        $this->fpdf->Cell(3, 1, 'TANGGAL LAHIR', 1, '', 'C');
        $this->fpdf->Cell(3, 1, 'USIA', 1, '', 'C');
		$this->fpdf->Cell(1.5, 1, 'RT', 1, '', 'C');
		$this->fpdf->Cell(1.5, 1, 'RW', 1, '', 'C');
        $this->fpdf->Ln();

        $no = 1;

        foreach($penduduk as $p){
            $usia = date_diff(date_create(), date_create($p->tgl_lahir));

            $this->fpdf->SetFont('Arial', '', 12);
                $this->fpdf->Cell(1, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(7, 1, $p->nama, 1, '', 'C');
                $this->fpdf->Cell(2, 1, $p->jenis_kelamin, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $p->tgl_lahir, 1, '', 'C');
                $this->fpdf->Cell(3, 1, $usia->format('%y tahun'), 1, '', 'C');
				$this->fpdf->Cell(1.5, 1, $p->rt, 1, '', 'C');
				$this->fpdf->Cell(1.5, 1, $p->rw, 1, '', 'C');
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

        $penduduk = $this->m_sidapen->data_kk_rw($rw)->result();

        $this->fpdf->FPDF('P', 'cm', 'A4');
        $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', 'B', 12);
        $this->fpdf->Cell('', 1, 'DATA KEPALA KELUARGA', 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Cell('', .3, ' RW '.$rw, 0, 0, 'C');
        $this->fpdf->Ln();
        $this->fpdf->Ln();
        $this->fpdf->Ln();

         $this->fpdf->SetFont('Arial', 'B', 8);
        $this->fpdf->Cell(1, 1, 'NO.', 1, '', 'C');
        $this->fpdf->Cell(4.5, 1, 'NAMA', 1, '', 'C');
        $this->fpdf->Cell(4.5, 1, 'KKI', 1, '', 'C');
        $this->fpdf->Cell(5, 1, 'JALAN', 1, '', 'C');
		$this->fpdf->Cell(2, 1, 'RT', 1, '', 'C');
		$this->fpdf->Cell(2, 1, 'RW', 1, '', 'C');
        $this->fpdf->Ln();

        $no = 1;

        foreach($penduduk as $p){
           $this->fpdf->SetFont('Arial', '', 8);
                $this->fpdf->Cell(1, 1, $no++.'.', 1, '', 'C');
                $this->fpdf->Cell(4.5, 1, $p->kk_nama, 1, '', 'C');
                $this->fpdf->Cell(4.5, 1, $p->kki, 1, '', 'C');
                $this->fpdf->Cell(5, 1, $p->kk_jalan, 1, '', 'C');
				$this->fpdf->Cell(2, 1, $p->kk_rt, 1, '', 'C');
				$this->fpdf->Cell(2, 1, $p->kk_rw, 1, '', 'C');
                $this->fpdf->Ln();
        }

        $this->fpdf->Output('DAFTAR_DATA_KEPALA_KELUARGA_RT'.$rt.'_RW'.$rw, 'I');
    }
	
	function export_datakk(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
        $data = array();
		$penduduk = $this->m_sidapen->data_kk_rw($rw)->result();

        $data[0] = array('NO', 'NAMA', 'KKI', 'JALAN', 'KOMPLEK', 'RT', 'RW', 'KELURAHAN', 'KECAMATAN', 'KABUPATEN', 'PROVINSI');
    
        foreach ($penduduk as $row) {
            if(($row->id_status_penduduk = '1')){
                $data[++$i] = array($i, $row->kk_nama, $row->kki, $row->kk_jalan, 
				$row->kk_komplek, $row->kk_rt, $row->kk_rw, $row->kk_kel, $row->kk_kec, $row->kk_kab, $row->kk_provinsi);
            }
        } 

        $this->load->helper('csv');
        array_to_csv($data, 'data_kepala Keluarga_rw'.$rw.'.csv');
    }

	function export_datapenduduk(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
		$j=0;
        $data = array();
		 $penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();

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
        array_to_csv($data, 'data_penduduk_rw'.$rw.'.csv');
    }
	
	function export_datapenduduk_sementara(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $i=0;
        $data = array();
		 $penduduk = $this->m_sidapen->data_penduduk_rw_sementara($rw)->result();

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
        array_to_csv($data, 'data_penduduk_sementara_rw'.$rw.'.csv');
    }
	
	 function cetak_data_statistik_rt(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Penduduk Sementara &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
		$data['rt'] = $this->input->get('rt');
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

        $this->fpdf->Output('DAFTAR_DATA_PENDUDUK_SEMENTARA_RT'.$rt.'_RW'.$rw, 'I');
    }
	
	function cetak_data_statistik_rw(){
        $this->load->library('fpdf');

        $data['title'] = 'Cetak Data Penduduk Sementara &minus; SIDAPEN';
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];

        $penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();
		$penduduk_laki = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki_rw($rw)->result();
		$penduduk_wanita = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan_rw($rw)->result();
		$total_sementara = $this->m_sidapen->data_penduduk_rw_sementara($rw)->num_rows();
        $jumlah_kk = $this->m_sidapen->jumlah_kk_rw($rw)->num_rows();
        $total_kawin = $this->m_sidapen->total_kawin1($rw)->num_rows();
        $total_belum_kawin = $this->m_sidapen->total_belum_kawin1($rw)->num_rows();
        $total_pria = $this->m_sidapen->total_pria1($rw)->num_rows();
        $total_wanita = $this->m_sidapen->total_wanita1($rw)->num_rows();
		$jumlah3 = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();
		$jumlah6 = $this->m_sidapen->jumlah_penduduk_kawin_rw($rw)->result();
		$jumlah7 = $this->m_sidapen->jumlah_penduduk_belumkawin_rw($rw)->result();
		
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
									
		$jumlah5 = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki_rw($rw)->result();
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

									
									
		$jumlah4 = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan_rw($rw)->result();						
									
								
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
		
									$kurang = array();
									foreach($jumlah6 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $kurang[] = $j10->id_status_penduduk;
										}
									}
									
									foreach($jumlah6 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $k_17[] = $j8->id_status_penduduk;
										}
									}
		
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
        $this->fpdf->Cell('', .3, ' RW '.$rw, 0, 0, 'C');
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

        $this->fpdf->Output('DAFTAR_DATA_PENDUDUK_SEMENTARA_RW'.$rw, 'I');
    }
	
	function export_datastatistik_rw(){
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
		$penduduk = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();
		$penduduk_laki = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki_rw($rw)->result();
		$penduduk_wanita = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan_rw($rw)->result();
		$total_sementara = $this->m_sidapen->data_penduduk_rw_sementara($rw)->num_rows();
        $jumlah_kk = $this->m_sidapen->jumlah_kk_rw($rw)->num_rows();
        $total_kawin = $this->m_sidapen->total_kawin1($rw)->num_rows();
        $total_belum_kawin = $this->m_sidapen->total_belum_kawin1($rw)->num_rows();
        $total_pria = $this->m_sidapen->total_pria1($rw)->num_rows();
        $total_wanita = $this->m_sidapen->total_wanita1($rw)->num_rows();
		$jumlah3 = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();
		$jumlah6 = $this->m_sidapen->jumlah_penduduk_kawin_rw($rw)->result();
		$jumlah7 = $this->m_sidapen->jumlah_penduduk_belumkawin_rw($rw)->result();

        $data[0] = array('PENDUDUK SEMENTARA', 'JUMLAH KEPALA KELUARGA', 'PRIA', 
						'WANITA', 'KAWIN', 'BELUM KAWIN','BALITA','ANAK DI ATAS 5 TAHUN', 
						'17 TAHUN KE ATAS', 'USIA PRODUKTIF', '60 TAHUN KE ATAS', 'Kawin di bawah 17 tahun', 'Kawin di atas 17 tahun');
  
									foreach($jumlah3 as $j){
										$usia = date_diff(date_create(), date_create($j->tgl_lahir));
										if($usia->format('%Y') <= '05'){
										   $balita[] = $j->id_status_penduduk;
										}
									}

									foreach($jumlah3 as $j4){
										$usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
										if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
										   $anak[] = $j4->id_status_penduduk;
										}
									}

									foreach($jumlah3 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $dewasa[] = $j13->id_status_penduduk;
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

									$bk = array();
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
        array_to_csv($data, 'data_statistik_RW'.$rw.'.csv');
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

		$data[++$i] = array('');
		$data[++$i] = array('', 'NB :');
		$data[++$i] = array('', 'Jenis Kelamin -> (PR = Perempuan, LK = Laki - laki)');
		$data[++$i] = array('', 'Status Pernikahan -> (K = Kawin, BK = Belum Kawin)');

        $this->load->helper('csv');
        array_to_csv($data, 'data_statistik_rw'.$rw.'.csv');
    }
	
	function export_datastatistik_rt(){
        $data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
		$data['rt'] = $this->input->get('rt');
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
  
									foreach($jumlah3 as $j){
										$usia = date_diff(date_create(), date_create($j->tgl_lahir));
										if($usia->format('%Y') <= '05'){
										   $balita[] = $j->id_status_penduduk;
										}
									}

									foreach($jumlah3 as $j4){
										$usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
										if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
										   $anak[] = $j4->id_status_penduduk;
										}
									}

									foreach($jumlah3 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $dewasa[] = $j13->id_status_penduduk;
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
	
    function grafik_penduduk(){
        $data['title'] = 'Grafik Penduduk &minus; SIDAPEN';
        $rt = '';
        $rw = $this->uri->segment(3);
        $data['rt'] = $rt;
        $data['rw'] = $rw;
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rw($rw)->num_rows();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rw_sementara($rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt2($rw)->num_rows();
        $data['total_kawin1'] = $this->m_sidapen->total_kawin1($rw)->num_rows();
        $data['total_belum_kawin1'] = $this->m_sidapen->total_belum_kawin1($rw)->num_rows();
        $data['total_pria1'] = $this->m_sidapen->total_pria1($rw)->num_rows();
        $data['total_wanita1'] = $this->m_sidapen->total_wanita1($rw)->num_rows();
        $data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();
		$data['jumlah6'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan_rw($rw)->result();
		$data['jumlah7'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki_rw($rw)->result();
		$data['jumlah8'] = $this->m_sidapen->total_kawin_pria1($rw)->result();
		$data['jumlah9'] = $this->m_sidapen->total_kawin_wanita1($rw)->result();
		$data['jumlah10'] = $this->m_sidapen->total_belum_kawin_pria1($rw)->result();
		$data['jumlah11'] = $this->m_sidapen->total_belum_kawin_wanita1($rw)->result();

        $this->load->view('v_rw_grafik_penduduk', $data);
    }
	
	 function grafik_penduduk1(){
        $data['title'] = 'Grafik Penduduk &minus; SIDAPEN';
        $data['rt'] = $this->input->get('rt');
		$data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->num_rows();
        $data['jumlah_hari'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->num_rows();
        $data['total_sementara'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_kawin'] = $this->m_sidapen->total_kawin2($rt)->num_rows();
        $data['total_belum_kawin'] = $this->m_sidapen->total_belum_kawin2($rt)->num_rows();
        $data['total_pria'] = $this->m_sidapen->total_pria2($rt)->num_rows();
        $data['total_wanita'] = $this->m_sidapen->total_wanita2($rt)->num_rows();
        $data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$data['jumlah4'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan($rt, $rw)->result();
		$data['jumlah5'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki($rt, $rw)->result();
		$data['jumlah8'] = $this->m_sidapen->total_kawin_pria($rt, $rw)->result();
		$data['jumlah9'] = $this->m_sidapen->total_kawin_wanita($rt, $rw)->result();
		$data['jumlah10'] = $this->m_sidapen->total_belum_kawin_pria($rt, $rw)->result();
		$data['jumlah11'] = $this->m_sidapen->total_belum_kawin_wanita($rt, $rw)->result();
		
        $this->load->view('v_rw_grafik_penduduk1', $data);
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
		$data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rw($rw)->num_rows();
		$data['total_sementara'] = $this->m_sidapen->data_penduduk_rw_sementara($rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt2($rw)->num_rows();
        $data['total_kawin1'] = $this->m_sidapen->total_kawin1($rw)->num_rows();
        $data['total_belum_kawin1'] = $this->m_sidapen->total_belum_kawin1($rw)->num_rows();
        $data['total_pria1'] = $this->m_sidapen->total_pria1($rw)->num_rows();
        $data['total_wanita1'] = $this->m_sidapen->total_wanita1($rw)->num_rows();
        $data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_rw($rw)->result();
		$data['penduduk'] = $this->m_sidapen->penduduk_rw1($rw)->result();
		$data['jumlah6'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan_rw($rw)->result();
		$data['jumlah7'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki_rw($rw)->result();
		$data['jumlah8'] = $this->m_sidapen->jumlah_penduduk_kawin_rw($rw)->result();
		$data['jumlah9'] = $this->m_sidapen->jumlah_penduduk_belumkawin_rw($rw)->result();
		$data['total_sd'] = $this->m_sidapen->data_penduduk_SD_rw($rw)->num_rows();
		$data['total_smp'] = $this->m_sidapen->data_penduduk_SMP_rw($rw)->num_rows();
		$data['total_sma'] = $this->m_sidapen->data_penduduk_SMA_rw($rw)->num_rows();
		$data['total_d3'] = $this->m_sidapen->data_penduduk_D3_rw($rw)->num_rows();
		$data['total_s1'] = $this->m_sidapen->data_penduduk_S1_rw($rw)->num_rows();
		$data['total_s2'] = $this->m_sidapen->data_penduduk_S2_rw($rw)->num_rows();
		$data['total_s3'] = $this->m_sidapen->data_penduduk_S3_rw($rw)->num_rows();
		$data['jumlah10'] = $this->m_sidapen->total_kawin_pria1($rw)->result();
		$data['jumlah11'] = $this->m_sidapen->total_kawin_wanita1($rw)->result();
		$data['jumlah12'] = $this->m_sidapen->total_belum_kawin_pria1($rw)->result();
		$data['jumlah13'] = $this->m_sidapen->total_belum_kawin_wanita1($rw)->result();
		
        $this->load->view('v_rw_statistik', $data);
    }
	
	function data_statistik2(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
		$data['rt'] = $this->input->get('rt');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
        $data['jml'] = $this->m_sidapen->data_penduduk()->num_rows();
        $data['jml_sementara'] = $this->m_sidapen->data_penduduk_sementara()->num_rows();
        $data['jml_rt'] = $this->m_sidapen->jumlah_rt()->num_rows();
        $data['jml_lurah'] = $this->m_sidapen->jumlah_lurah()->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk()->num_rows();
		$data['jumlah'] = $this->m_sidapen->jumlah_penduduk_rw($rw)->num_rows();
		$data['total_sementara'] = $this->m_sidapen->data_penduduk_rw_sementara($rw)->num_rows();
        $data['jumlah_kk'] = $this->m_sidapen->jumlah_kk_rt2($rw)->num_rows();
        $data['total_kawin1'] = $this->m_sidapen->total_kawin1($rw)->num_rows();
        $data['total_belum_kawin1'] = $this->m_sidapen->total_belum_kawin1($rw)->num_rows();
        $data['total_pria1'] = $this->m_sidapen->total_pria1($rw)->num_rows();
        $data['total_wanita1'] = $this->m_sidapen->total_wanita1($rw)->num_rows();
        $data['jumlah3'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$data['penduduk'] = $this->m_sidapen->penduduk_rw1($rw)->result();
		$data['penduduk3'] = $this->m_sidapen->penduduk_lurah_rt1($rt)->result();
		
		
		$data['jumlah2'] = $this->m_sidapen->jumlah_penduduk_rt($rt, $rw)->num_rows();
        $data['jumlah_hari2'] = $this->m_sidapen->jumlah_penduduk_rt_hari($rt, $rw)->num_rows();
        $data['total_sementara2'] = $this->m_sidapen->data_penduduk_rt_sementara($rt, $rw)->num_rows();
        $data['jumlah_kk2'] = $this->m_sidapen->jumlah_kk_rt($rt, $rw)->num_rows();
        $data['total_kawin2'] = $this->m_sidapen->total_kawin($rt, $rw)->num_rows();
        $data['total_belum_kawin2'] = $this->m_sidapen->total_belum_kawin($rt, $rw)->num_rows();
        $data['total_pria2'] = $this->m_sidapen->total_pria($rt, $rw)->num_rows();
        $data['total_wanita2'] = $this->m_sidapen->total_wanita($rt, $rw)->num_rows();
        $data['jumlah4'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi($rt, $rw)->result();
		$data['jumlah5'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_perempuan($rt, $rw)->result();
		$data['jumlah6'] = $this->m_sidapen->data_penduduk_pemilu_imunisasi_laki($rt, $rw)->result();
		$data['jumlah7'] = $this->m_sidapen->jumlah_penduduk_kawin_rt($rt, $rw)->result();
		$data['jumlah8'] = $this->m_sidapen->jumlah_penduduk_belumkawin_rt($rt, $rw)->result();
		$data['total_sd'] = $this->m_sidapen->data_penduduk_SD($rt, $rw)->num_rows();
		$data['total_smp'] = $this->m_sidapen->data_penduduk_SMP($rt, $rw)->num_rows();
		$data['total_sma'] = $this->m_sidapen->data_penduduk_SMA($rt, $rw)->num_rows();
		$data['total_d3'] = $this->m_sidapen->data_penduduk_D3($rt, $rw)->num_rows();
		$data['total_s1'] = $this->m_sidapen->data_penduduk_S1($rt, $rw)->num_rows();
		$data['total_s2'] = $this->m_sidapen->data_penduduk_S2($rt, $rw)->num_rows();
		$data['total_s3'] = $this->m_sidapen->data_penduduk_S3($rt, $rw)->num_rows();
		$data['jumlah10'] = $this->m_sidapen->total_kawin_pria($rt, $rw)->result();
		$data['jumlah11'] = $this->m_sidapen->total_kawin_wanita($rt, $rw)->result();
		$data['jumlah12'] = $this->m_sidapen->total_belum_kawin_pria($rt, $rw)->result();
		$data['jumlah13'] = $this->m_sidapen->total_belum_kawin_wanita($rt, $rw)->result();
		
        $this->load->view('v_rw1_statistik', $data);
    }
	
		function data_statistik_kesehatan(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_puskesmas'] = $this->m_sidapen->jumlah_puskesmas_rw($rw)->result();
		
        $this->load->view('v_rw_statistik_kesehatan', $data);
    }
	
	function data_statistik_pemkel(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_pemkel'] = $this->m_sidapen->jumlah_pemkel_rw($rw)->result();
		
        $this->load->view('v_rw_statistik_pemkel', $data);
    }
	
	function data_statistik_pendidikan(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_pendidikan'] = $this->m_sidapen->jumlah_pendidikan_rw($rw)->result();
		
        $this->load->view('v_rw_statistik_pendidikan', $data);
    }
	
	function data_statistik_peribadatan(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_peribadatan'] = $this->m_sidapen->jumlah_peribadatan_rw($rw)->result();
		
        $this->load->view('v_rw_statistik_peribadatan', $data);
    }
	
	function data_statistik_perekonomian(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_perekonomian'] = $this->m_sidapen->jumlah_perekonomian_rw($rw)->result();
		
        $this->load->view('v_rw_statistik_perekonomian', $data);
    }
	
	function data_statistik_olahraga(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_olahraga'] = $this->m_sidapen->jumlah_olahraga_rw($rw)->result();
		
        $this->load->view('v_rw_statistik_olahraga', $data);
    }
	
	function data_statistik_sosial(){
        $data['title'] = 'Data Statistik &minus; SIDAPEN';
		$data['rt'] = $this->session->userdata('rt');
        $data['rw'] = $this->session->userdata('rw');
        $rt = $data['rt'];
        $rw = $data['rw'];
        $data['nama'] = $this->session->userdata('user_nama');
		$data['jumlah_sosial'] = $this->m_sidapen->jumlah_sosial_rw($rw)->result();
		
        $this->load->view('v_rw_statistik_sosial', $data);
    }
}

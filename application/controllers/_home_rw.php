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
        $data['title'] = 'Home Lurah &minus; SIDAPEN';
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

        $this->load->view('v_rw_grafik_penduduk', $data);
    }
}
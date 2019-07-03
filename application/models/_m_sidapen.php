<?php if(!defined('BASEPATH')) exit('No direct script allowed');
class m_sidapen extends CI_Model{
    public function __construct(){
        parent::__construct();
        
    }
    
    // Login //
    function cek_user($user, $pass){
        $this->db->select('*');
        return $this->db->get_where("tbl_m_user", array('user_name' => $user, 'user_password' => $pass));
    }

    // Admin //
    function tambah_rt(){
        $user = $this->input->post('user_name');
        $rt = $this->input->post('rt');
        $rw = $this->input->post('rw');
        $cek_rt = $this->db->query("SELECT user_name, rt, rw FROM tbl_m_user WHERE user_name='$user' OR rt='$rt' AND rw='$rw'");
        if($cek_rt->num_rows() > 0){
            echo "ERROR";
        } else {
            $rt_baru = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_password' => $this->input->post('user_password'),
                    'user_role' => $this->input->post('user_role'),
                    'user_nama' => $this->input->post('user_nama'),
                    'rt' => $this->input->post('rt'),
                    'rw' => $this->input->post('rw'),
                    'tanggal_input' => $this->input->post('tanggal_input')
            );

            $insert_rt = $this->db->insert('tbl_m_user', $rt_baru);
            if($insert_rt >= 1){
                return true;
            } else {
                return false;
            }
        }
    }

    function cek_rw($user, $rw, $user_id){
        return $this->db->query("SELECT * FROM tbl_m_user WHERE (user_id!='$user_id' AND user_name='$user' AND user_role='4') OR (user_id!='$user_id' AND rw='$rw' AND user_role='4')");
    }

    function cek_kk($kki, $id_kk){
        return $this->db->query("SELECT * FROM tbl_t_keluarga WHERE id_kk!='$id_kk' AND kki='$kki'");
    }

    function tambah_rw($data){
        $this->db->insert('tbl_m_user', $data);
    }

    function lihat_rt(){
        return $this->db->get_where('tbl_m_user', array('user_role' => '1'));
    }

    function lihat_rw(){
        return $this->db->get_where('tbl_m_user', array('user_role' => '4'));
    }

    function rt_hari(){
        $this->db->where('tanggal_input = CURDATE()');
        return $this->db->get_where('tbl_m_user', array('user_role' => '1'));
    }

    function hapus_rt($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_m_user');
    }

    function hapus_rw($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_m_user');
    }

    function update_rt($user_id, $data){
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_m_user', $data);
    }

    function update_rw($user_id, $data){
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_m_user', $data);
    }

    function hapus_data($id_penduduk){
        return $this->db->delete('tbl_t_penduduk', array('id_penduduk' => $id_penduduk));
    }

    function hapus_data_kk($id_kk){
        return $this->db->delete('tbl_t_keluarga', array('id_kk' => $id_kk));
    }

    function tambah_lurah(){
        $user = $this->input->post('user_name');
        $cek_lurah = $this->db->query("SELECT user_name FROM tbl_m_user WHERE user_name='$user'");
        if($cek_lurah->num_rows() > 0){
            echo "ERROR";
        } else {
            $lurah_baru = array(
                    'user_name' => $this->input->post('user_name'),
                    'user_password' => $this->input->post('user_password'),
                    'user_role' => $this->input->post('user_role'),
                    'user_nama' => $this->input->post('user_nama'),
                    'tanggal_input' => $this->input->post('tanggal_input')
                );

            $insert_lurah = $this->db->insert('tbl_m_user', $lurah_baru);
            if($insert_lurah >= 1){
                return true;
            } else {
                return false;
            }
        }
    }

    function lihat_lurah(){
        return $this->db->get_where('tbl_m_user', array('user_role' => '2'));
    }

    function lurah_hari(){
        $this->db->where('tanggal_input = CURDATE()');
        return $this->db->get_where('tbl_m_user', array('user_role' => '2'));
    }

    function hapus_lurah($user_id){
        $this->db->where('user_id', $user_id);
        $this->db->delete('tbl_m_user');
    }

    function update_lurah($user_id, $data){
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_m_user', $data);
    }

    function cek_lurah(){
        $cek_lurah = $this->db->query("SELECT user_name FROM tbl_m_user WHERE user_name='$user'");
        return $cek_lurah->result();
    }

    function lihat_user($user_id){
        return $this->db->get_where('tbl_m_user', array('user_id' => $user_id));
    }

    function lihat_detail_penduduk($id_penduduk){
        $detail_pen = $this->db->get_where('tbl_t_penduduk', array('id_penduduk' => $id_penduduk));
        return $detail_pen->result();
    }

    function lihat_detail_penduduk_kk($id_kk){
        return $this->db->get_where('tbl_t_keluarga', array('id_kk' => $id_kk));
    }

    function simpan_kk($kk){
        $no_kki = $this->input->post('kki');
        $cek_kk = $this->db->get_where('tbl_t_keluarga', array('kki' => $no_kki));        
        if ($cek_kk->num_rows() > 0) {
            echo "<script>alert('Gagal menyimpan data. Nomor KKI sudah terdaftar.')</script>";
            echo "<script>window.history.back()</script>";
        } else {
            return $this->db->insert('tbl_t_keluarga', $kk);
        }
    }

    function simpan_km($km){
        $this->db->insert('tbl_t_keluarga_meninggal', $km);
    }

    function simpan_ksb($ksb){
        $this->db->insert('tbl_t_keluarga_status_dan_kb', $ksb);
    }

    function simpan_ks($ks){
        $this->db->insert('tbl_t_keluarga_sejahtera', $ks);
    }

    function simpan_kgm($kgm){
        $this->db->insert('tbl_t_keluarga_get_modal', $kgm);
    }

    function simpan_ik($penduduk){
        $this->db->insert_batch('tbl_t_penduduk', $penduduk);
    }

    function simpan_data_penduduk($penduduk){
        $no_pend = $this->input->post('no_penduduk');
        $cek_no_pend = $this->db->get_where('tbl_t_penduduk', array('no_penduduk' => $no_pend));        
        if ($cek_no_pend->num_rows() > 0) {
            echo "<script>window.history.back()</script>";
        } else {
            $insert = $this->db->insert('tbl_t_penduduk', $penduduk);
            

            if($insert >= 1){
                return true;
            }else{
                return false;
            }
        }      
    }

    function cek_nopen_id($no_penduduk){
        $this->db->select('no_penduduk');
        $this->db->where('no_penduduk !=', $no_penduduk);
        return $this->db->get("tbl_t_penduduk");
    }

    function cek_nopen($nik, $count_nama){
        for($i=0; $i<$count_nama; $i++){
            $this->db->where('no_penduduk', $nik[$i]);
        }

        return $this->db->get('tbl_t_penduduk');
    }

    function hapus_data_id_kk($id_kk){
        $this->db->delete('tbl_t_keluarga', array('id_kk' => $id_kk));
        $this->db->delete('tbl_t_keluarga_get_modal', array('id_kk' => $id_kk));
        $this->db->delete('tbl_t_keluarga_meninggal', array('id_kk' => $id_kk));
        $this->db->delete('tbl_t_keluarga_sejahtera', array('id_kk' => $id_kk));
        $this->db->delete('tbl_t_keluarga_status_dan_kb', array('id_kk' => $id_kk));
    }

    function cek_user_rt($user_id, $user_role, $rt, $rw){
        return $this->db->query("SELECT * FROM tbl_m_user WHERE user_id != $user_id AND user_role='$user_role' AND rt='$rt' AND rw='$rw'");
    }

    function cek_user_lurah($user_id, $user_role){
        return $this->db->query("SELECT * FROM tbl_m_user WHERE user_id != $user_id AND user_role='$user_role'");
    }

    function update_penduduk($data, $id_penduduk){
        $this->db->where('id_penduduk', $id_penduduk);
        $this->db->update('tbl_t_penduduk', $data);
    }

    function update_kk($data, $id_kk){
        $this->db->where('id_kk', $id_kk);
        $this->db->update('tbl_t_keluarga', $data);
    }

    function update_password($user_id, $data){
        $this->db->where('user_id', $user_id);
        $this->db->update('tbl_m_user', $data);
    }
    
    function jenis_kelamin()
    {
        $jk = $this->db->get("tbl_m_jenis_kelamin");
        return $jk->result();
    }
    
    function gol_darah(){
        $gd = $this->db->get("tbl_m_golongan_darah");
        return $gd->result();
    }
    
    function pendidikan(){
        $p = $this->db->get("tbl_m_pendidikan");
        return $p->result();
    }
    
    function status_pernikahan(){
        $sp = $this->db->get("tbl_m_status_pernikahan");
        return $sp->result();
    }
    
    function status_sosial(){
        $ss = $this->db->get("tbl_m_status_sosial");
        return $ss->result();
    }
    
    function agama(){
        $agama = $this->db->get("tbl_m_agama");
        return $agama->result();
    }
    
    function warga_negara(){
        $wn = $this->db->get("tbl_m_warga_negara");
        return $wn->result();
    }

    function data_penduduk(){
        $this->db->where('tempat_tinggal !=', 'KONTRAK');
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1'));
    }

    function data_penduduk_sementara(){
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'tempat_tinggal' => 'KONTRAK'));
    }

    function data_penduduk_hari(){
        return $this->db->query("SELECT *, DATE_FORMAT(tgl_lahir, '%d-%m-%Y') FROM tbl_t_penduduk WHERE id_status_penduduk='1' AND tanggal_input=CURDATE()");
    }

    function data_penduduk_hari_rt($rt, $rw){
        return $this->db->query("SELECT * FROM tbl_t_penduduk WHERE id_status_penduduk='1' AND rt='$rt' AND rw='$rw' AND tanggal_input=CURDATE()");
    }

    function data_penduduk_rt($rt, $rw){
        $this->db->where('tempat_tinggal !=', 'KONTRAK');
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'rt' => $rt, 'rw' => $rw));
    }

    function data_penduduk_rt2($rt, $rw){
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'rt' => $rt, 'rw' => $rw));
    }

    function data_penduduk_rt_sementara($rt, $rw){
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'rt' => $rt, 'rw' => $rw, 'tempat_tinggal' => 'KONTRAK'));
    }

    function data_penduduk_hari_rt_cetak($rt, $rw){
        $this->db->order_by('nama', 'ASC');
        return $this->db->query("SELECT * FROM tbl_t_penduduk WHERE id_status_penduduk='1' AND rt='$rt' AND rw='$rw' AND tanggal_input=CURDATE()");
    }

    function data_penduduk_pemilu_imunisasi($rt, $rw){
        $this->db->order_by('nama', 'ASC');
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'rt' => $rt, 'rw' => $rw));
    }

    function data_kk_rt($rt, $rw){
        return $this->db->get_where('tbl_t_keluarga', array('id_status_penduduk' => '1', 'kk_rt' => $rt, 'kk_rw' => $rw));
    }

    function data_kk(){
        return $this->db->get_where('tbl_t_keluarga', array('id_status_penduduk' => '1'));
    }

    function data_kk_rw($rw){
        return $this->db->get_where('tbl_t_keluarga', array('id_status_penduduk' => '1', 'kk_rw'=>$rw));
    }

    function cari_penduduk_rt($rt, $rw, $cari){
        $this->db->like('nama', $cari);
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'rt' => $rt, 'rw' => $rw));
    }

    function cari_penduduk($cari){
        $this->db->like('nama', $cari);
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1'));
    }

    function cari_rtrw($rt, $rw){
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'rt' => $rt, 'rw' => $rw));
    }

    function jumlah_kk_rt($rt, $rw){
        return $this->db->get_where('tbl_t_keluarga', array('kk_rt'=>$rt, 'kk_rw'=>$rw));
    }

    function jumlah_kk(){
        return $this->db->get('tbl_t_keluarga');
    }

    function jumlah_penduduk_rt($rt, $rw){
        $this->db->where('tempat_tinggal !=', 'KONTRAK');
        return $this->db->get_where('tbl_t_penduduk', array('rt'=>$rt, 'rw'=>$rw));
    }

    function penduduk_rw($rw){
        $this->db->where('tempat_tinggal !=', 'KONTRAK');
        return $this->db->get_where('tbl_t_penduduk', array('rw'=>$rw));
    }

    function penduduk_rw_sementara($rw){
        $this->db->where('tempat_tinggal', 'KONTRAK');
        return $this->db->get_where('tbl_t_penduduk', array('rw'=>$rw));
    }

    function jumlah_penduduk_rt_hari($rt, $rw){
        return $this->db->query("SELECT * FROM tbl_t_penduduk WHERE rt='$rt' AND rw='$rw' AND tanggal_input=CURDATE()");
    }

    function penduduk_rw_hari($rw){
        return $this->db->query("SELECT * FROM tbl_t_penduduk WHERE rw='$rw' AND tanggal_input=CURDATE()");
    }

    function jumlah_penduduk_hari(){
        return $this->db->query("SELECT * FROM tbl_t_penduduk WHERE tanggal_input=CURDATE()");
    }

    function jumlah_penduduk(){
        return $this->db->get('tbl_t_penduduk');
    }

    function jumlah_rt_hari(){
        return $this->db->query("SELECT * FROM tbl_m_user WHERE user_role='1' AND tanggal_input=CURDATE()");
    }

    function jumlah_lurah_hari(){
        return $this->db->query("SELECT * FROM tbl_m_user WHERE user_role='2' AND tanggal_input=CURDATE()");
    }

    function jumlah_rt(){
        return $this->db->get_where('tbl_m_user', array('user_role' => '1'));
    }

    function jumlah_lurah(){
        return $this->db->get_where('tbl_m_user', array('user_role' => '2'));
    }

    function status_keluarga(){
        $status_keluarga = $this->db->get("tbl_m_status_keluarga");
        return $status_keluarga->result();
    }

    function kontrasepsi(){
        $kontrasepsi = $this->db->get("tbl_m_kontrasepsi");
        return $kontrasepsi->result();
    }

    function imunisasi(){
        $imunisasi = $this->db->get("tbl_m_imunisasi");
        return $imunisasi->result();
    }

    function ambil_penduduk($id_kk){
        return $this->db->get_where('tbl_t_penduduk', array('id_kk' => $id_kk));
    }

    function ambil_keluarga_meninggal($id_kk){
        return $this->db->get_where('tbl_t_keluarga_meninggal', array('id_kk' => $id_kk));
    }

    function ambil_keluarga_status_kb($id_kk){
        return $this->db->get_where('tbl_t_keluarga_status_dan_kb', array('id_kk' => $id_kk));
    }

    function ambil_keluarga_sejahtera($id_kk){
        return $this->db->get_where('tbl_t_keluarga_sejahtera', array('id_kk' => $id_kk));
    }

    function ambil_keluarga_get_modal($id_kk){
        return $this->db->get_where('tbl_t_keluarga_get_modal', array('id_kk' => $id_kk));
    }

    function total_kawin($rt, $rw){
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'status_pernikahan' => 'K', 'rt' => $rt, 'rw' => $rw));
    }

    function total_belum_kawin($rt, $rw){
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'status_pernikahan' => 'BK', 'rt' => $rt, 'rw' => $rw));
    }

    function total_pria($rt, $rw){
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'jenis_kelamin' => 'LK', 'rt' => $rt, 'rw' => $rw));
    }

    function total_wanita($rt, $rw){
        return $this->db->get_where('tbl_t_penduduk', array('id_status_penduduk' => '1', 'jenis_kelamin' => 'PR', 'rt' => $rt, 'rw' => $rw));
    }
}
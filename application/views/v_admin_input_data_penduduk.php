<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_admin.php');?>

<div style="margin-top: 80px;">
        
        <!-- HOME -->
        <div class="col-md-12">
        <?php
        if($this->session->flashdata('pesan') != ''){
            echo '
                <div class="alert alert-dismissable alert-info">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  '.$this->session->flashdata('pesan').'
                </div>
            ';
        }
        ?>

        <button class="btn btn-info pull-right" onclick="window.location='<?php echo base_url();?>admin'">&larr; kembali ke halaman utama</button>

        <div style="clear:both"></div>
        <br/>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Input Data</h3>
              </div>
                  <div class="panel-body">
                    <h4>KEPALA KELUARGA</h4>
                    <form name="form" action="<?php echo base_url();?>admin/data_input" method="post">
                        <div class="row">
                            <div class="col-md-2">
                                <label>Nama </label>
                            </div>
                            
                            <div class="col-md-4">
                                <input name="kk_nama" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        
                            <div class="col-md-2">
                                <label>KKI </label>
                            </div>
                            
                            <div class="col-md-4">
                                <input name="kki" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label>Provinsi </label>
                            </div>
                            
                            <div class="col-md-4">
                                <input name="kk_provinsi" class="form-control input-sm" type="text" required />
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                       
                            <div class="col-md-2">
                                <label>Kota </label>
                            </div>
                            
                            <div class="col-md-4">
                                <input name="kk_kab" class="form-control input-sm" type="text" required></textarea>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label>Kecamatan </label>
                            </div>
                            
                            <div class="col-md-4">
                                <input name="kk_kec" class="form-control input-sm" type="text" required></textarea>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        
                            <div class="col-md-2">
                                <label>Kelurahan </label>
                            </div>
                            
                            <div class="col-md-4">
                                <input name="kk_kel" class="form-control input-sm" type="text" required></textarea>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label>RW </label>
                            </div>
                                
                            <div class="col-md-4">
                                <input name="kk_rw" class="form-control input-sm" type="text" maxlength="3" required>
                                <p class="text-muted"><em>Format: 00, Contoh: 05, 20</em></p>
                            </div>
                            
                            <div class="col-md-2">
                                <label>RT </label>
                            </div>
                                
                            <div class="col-md-4">
                                <input name="kk_rt" class="form-control input-sm" type="text" minlength="3" maxlength="3" required>
                                 <p class="text-muted"><em>Format: 00, Contoh: 05, 20</em></p>
                            </div>
                         </div>

                         <div class="row">
                            <div class="col-md-2">
                                <label>Jalan </label>
                            </div>
                            
                            <div class="col-md-4">
                                <input name="kk_jalan" class="form-control input-sm" type="text" required />
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                       
                            <div class="col-md-2">
                                <label>Komplek </label>
                            </div>
                            
                            <div class="col-md-4">
                                <input name="kk_komplek" class="form-control input-sm" type="text" required />
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>
<!-- 


                        <div class="row">
                            <div class="col-md-3">
                                <label>Nama <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="nama" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital, contoh: IQBAL WAHYUDI</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>No. Penduduk <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="no_penduduk" maxlength="16" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi dengan nomor KTP. Bila belum ada KTP, isi dengan nomor Akte Kelahiran</em></p>
                            </div>
                        </div>
                        
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Agama <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="agama" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($agama as $a){
                                        echo "<option value=".$a->nama_agama.">".$a->nama_agama."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Tempat Lahir <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="tmpt_lahir" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Tanggal Lahir <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="tgl_lahir" class="form-control input-sm" type="text" required>
                                 <p class="text-muted"><em>Format: yyyy-mm-dd, Contoh: 1993-12-30</em></p>
                            </div>
                         </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Alamat <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <textarea name="alamat" class="form-control input-sm" required></textarea>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>RT <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="rt" class="form-control input-sm" type="text" maxlength="3" value="<?php echo $rt;?>" readonly>
                                <p class="text-muted"><em>Format: 000, Contoh: 005, 020</em></p>
                            </div>
                            
                            <div class="col-md-3">
                                <label>RW <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="rw" class="form-control input-sm" type="text" minlength="3" maxlength="3" value="<?php echo $rw;?>" readonly>
                                 <p class="text-muted"><em>Format: 000, Contoh: 005, 020</em></p>
                            </div>
                         </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Kelurahan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kel" class="form-control input-sm" type="text" required></textarea>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Kecamatan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kec" class="form-control input-sm" type="text" required></textarea>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Kota <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kota" class="form-control input-sm" type="text" required></textarea>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Provinsi <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="provinsi" class="form-control input-sm" type="text" required/>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Kode Pos <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kode_pos" class="form-control input-sm" type="text" required></textarea>
                                <p class="text-muted"><em>Isi kode pos</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Warga Negara <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="warga_negara" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($warga_negara as $wn){
                                        echo "<option value=".$wn->warga_negara.">".$wn->warga_negara."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jenis Kelamin <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="jenis_kelamin" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($jenis_kelamin as $jk){
                                        echo "<option value=".$jk->jenis_kelamin.">".$jk->jenis_kelamin."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Golongan Darah <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="gol_darah" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($gol_darah as $gd){
                                        echo "<option value=".$gd->jenis_gol_darah.">".$gd->jenis_gol_darah."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Pendidikan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="pendidikan" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($pendidikan as $p){
                                        echo "<option value=".$p->jenis_pendidikan.">".$p->jenis_pendidikan."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Isi huruf depan dengan huruf kapital</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Status Pernikahan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="status_pernikahan" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($status_pernikahan as $sp){
                                        echo "<option value=".$sp->status_pernikahan.">".$sp->status_pernikahan."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Status Sosial <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="status_sosial" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($status_sosial as $ss){
                                        echo "<option value=".$ss->status_sosial.">".$ss->status_sosial."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Pekerjaan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="pekerjaan" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Nama Ayah <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="nama_ayah" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Nama Ibu <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="nama_ibu" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Status Dalam Keluarga <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="status_keluarga" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($status_keluarga as $sk){
                                        echo "<option value=".$sk->nama_status.">".$sk->nama_status."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Status Imunisasi <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="status_imunisasi" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($imunisasi as $imun){
                                        echo "<option value=".$imun->nm_imunisasi.">".$imun->nm_imunisasi."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Status Kontrasepsi <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="status_kontrasepsi" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($kontrasepsi as $kon){
                                        echo "<option value=".$kon->nm_kontrasepsi.">".$kon->nm_kontrasepsi."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>
                      
                        <div class="row">
                            <div class="col-md-3">
                                &nbsp;
                            </div>
                            
                            <div class="col-md-9">
                                <p><span class='asterisk'>*</span> <em>tidak boleh kosong</em></p>
                            </div>
                        </div>
-->                     
                        <hr/>
                        <h4>IDENTITAS KELUARGA</h4>
                        <table>
                            <tbody>
                                <td>&nbsp;</td>
                                <td style="text-align:center">
                                    <label>No. Induk Kepend. (NIK)</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Nama Lengkap</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Hub. dengan KK</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Jenis Kelamin</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Tempat Lahir</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Tanggal Lahir </label>
                                </td>
                                <td style="text-align:center">
                                    <label>Agama </label>
                                </td>
                                <td style="text-align:center">
                                    <label>Memiliki Akte Kelahiran</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Status Pendidikan</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Jenis Pekerjaan</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Status Kawin</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Usia Kawin Pertama</label>
                                </td>
                                <td style="text-align:center">
                                    <label>Tempat Tinggal</label>
                                </td>
                            </tbody>
                        </table>

                        <table id="dataTable">
                        <tbody>
                        <tr>
                          <p>
                            <td><input type="checkbox" required="required" name="chk[]" checked="checked" /></td>
                            <td>
                                &nbsp;
                            </td>
                            <td style="text-align:center">
                                <input type="text" required="required" class="form-control input-sm small"  name="no_penduduk[]" placeholder="NIK">
                            </td>
                            <td style="text-align:center">
                                <input type="text" required="required" class="form-control input-sm small"  name="nama[]" placeholder="nama lengkap">
                            </td>
                            <td style="text-align:center">
                                <select name="status_keluarga[]" class="form-control input-sm" required>
                                        <option value="">- Pilih -</option>
                                        <?php
                                        foreach($status_keluarga as $sk){
                                            echo "<option value=".$sk->nama_status.">".$sk->nama_status."</option>";
                                        }
                                        ?>
                                </select>
                            </td>
                            <td style="text-align:center">
                                <select name="jenis_kelamin[]" class="form-control input-sm" required>
                                    <option value="-">- Pilih -</option>
                                    <option value="LK">LK</option>
                                    <option value="PR">PR</option>
                                </select>
                            </td>
                            <td style="text-align:center">
                                <input name="tmpt_lahir[]" class="form-control input-sm" placeholder="tempat lahir" type="text" required>
                            </td>
                            <td style="text-align:center">
                                <input name="tgl_lahir[]" class="form-control input-sm" placeholder="tttt-bb-hh" type="text" required>
                            </td>
                            <td style="text-align:center">
                                <select name="agama[]" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($agama as $a){
                                        echo "<option value=".$a->nama_agama.">".$a->nama_agama."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align:center">
                                <select name="akte[]" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                            </td>
                            <td style="text-align:center">
                                <input type="text" required="required" placeholder="status pendidikan" class="form-control input-sm small"  name="status_pendidikan[]">
                            </td>
                            <td style="text-align:center">
                                <input type="text" required="required" placeholder="jenis pekerjaan" class="form-control input-sm small"  name="pekerjaan[]">
                            </td>
                            <td style="text-align:center">
                                <select name="status_pernikahan[]" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($status_pernikahan as $sp){
                                        echo "<option value=".$sp->status_pernikahan.">".$sp->status_pernikahan."</option>";
                                    }
                                    ?>
                                </select>
                            </td>
                            <td style="text-align:center">
                                <input type="text" placeholder="usia kawin pertama" class="form-control input-sm small"  name="usia_kawin_pertama[]">
                            </td>
                            <td style="text-align:center">
                                <select name="tempat_tinggal[]" class="form-control input-sm" required>
                                    <option value="-">- Pilih -</option>
                                    <option value="KONTRAK">KONTRAK</option>
                                </select>
                            </td>
                            <td>
                                <input type="hidden" value="1" name="id_status[]">
                                <input type="hidden" value="<?php echo date('Y'.'-'.'m'.'-'.'d');?>" name="tanggal_input_ik[]" >
                                <input type="hidden" name="rt[]">
                                <input type="hidden" name="rw[]">
                            </td>
                            </p>
                        </tr>
                        </tbody>
                        </table>
                        <br/>
                        <input type="button" value="Tambah Anggota" onClick="addRow('dataTable')" /> 
                        <input type="button" value="Hapus Anggota" onClick="deleteRow('dataTable')"  />

                        <hr/>
                        <h4>ANGGOTA KELUARGA ADA YANG MENINGGAL</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <label>Dalam setahun terakhir ada anggota keluarga yang meninggal dunia </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="ada_meninggal" class="form-control input-sm">
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-2">
                                <label>Umur Saat Meninggal </label>
                            </div>

                            <div class="col-md-4">
                                <input type="text" name="umur_saat_meninggal" class="form-control input-sm" >
                                <p class="text-muted"><em>Diisi jika YA, contoh: 12 tahun 3 bulan</em></p>
                            </div>

                            <div class="col-md-2">
                                <label>Jenis Kelamin </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="jenis_kelamin_km" class="form-control input-sm" >
                                    <option value="-">- Pilih -</option>
                                    <option value="LK">LK</option>
                                    <option value="PR">PR</option>
                                </select>
                                <p class="text-muted"><em>Jika YA, pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Apakah ada Ibu meninggal karena melahirkan selama 1 tahun terakhir</label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="ibu_meninggal" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <hr/>
                        <h4>STATUS KELUARGA DAN KESERTAAN KB</h4>
                        <div class="row">
                            <div class="col-md-8">
                                <label>Peserta Jaminan Kesehatan Nasional </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="jamkesnas" class="form-control input-sm">
                                    <option value="">- Pilih -</option>
                                    <option value="PBI">PBI</option>
                                    <option value="NON PBI">NON PBI</option>
                                    <option value="NON JKN">NON JKN</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Pakai KB dengan metode yang digunakan</label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="metode_kb" class="form-control input-sm">
                                    <option value="">- Pilih -</option>
                                    <?php
                                    foreach($kontrasepsi as $kon){
                                        echo "<option value=".$kon->nm_kontrasepsi.">".$kon->nm_kontrasepsi."</option>";
                                    }
                                    ?>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Tidak pakai KB sebab </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="sebab_non_kb" class="form-control input-sm">
                                    <option value="-">- Pilih -</option>
                                    <option value="HAMIL">HAMIL</option>
                                    <option value="IAS">IAS</option>
                                    <option value="IAT">IAT</option>
                                    <option value="TIAL">TIAL</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Kapan menjadi peserta KB (metode kontrasepsi yang terakhir dipakai)</label>
                            </div>

                            <div class="col-md-3">
                                <input type="text" name="kapan_kb" class="form-control input-sm" >
                                <p class="text-muted"><em>Isi dengan format tahun-bln-tgl, contoh: 2015-12-30</em></p>
                            </div>
                            
                            <div class="col-md-2">
                                <label>Tempat pelayanan KB </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="tempat_kb" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="PEMERINTAH">PEMERINTAH</option>
                                    <option value="SWASTA">SWASTA</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Ikut Posyandu </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="ikut_posyandu" class="form-control input-sm" >
                                    <option value="-">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Ikut BKB </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="ikut_bkb" class="form-control input-sm" >
                                    <option value="-">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Keluarga punya REMAJA IKUT BKR </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="remaja_bkr" class="form-control input-sm">
                                    <option value="-">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Ada remaja (usia 10-24 tahun ikut PIK-REMAJA) </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="remaja_pik" class="form-control input-sm" >
                                    <option value="-">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <label>Keluarga ada lansia (usia 60 tahun ke atas ikut BKL) </label>
                            </div>
                            
                            <div class="col-md-4">
                                <select name="lansia_bkl" class="form-control input-sm" >
                                    <option value="-">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <hr/>
                        <h4>STATUS TAHAPAN KELUARGA SEJAHTERA</h4>
                        <div class="row">
                            <div class="col-md-9">
                                <label>Status tahapan keluarga sejahtera</label>
                            </div>
                            
                            <div class="col-md-3">
                                <select name="status_tahapan" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="KPS">KPS</option>
                                    <option value="KS I">KS I</option>
                                    <option value="KS II">KS II</option>
                                    <option value="KS III">KS III</option>
                                    <option value="KS III+">KS III+</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>

                            <div class="col-md-9">
                                <label>Alasan </label>
                            </div>

                            <div class="col-md-3">
                                <select name="alasan" class="form-control input-sm" >
                                    <option value="-">- Pilih -</option>
                                    <option value="ALASAN EKONOMI">ALASAN EKONOMI</option>
                                    <option value="ALASAN BUKAN EKONOMI">ALASAN BUKAN EKONOMI</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Diisi jika KPS atau KS 1</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Keluarga memiliki fasilitas buang air besar (jamban/kakus sendiri) </label>
                            </div>
                            
                            <div class="col-md-3">
                                <select name="fasilitas_kakus" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Keluarga menggunakan sumber penerangan listrik </label>
                            </div>
                            
                            <div class="col-md-3">
                                <select name="fasilitas_listrik" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Keluarga memiliki sumber air minum bersih (air kemasan, ledeng/pompa/sumur/mata air terlindung) </label>
                            </div>
                            
                            <div class="col-md-3">
                                <select name="fasilitas_airminum" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Keluarga menggunakan bahan bakar gas/listrik untuk memasak sehari-hari </label>
                            </div>
                            
                            <div class="col-md-3">
                                <select name="fasilitas_memasak" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <hr/>
                        <h4>KELUARGA MENDAPATKAN MODAL TAHUN INI DAN KELUARGA IKUT UPPKS</h4>
                        <div class="row">
                            <div class="col-md-7">
                                <label>Keluarga mendapat bantuan modal dalam 1 tahun terakhir </label>
                            </div>
                            
                            <div class="col-md-5">
                                <select name="dapat_modal" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-7">
                                <label>Keluarga ikut UPPKS </label>
                            </div>
                            
                            <div class="col-md-5">
                                <select name="ikut_uppks" class="form-control input-sm" >
                                    <option value="">- Pilih -</option>
                                    <option value="YA">YA</option>
                                    <option value="TIDAK">TIDAK</option>
                                    <option value="-">-</option>
                                </select>
                                <p class="text-muted"><em>Pilih salah satu</em></p>
                            </div>
                        </div>
                      
                        <!-- INPUT DATE -->
                        <input type="hidden" name="tanggal_input" value="<?php echo date('Y'.'-'.'m'.'-'.'d');?>">
                        <!-- END INPUT DATE -->
                      
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;&nbsp;Simpan</button>
                    </div>
                    </form>
                  </div>
            </div>
        <!-- END HOME -->
</div>
</body>
<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar.php');?>

<div style="margin-top: 80px;">
    <div class="container">
        
        <!-- MENU -->
        <?php include('menu.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
            <div class="panel panel-success">
              <div class="panel-heading">Buat Surat Kematian</div>
                  <div class="panel-body">
                    <form name="form" action="<?php echo site_url();?>/home/cetak_surat_kematian" method="post" target="_blank">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Nama Ketua RT <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="nama_rt" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi huruf depan dengan huruf kapital, contoh: Nama Lengkap</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>RT <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="rt" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Format: xx, Contoh: 05, 20</em></p>
                            </div>
                            
                            <div class="col-md-3">
                                <label>RW <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="rw" class="form-control input-sm" type="text" required>
                                 <p class="text-muted"><em>Format: xx, Contoh: 05, 20</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Kampung <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kampung" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi nama kampung/desa/daerah dengan huruf kapital</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Kelurahan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kelurahan" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi kelurahan dengan huruf kapital</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Kecamatan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kecamatan" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi kecamatan dengan huruf kapital</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Kota <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kota" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi kota dengan huruf kapital</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Provinsi <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="provinsi" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi provinsi dengan huruf kapital</em></p>
                            </div>

                            <div class="col-md-12">
                            <h3 style="text-align:center">Data Almarhum/Almarhumah</h3>
                            </div>

                            <div class="col-md-3">
                                <label>Nama <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="nama" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi huruf depan dengan huruf kapital, contoh: Nama Lengkap</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Tempat Lahir <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="tmpt_lahir" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi huruf depan dengan huruf kapital, contoh: Jakarta</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Tanggal Lahir <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="tgl_lahir" id="tanggal" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Format: hh/bb/tttt</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Usia <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="usia" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi usia</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Pekerjaan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="pekerjaan" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi pekerjaan</em></p>
                            </div>

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

                             <div class="col-md-3">
                                <label>Alamat <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <textarea name="alamat" class="form-control input-sm" required></textarea>
                                <p class="text-muted"><em>Contoh: Jalan Semangat Terus, No. xxx, Nama Daerah/Kampung</em></p>
                            </div>

                            <div class="col-md-12">
                            <h3 style="text-align:center">Meninggal Pada</h3>
                            </div>

                            <div class="col-md-3">
                                <label>Hari <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="hari" class="form-control input-sm" type="text" required>
                                <p class="text-muted"><em>Isi huruf depan dengan huruf kapital, contoh: Rabu</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Tanggal <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-9">
                                <input name="tanggal" id="tanggal2" class="form-control input-sm" type="text" required>
                                 <p class="text-muted"><em>Format: hh/bb/tttt</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Pukul <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-9">
                                <input name="pukul" id="tanggal" class="form-control input-sm" type="text" required>
                                 <p class="text-muted"><em>Format: 00:00, Contoh: 18.00</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Tempat <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-9">
                                <input name="tempat" id="tanggal" class="form-control input-sm" type="text" required>
                                 <p class="text-muted"><em>Isi huruf depan dengan huruf kapital, contoh: Rumah Sakit ...</em></p>
                            </div>

                            <div class="col-md-3">
                                <label>Dimakamkan di: <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-9">
                                <input name="makam" id="tanggal" class="form-control input-sm" type="text" required>
                                 <p class="text-muted"><em>Isi huruf depan dengan huruf kapital, contoh: Taman Makam Pahlawan Kalibata</em></p>
                            </div>

                              <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">Cetak</button>
                              </div>
                        </div>
                    </form>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
    </div>
</div>
</body>
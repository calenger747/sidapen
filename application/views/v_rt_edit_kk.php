<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rt.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->
        <?php include('menu_rt.php') ;?>
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
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
        
        <?php
        foreach($edit as $ed){
            $id_kk = $ed->id_kk;
            $nama = $ed->kk_nama;
            $kki = $ed->kki;
            $prov = $ed->kk_provinsi;
            $kab = $ed->kk_kab;
            $kec = $ed->kk_kec;
            $kel = $ed->kk_kel;
            $rt = $ed->kk_rt;
            $rw = $ed->kk_rw;
            $jalan = $ed->kk_jalan;
            $komplek = $ed->kk_komplek;
        }
        ?>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class='glyphicon glyphicon-edit'></span>&nbsp;&nbsp;Edit Data</h3>
              </div>
                  <div class="panel-body">
                    <form name="form" action="<?php echo base_url();?>home_rt/update_kk" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Nama <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="nama" class="form-control input-sm" type="text" value="<?php echo $nama;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>KKI <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kki" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $kki;?>" required>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Provinsi <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="provinsi" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $prov;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Kabupaten/Kota <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kab" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $kab;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Kecamatan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kec" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $kec;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Kelurahan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kel" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $kel;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>RW <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="rw" class="form-control input-sm" type="text" maxlength="3" value="<?php echo $rw;?>" readonly>
                                <p class="text-muted"><em>Format: 000, Contoh: 005, 020</em></p>
                            </div>
                            
                            <div class="col-md-3">
                                <label>RT <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="rt" class="form-control input-sm" type="text" minlength="3" maxlength="3" value="<?php echo $rt;?>" readonly>
                                 <p class="text-muted"><em>Format: 000, Contoh: 005, 020</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Jalan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="jalan" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $jalan;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Komplek <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="komplek" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $komplek;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Status Penduduk <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="id_status_penduduk" class="form-control input-sm" required>
                                    <option value="">- Pilih -</option>
                                    <option value="1">Masih Hidup</option>
                                    <option value="2">Almarhum/Almarhumah</option>
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
                        <input type="hidden" name="id_kk" value="<?php echo $id_kk;?>">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-repeat"></span>&nbsp;&nbsp;Update</button>
                        <button type="button" class="btn btn-warning" onclick="location.replace(document.referrer)"><span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;Batal</button>
                    </div>
                    </form>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>
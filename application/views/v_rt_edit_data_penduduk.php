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
            $id_penduduk = $ed->id_penduduk;
            $nama = $ed->nama;
            $nopen = $ed->no_penduduk;
            $usia = $ed->usia;
            $tmpt_lahir = $ed->tmpt_lahir;
            $tgl_lahir = $ed->tgl_lahir;
            $kelamin = $ed->jenis_kelamin;
            $status_nikah = $ed->status_pernikahan;
            $s_k = $ed->status_dalam_keluarga;
            $pendidikan = $ed->pendidikan;
            $pekerjaan = $ed->pekerjaan;
            $tempat_tinggal = $ed->tempat_tinggal;
            $ag = $ed->agama;
        }
        ?>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class='glyphicon glyphicon-edit'></span>&nbsp;&nbsp;Edit Data</h3>
              </div>
                  <div class="panel-body">
                    <form name="form" action="<?php echo base_url();?>home_rt/update_penduduk" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Nama <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="nama" class="form-control input-sm" type="text" value="<?php echo $nama;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital, contoh: IQBAL WAHYUDI</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>NIK <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="no_penduduk" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $nopen;?>" required>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Tempat Lahir <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="tmpt_lahir" class="form-control input-sm" type="text" value="<?php echo $tmpt_lahir;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Tanggal Lahir <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="tgl_lahir" class="form-control input-sm" type="text" value="<?php echo $tgl_lahir;?>" required>
                                 <p class="text-muted"><em>Format: tttt-bb-hh, Contoh: 1993-12-20</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Agama <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-9">
                                <select name="agama" class="form-control input-sm" required>
                                    <option value="<?php echo $ag;?>"><?php echo $ag;?></option>
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
                                <label>RT <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="rt" class="form-control input-sm" type="text" maxlength="2" value="<?php echo $rt;?>" readonly>
                                <p class="text-muted"><em>Format: 00, Contoh: 05, 20</em></p>
                            </div>
                            
                            <div class="col-md-3">
                                <label>RW <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <select name="rw" class="form-control input-sm" disabled>
                                    <option value="<?php echo $rw;?>"><?php echo $rw;?></option>
                                    <option value="">- Pilih -</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
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
                                    <option value="<?php echo $kelamin ;?>"><?php echo $kelamin ;?></option>
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
                                <label>Pendidikan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="pendidikan" class="form-control input-sm" type="text" value="<?php echo $pendidikan;?>" required/>
                                <p class="text-muted"><em>Isi pendidikan</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Status Pernikahan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="status_pernikahan" class="form-control input-sm" required>
                                    <option value="<?php echo $status_nikah ;?>"><?php echo $status_nikah ;?></option>
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
                                <label>Pekerjaan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="pekerjaan" class="form-control input-sm" type="text" value="<?php echo $pekerjaan;?>" required/>
                                <p class="text-muted"><em>Isi dengan huruf kapital</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Status Dalam Keluarga <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <select name="status_keluarga" class="form-control input-sm" required>
                                    <option value="<?php echo $s_k ;?>"><?php echo $s_k ;?></option>
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
                                <label>Tempat Tinggal <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="tempat_tinggal" class="form-control input-sm" type="text" value="<?php echo $tempat_tinggal;?>" required/>
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
                        <input type="hidden" name="id_penduduk" value="<?php echo $id_penduduk;?>">
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
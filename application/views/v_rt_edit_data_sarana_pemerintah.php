<?php include('head.php');?>
 <?php $id_pemerintah = $this->uri->segment(3); ?>
<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rt.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->
        <?php include('menu_rt2.php') ;?>
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
            $id_pemerintah = $ed->id_pemerintah;
            $kantor_lurah = $ed->kantor_lurah;
            $balai_pertemuan = $ed->balai_pertemuan;
            $pos_rw = $ed->pos_rw;
        }
        ?>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class='glyphicon glyphicon-edit'></span>&nbsp;&nbsp;Edit Data</h3>
              </div>
                  <div class="panel-body">
                    <form name="form" action="<?php echo base_url();?>home_rt/update_sarana_pemkel" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Kelurahan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="kantor_lurah" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $kantor_lurah;?>" required>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Balai Pertemuan <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="balai_pertemuan" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $balai_pertemuan;?>" required>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>
                        
                         <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Pos RW <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="pos_rw" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $pos_rw;?>" required/>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
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
                                &nbsp;
                            </div>
                            
                            <div class="col-md-9">
                                <p><span class='asterisk'>*</span> <em>tidak boleh kosong</em></p>
                            </div>
                        </div>
                        <input type="hidden" name="id_pemerintah" value="<?php echo $id_pemerintah;?>">
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
<?php include('head.php');?>
 <?php $id_peribadatan = $this->uri->segment(3); ?>
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
            $id_peribadatan = $ed->id_peribadatan;
            $masjid = $ed->masjid;
            $mushollah = $ed->mushollah;
            $gereja = $ed->gereja;
			$vihara = $ed->vihara;
		    $pure = $ed->pure;
        }
        ?>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class='glyphicon glyphicon-edit'></span>&nbsp;&nbsp;Edit Data</h3>
              </div>
                  <div class="panel-body">
                    <form name="form" action="<?php echo base_url();?>home_rt/update_sarana_peribadatan" method="post">
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Masjid <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="masjid" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $masjid;?>" required>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Mushollah <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="mushollah" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $mushollah;?>" required>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>
                        
                         <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Gereja <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="gereja" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $gereja;?>" required/>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>      

						<div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Vihara <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="vihara" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $vihara;?>" required/>
                                <p class="text-muted"><em>Isi dengan angka</em></p>
                            </div>
                        </div>  

                        <div class="row">
                            <div class="col-md-3">
                                <label>Jumlah Pure <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="pure" maxlength="16" class="form-control input-sm" type="text" value="<?php echo $pure;?>" required/>
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
                        <input type="hidden" name="id_peribadatan" value="<?php echo $id_peribadatan;?>">
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
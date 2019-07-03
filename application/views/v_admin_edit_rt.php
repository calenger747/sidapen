<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_admin.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_admin.php') ;?>
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

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Edit User &raquo; RT</h3>
              </div>
                  <div class="panel-body">
                    <form action="<?php echo base_url();?>admin/update_rt" method="post">
                      <div class="row">
                            <div class="col-md-3">
                                <label>Nama <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="user_nama" class="form-control input-sm" type="text" minlength="5" value="<?php echo $edit_rt->user_nama;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital, contoh: PAK RT</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>RT <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                <input name="rt" class="form-control input-sm" type="text" minlength="2" maxlength="2" value="<?php echo $edit_rt->rt;?>">
                                <p class="text-muted"><em>Format: 000, Contoh: 005, 020</em></p>
                            </div>
                            
                            <div class="col-md-3">
                                <label>RW <span class='asterisk'>*</span></label>
                            </div>
                                
                            <div class="col-md-3">
                                 <select name="rw" class="form-control input-sm" required>
                                    <option value="<?php echo $edit_rt->rw;?>"><?php echo $edit_rt->rw;?></option>
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
                                <label>Username <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="user_name" class="form-control input-sm" type="text" minlength="5" value="<?php echo $edit_rt->user_name;?>" required>
                                <p class="text-muted"><em>Isi username, digunakan untuk login</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Password <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="user_password" class="form-control input-sm" type="password" minlength="7" value="<?php echo $edit_rt->user_password;?>" required>
                                <p class="text-muted"><em>Isi password, minimal 7 karakter</em></p>
                            </div>
                        </div>
                        <input type="hidden" name="user_id" value="<?php echo $edit_rt->user_id;?>"/>
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-repeat"></span>&nbsp;&nbsp;Update</button>
                        <button type="button" class="btn btn-warning" onclick="location.replace(document.referrer)"><span class="glyphicon glyphicon-record"></span>&nbsp;&nbsp;Batal</button>
                    </form>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>
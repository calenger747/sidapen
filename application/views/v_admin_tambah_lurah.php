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
                <h3 class="panel-title"><span class="glyphicon glyphicon-plus"></span>&nbsp;&nbsp;Tambah User &raquo; Lurah</h3>
              </div>
                  <div class="panel-body">
                    <form action="<?php echo base_url();?>admin/add_lurah" method="post">
                      <div class="row">
                            <div class="col-md-3">
                                <label>Nama Kelurahan<span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="user_nama" class="form-control input-sm" type="text" minlength="5" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital, contoh: PAK LURAH</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Username <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="user_name" class="form-control input-sm" type="text" minlength="5" required>
                                <p class="text-muted"><em>Isi username, digunakan untuk login</em></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <label>Password <span class='asterisk'>*</span></label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="user_password" class="form-control input-sm" type="password" minlength="7" required>
                                <p class="text-muted"><em>Isi password, minimal 7 karakter</em></p>
                            </div>
                        </div>

                        <input type="hidden" name="user_role" value="2" />
                        <input type="hidden" name="tanggal_input" value="<?php echo date('Y'.'-'.'m'.'-'.'d');?>">
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span>&nbsp;&nbsp;Simpan</button>
                    </form>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>
</body>
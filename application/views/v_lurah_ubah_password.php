<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_lurah.php');?>

<div style="margin: 80px auto 0;">
    <div class="container">
        <!-- HOME -->
        
        <div class="col-md-8 col-md-offset-2">
        
        <?php
        foreach($profil as $p){
          $nama = $p->user_nama;
          $pass = $p->user_password;
          $pid = $p->user_id;
        }

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
                <h3 class="panel-title"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Ubah Password</h3>
              </div>
                  <div class="panel-body">
                  <form action="<?php echo base_url();?>home_lurah/update_password" method="post">
                    <div class="row">
                            <div class="col-md-3">
                                <label>Nama</label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="user_nama" class="form-control input-sm" type="password" minlength="7" value="<?php echo $nama;?>" required>
                                <p class="text-muted"><em>Isi dengan huruf kapital, contoh: IQBAL WAHYUDI</em></p>
                            </div>
                            
                            <div class="col-md-3">
                                <label>Password</label>
                            </div>
                            
                            <div class="col-md-9">
                                <input name="user_password" class="form-control input-sm" type="password" minlength="7" value="<?php echo $pass;?>" required>
                                <p class="text-muted"><em>Password minimal 7 karakter</em></p>
                            </div>
                    </div>
                    <input type="hidden" name="user_id" value="<?php echo $pid;?>">
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-repeat"></span>&nbsp;&nbsp;Update</button>
                  </form>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
    </div>
</div>

<a onclick="window.location='<?php echo base_url();?>home_lurah'" class="btn btn-primary navbar-fixed-bottom"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;kembali ke halaman sebelumnya</a>
</body>
<?php include('head.php') ;?>


<body style="background: url(<?php echo base_url();?>berkas/img/bg.jpg) no-repeat fixed center; background-size: 100% 100%">
<div class="container" style="margin-top: 2%">
    <div class="container">
        <img src="<?php echo base_url();?>berkas/img/lrlogo.png" width="300px" class="pull-right">
    </div>
    
    <div class="col-md-6" style="background:rgba(0,0,0,.8);border-radius:5px">
        <h1 class="text-success">SIDAPEN</h1>
        <h2 class="text-success">PASIR GUNUNG SELATAN</h2>
        <blockquote>
        <p class="text-success"><em>Sistem Data Penduduk</em>, sistem yang berguna untuk mencatat data penduduk ke dalam database.</p>
        </blockquote>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="col-md-3">
        <h3 style="color:#fff">LOGIN</h3>
        <form class="form-horizontal" action="<?php echo base_url();?>login/masuk" method="post">
                <input name="user_name" class="form-control" id="inputEmail" placeholder="Username" type="text" required>
            <br />
                <input name="user_password" class="form-control" id="inputPassword" placeholder="Password" type="password" required>
            
            <br />
            <input name="id_role" type="hidden" value="1" />
            
                <button type="submit" class="btn btn-info">Login</button>
          </fieldset>
        </form>
    </div>
	<div >
	<a href="#"><img src="<?php echo base_url();?>berkas/img/pelayanan.png" width="200px" class="pull-right"></a><p>
	<a href="#"><img src="<?php echo base_url();?>berkas/img/sarana.png" width="200px" class="pull-right"></a>
	</div>
    <div class="clearfix"></div>
    <br />
    <div class="col-md-6">
        <?php
        if($this->session->flashdata('pesan') != ''){
            echo '
                <div class="alert alert-dismissable alert-danger">
                  <button type="button" class="close" data-dismiss="alert">x</button>
                  '.$this->session->flashdata('pesan').'
                </div>
            ';
        }
        ?>
    </div>
    
    <div class="col-md-12">
        <p class="pull-right" style="color:white;font-weight:bold">&copy; Hak Cipta 2015 &minus; LRCOM</p>
    </div>
</div>
</body>
</html>
        
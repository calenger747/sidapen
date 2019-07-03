<div class="navbar navbar-inverse navbar-fixed-top">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <!--<a class="navbar-brand" href="<?php echo site_url();?>/home_lurah"><img src="<?php echo base_url();?>berkas/img/logo.png" style="margin-top: -13px"></a>-->
  </div>
  <div class="navbar-collapse collapse navbar-responsive-collapse">
    <ul class="nav navbar-nav">
      <li><a href="<?php echo base_url();?>home_lurah">SIDAPEN &minus; Sistem Data Penduduk</a></li>
      <li><a><span class="glyphicon glyphicon-bookmark"></span>&nbsp;&nbsp;Hello, <strong><?php echo $nama ;?></strong></a></li>
        <!--
        <li><a href="#">Link</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="#">Action</a></li>
          <li><a href="#">Another action</a></li>
          <li><a href="#">Something else here</a></li>
          <li class="divider"></li>
          <li class="dropdown-header">Dropdown header</li>
          <li><a href="#">Separated link</a></li>
          <li><a href="#">One more separated link</a></li>
        </ul>
      </li>
        -->
        
    </ul>
      <!--
    <form class="navbar-form navbar-right" style="margin-right:5px">
      <input class="form-control col-lg-8" placeholder="Cari" type="text">
    </form>
    -->
    <?php
    $array_hari = array(1=>'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu');
    $array_bulan = array(1=>'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
    $hari = $array_hari[date('N')];
    $bulan = $array_bulan[date('n')];
    $tanggal = date('j');
    $tahun = date('Y');
    ?>
      
    <ul class="nav navbar-nav navbar-right" style="margin-right: 0px;">
      <li><a href="<?php echo base_url();?>home_lurah"><span class="glyphicon glyphicon-calendar"></span>&nbsp;&nbsp;<?php echo $hari.', '.$tanggal.' '.$bulan.' '.$tahun ;?></a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Pengaturan&nbsp;&nbsp;<b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="<?php echo base_url();?>home_lurah/profil"><span class="glyphicon glyphicon-info-sign"></span>&nbsp;&nbsp;Profil</a></li>
          <li><a href="<?php echo base_url();?>home_lurah/ubah_password"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Ubah Profil</a></li>
          <li><a href="<?php echo base_url();?>home_lurah/logout" onclick="return confirm('Anda ingin keluar?');"><span class="glyphicon glyphicon-log-out"></span>&nbsp;&nbsp;Keluar</a></li>
        </ul>
      </li>
    </ul>
        
  </div>
</div>
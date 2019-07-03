<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_admin.php');?>

<div style="margin: 80px auto 0;">
        <!-- HOME -->
       
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;Detail Kepala Keluarga</h3>
              </div>
                  <div class="panel-body">
                    <table class="table table-striped table-hover ">
                      <tbody>
                      <?php 
                      foreach($detail as $d){
                        echo 
                        "<tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td>".$d->kk_nama."</td>
                        </tr>
                        <tr>
                          <td>KKI</td>
                          <td>:</td>
                          <td>".$d->kki."</td>
                        <tr>
                        <tr>
                          <td>Provinsi</td>
                          <td>:</td>
                          <td>".$d->kk_provinsi."</td>
                        <tr>
                        <tr>
                          <td>Kabupaten/Kota</td>
                          <td>:</td>
                          <td>".$d->kk_kab."</td>
                        <tr>
                        <tr>
                          <td>Kecamatan</td>
                          <td>:</td>
                          <td>".$d->kk_kec."</td>
                        <tr>
                        <tr>
                          <td>Kelurahan</td>
                          <td>:</td>
                          <td>".$d->kk_kel."</td>
                        <tr>
                        <tr>
                          <td>RT/RW</td>
                          <td>:</td>
                          <td>".$d->kk_rt."/".$d->kk_rw."</td>
                        </tr>
                        <tr>
                          <td>Jalan</td>
                          <td>:</td>
                          <td>".$d->kk_jalan."</td>
                        <tr>
                        <tr>
                          <td>Komplek</td>
                          <td>:</td>
                          <td>".$d->kk_komplek."</td>
                        <tr>
                        ";
                      }
                      ?>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
        
</div>

<a onclick="window.history.back()" class="btn btn-primary navbar-fixed-bottom"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;kembali ke halaman sebelumnya</a>
</body>
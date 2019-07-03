<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_lurah.php');?>

<div style="margin: 80px auto 0;">
        <!-- HOME -->
       
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;Detail Penduduk</h3>
              </div>
                  <div class="panel-body">
                    <table class="table table-striped table-hover ">
                      <tbody>
                      <?php 
                      foreach($detail as $d){
                        $usia = date_diff(date_create(), date_create($d->tgl_lahir));
                        echo 
                        "<tr>
                          <td>Nama</td>
                          <td>:</td>
                          <td>".$d->nama."</td>
                        </tr>
                        <tr>
                          <td>No. Penduduk</td>
                          <td>:</td>
                          <td>".$d->no_penduduk."</td>
                        </tr>
                          <td>Tempat, Tanggal Lahir</td>
                          <td>:</td>
                          <td>".$d->tmpt_lahir.", ".$d->tgl_lahir."</td>
                        </tr>
                        <tr>
                          <td>RT/RW</td>
                          <td>:</td>
                          <td>".$d->rt."/".$d->rw."</td>
                        </tr>
                        <tr>
                          <td>Jenis Kelamin</td>
                          <td>:</td>
                          <td>".$d->jenis_kelamin."</td>
                        </tr>
                        <tr>
                          <td>Usia</td>
                          <td>:</td>
                          <td>".$usia->format('%y tahun')."</td>
                        </tr>
                        <tr>
                          <td>Pendidikan</td>
                          <td>:</td>
                          <td>".$d->pendidikan."</td>
                        </tr>
                        <tr>
                          <td>Status Pernikahan</td>
                          <td>:</td>
                          <td>".$d->status_pernikahan."</td>
                        </tr>
                        <tr>
                          <td>Pekerjaan</td>
                          <td>:</td>
                          <td>".$d->pekerjaan."</td>
                        </tr>
                        <tr>
                          <td>Hubungan Dalam Keluarga</td>
                          <td>:</td>
                          <td>".$d->status_dalam_keluarga."</td>
                        </tr>
                        <tr>
                          <td>Tempat Tinggal</td>
                          <td>:</td>
                          <td>".$d->tempat_tinggal."</td>
                        </tr>
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
<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rw.php');?>

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
					  
					  <?php
					  $data = array();
					  foreach($penduduk as $j){
						  $data[] = $j->id_status_penduduk;
					  }
					  echo
					  "<tr>
						<td> Jumlah Anggota Keluarga</td>
						<td>:</td>
						<td>".count($data)." Orang </td>
						</tr>
						";
					?>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        <!-- END HOME -->
		<div class="col-md-8 col-md-offset-2">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-tag"></span>&nbsp;&nbsp;Detail Anggota Keluarga</h3>
              </div>
                  <div class="panel-body">
                    <table class="table table-striped table-hover ">
                      <tbody>
                      <?php
                      if(count($penduduk) == 0){
                        echo "<h4 class='text-info'>Belum ada data penduduk masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
                        echo "
                        <table class='table table-striped table-hover display' id='example'>
                        <thead>
                            <tr>
							  <th>NIK</th>
                              <th>Nama</th>
							  <th>Status Keluarga</th>
                              <th>Jenis Kelamin</th>
							  <th>Tempat Lahir</th>
                              <th>Tanggal Lahir</th>
                              <th>Usia</th>
                              <th>RT/RW</th>
                              <th>&nbsp;</th>
                            </tr>
                          </thead>
                          <tbody>";
                        foreach($penduduk as $pend){
                          $usia = date_diff(date_create(), date_create($pend->tgl_lahir));
                          echo 
                          "<tr>"
                          . "<td>".$pend->no_penduduk."</td>".
                            "<td>".$pend->nama."</td>".
							 "<td align='center'>".$pend->status_dalam_keluarga."</td>".
                            "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$pend->jenis_kelamin."</td>".
								  "<td>&nbsp;&nbsp;&nbsp;".$pend->tmpt_lahir."</td>".
                              "<td>&nbsp;&nbsp;&nbsp;".$pend->tgl_lahir."</td>".
                            "<td>".$usia->format('%Y tahun')."</td>".
                            "<td>&nbsp;&nbsp;&nbsp;".$pend->rt."/".$pend->rw."</td>".
                            "<td>
                              </span></td>"
                          .
                          "</tr>";
                        }
                        echo "
                          </tbody>
                        </table>";
                      }
                      ?>
					  
					
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>
        
</div>

<a onclick="window.history.back()" class="btn btn-primary navbar-fixed-bottom"><span class="glyphicon glyphicon-chevron-left"></span>&nbsp;&nbsp;kembali ke halaman sebelumnya</a>
</body>
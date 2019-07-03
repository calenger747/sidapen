<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_lurah.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_lurah1.php') ;?>
        <!-- END MENU -->
		
		<!-- HOME -->
        <div class="col-md-9">
		<div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Ketua RT</h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($penduduk3) == 0){
                        echo "<h4 class='text-info'>Belum ada data penduduk masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
                        echo "
                        <table class='table table-striped table-hover display' id='example'>
                        <thead>
                            <tr>
                              <th>Nama</th>
                              <th>RT / RW</th>
                              <th>Detail</th>
                            </tr>
                          </thead>
                          <tbody>";
                        foreach($penduduk3 as $pend){
                          $usia = date_diff(date_create(), date_create($pend->tanggal_input));
                          echo 
                          "<tr>"
                          .
                            "<td>&nbsp;".$pend->user_nama."</td>".
                            "<td>&nbsp;&nbsp;".$pend->rt."&nbsp;"."/"."&nbsp;".$pend->rw."</td>".
                            "<td>&nbsp;&nbsp;
                              <a href='lihat_detail2/".$pend->user_id."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a></td>"
                          .
                          "</tr>";
                        }
                        echo "
                          </tbody>
                        </table>";
                      }
                      ?>
                  </div>
            </div>
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="panel-title clearfix">
                  <span class="pull-left">
                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Statistik Penduduk <strong>| RT <?php echo $rt;?> / RW <?php echo $rw;?></strong>
                  </span>

                 <!-- <span class="pull-right">
                    <a class="btn btn-primary btn-xs" href="<?php echo base_url();?>admin/cetak_data_statistik/<?php echo $jml;?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak PDF</a>
					<a class="btn btn-primary btn-xs" href="<?php echo base_url();?>home_lurah/export_datastatistik_rt/<?php echo $rw;?> <?php echo $rt;?>" target="_blank"><span class="glyphicon glyphicon-print"></span>&nbsp;&nbsp;Cetak Excel</a>
                  </span>-->
                </div>
              </div>
                  
				  <div class="panel-body">
                      <div class="panel panel-default">
                        <ul class="list-group">
                         <li class="list-group-item">
                            <span class="badge"></span>
                            <h4><b>Jumlah Penduduk Keseluruhan | RT <?php echo $rt ;?> RW <?php echo $rw;?>
							&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $jumlah2;?>&nbsp;&nbsp;Orang</b></h4>
							<p>
							 <table class='table table-striped table-hover'>
                          <thead>
                            <tr>
								<td align = "center" valign = "middle">Penduduk Sementara</td>
								<td align = "center" valign = "middle">Jumlah Kepala Keluarga</td>
								<td align = "center" valign = "middle">Pria</td>
								<td align = "center" valign = "middle">Wanita</td>
								<td align = "center" valign = "middle">Kawin</td>
								<td align = "center" valign = "middle">Belum Kawin</td>
								<td align = "center" valign = "middle">Balita</td>
								<td align = "center" valign = "middle">Anak di Atas 5 Tahun</td>
								<td align = "center" valign = "middle">17 Tahun ke Atas</td>
								<td align = "center" valign = "middle">Usia Produktif</td>
								<td align = "center" valign = "middle">60 Tahun ke Atas</td>
                            </tr>
							
							 <tr>
								<td align = "center" valign = "middle"><?php echo $total_sementara2;?></td>
								<td align = "center" valign = "middle"><?php echo $jumlah_kk2;?></td>
								<td align = "center" valign = "middle"><?php echo $total_pria2;?></td>
								<td align = "center" valign = "middle"><?php echo $total_wanita2;?></td>
								<td align = "center" valign = "middle"><?php echo $total_kawin2;?></td>
								<td align = "center" valign = "middle"><?php echo $total_belum_kawin2;?></td>
								<td align = "center" valign = "middle">
								<?php 
									$data = array();
									foreach($jumlah4 as $j){
										$usia = date_diff(date_create(), date_create($j->tgl_lahir));
										if($usia->format('%Y') <= '05'){
										   $data[] = $j->id_status_penduduk;
										}
									}

									echo count($data);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data4 = array();
									foreach($jumlah4 as $j4){
										$usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
										if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
										   $data4[] = $j4->id_status_penduduk;
										}
									}

									echo count($data4);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data13 = array();
									foreach($jumlah4 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $data13[] = $j13->id_status_penduduk;
										}
									}

									echo count($data13);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data2 = array();
									foreach($jumlah4 as $j2){
										$usia2 = date_diff(date_create(), date_create($j2->tgl_lahir));
										if(($usia2->format('%Y') >= '17') AND ($usia2->format('%Y') <= '59')){
										   $data2[] = $j2->id_status_penduduk;
										}
									}

									echo count($data2);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data3 = array();
									foreach($jumlah4 as $j3){
										$usia3 = date_diff(date_create(), date_create($j3->tgl_lahir));
										if($usia3->format('%Y') >= '60'){
										   $data3[] = $j3->id_status_penduduk;
										}
									}

									echo count($data3);
								;?>
								</td>
                            </tr>
							
                          </thead>
                        </table>
                          </li>
						  
						   <li class="list-group-item">
						  <h4><b>Berdasarkan Jenis Kelamin</b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Jumlah Pria</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_pria2;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Jumlah Wanita</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_wanita2;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300"><b>- Total Penduduk :</b></td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $jumlah2;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
						</table>
						</li>
						  
                          <li class="list-group-item">
						 <!-- <h4><b>Berdasarkan Jenis Kelamin</b></h4>-->
                            <span class="badge"><?php echo $total_pria2;?></span>
                             &nbsp;&nbsp;&nbsp;&nbsp;- Pria
						<p>
							 <table class='table table-striped table-hover'>
                          <thead>
                            <tr>
							<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "center" valign = "middle">Balita</td>
								<td align = "center" valign = "middle">Anak di Atas 5 Tahun</td>
								<td align = "center" valign = "middle">17 Tahun ke Atas</td>
								<td align = "center" valign = "middle">Usia Produktif</td>
								<td align = "center" valign = "middle">60 Tahun ke Atas</td>
                            </tr>
							
							 <tr>
							 <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "center" valign = "middle">
								 <?php 
									$data8 = array();
									foreach($jumlah6 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') <= '05'){
										   $data8[] = $j8->id_status_penduduk;
										}
									}

									echo count($data8);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data10 = array();
									foreach($jumlah6 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data13 = array();
									foreach($jumlah6 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $data13[] = $j13->id_status_penduduk;
										}
									}

									echo count($data13);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data6 = array();
									foreach($jumlah6 as $j6){
										$usia6 = date_diff(date_create(), date_create($j6->tgl_lahir));
										if(($usia6->format('%Y') >= '17') AND ($usia6->format('%Y') <= '59')){
										   $data6[] = $j6->id_status_penduduk;
										}
									}

									echo count($data6);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data12 = array();
									foreach($jumlah6 as $j12){
										$usia12 = date_diff(date_create(), date_create($j12->tgl_lahir));
										if($usia12->format('%Y') >= '60'){
										   $data12[] = $j12->id_status_penduduk;
										}
									}

									echo count($data12);
								;?>
								</td>
                            </tr>
							
                          </thead>
                        </table>
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $total_wanita2;?></span>
                             &nbsp;&nbsp;&nbsp;&nbsp;- Wanita
							 <table class='table table-striped table-hover'>
                          <thead>
                            <tr>
							<td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "center" valign = "middle">Balita</td>
								<td align = "center" valign = "middle">Anak di Atas 5 Tahun</td>
								<td align = "center" valign = "middle">17 Tahun ke Atas</td>
								<td align = "center" valign = "middle">Usia Produktif</td>
								<td align = "center" valign = "middle">60 Tahun ke Atas</td>
                            </tr>
							
							 <tr>
							 <td> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "center" valign = "middle">
								 <?php 
									$data7 = array();
									foreach($jumlah5 as $j7){
										$usia7 = date_diff(date_create(), date_create($j7->tgl_lahir));
										if($usia7->format('%Y') <= '05'){
										   $data7[] = $j7->id_status_penduduk;
										}
									}

									echo count($data7);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data9 = array();
									foreach($jumlah5 as $j9){
										$usia9 = date_diff(date_create(), date_create($j9->tgl_lahir));
										if(($usia9->format('%Y') >= '06') AND ($usia9->format('%Y') <= '16')){
										   $data9[] = $j9->id_status_penduduk;
										}
									}

									echo count($data9);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data13 = array();
									foreach($jumlah5 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $data13[] = $j13->id_status_penduduk;
										}
									}

									echo count($data13);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data5 = array();
									foreach($jumlah5 as $j5){
										$usia5 = date_diff(date_create(), date_create($j5->tgl_lahir));
										if(($usia5->format('%Y') >= '17') AND ($usia5->format('%Y') <= '59')){
										   $data5[] = $j5->id_status_penduduk;
										}
									}

									echo count($data5);
								;?>
								</td>
								<td align = "center" valign = "middle">
								<?php 
									$data11 = array();
									foreach($jumlah5 as $j11){
										$usia11 = date_diff(date_create(), date_create($j11->tgl_lahir));
										if($usia11->format('%Y') >= '60'){
										   $data11[] = $j11->id_status_penduduk;
										}
									}

									echo count($data11);
								;?>
								</td>
                            </tr>
							
                          </thead>
                        </table>
                          </li>
						  
						   <!--<li class="list-group-item">
						  <h4><b>Berdasarkan Status Perkawinan</b></h4>
						  <div align = "left">&nbsp;&nbsp;&nbsp;&nbsp;<b>- Kawin : </b></div>
						   <li class="list-group-item">
						    <table class='table table-striped table-hover'>
                             <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Dibawah 17 Tahun : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah7 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							 <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Diatas 17 Tahun : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data8 = array();
									foreach($jumlah7 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $data8[] = $j8->id_status_penduduk;
										}
									}

									echo count($data8);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300"><b>- Total Kawin :</b></td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total_kawin2;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							</table>
							
							  </li>
							 </li>-->
							 
							  <li class="list-group-item">
						  <h4><b>Berdasarkan Status Perkawinan</b></h4>
						  <div align = "left">&nbsp;&nbsp;&nbsp;&nbsp;<b>- Kawin : </b></div>
						   <li class="list-group-item">
						    <table class='table table-striped table-hover'>
                             <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Dibawah 17 Tahun : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php 
									$data10 = array();
									foreach($jumlah7 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Pria : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah10 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Wanita : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah11 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							 <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Diatas 17 Tahun : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php 
									$data8 = array();
									foreach($jumlah7 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $data8[] = $j8->id_status_penduduk;
										}
									}

									echo count($data8);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Pria : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah10 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') >= '17'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Wanita : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah11 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') >= '17'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300"><b>- Total Kawin :</b></td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_kawin2;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							</table>
							
							  </li>
							 </li>
							 
							 	  <li class="list-group-item">
						   <div align = "left">&nbsp;&nbsp;&nbsp;&nbsp;<b>- Belum Kawin : </b></div>
							<li class="list-group-item">
							 <table class='table table-striped table-hover'>
                             <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Dibawah 17 Tahun : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php 
									$data10 = array();
									foreach($jumlah8 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
								</tr>
								<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Pria : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah12 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Wanita : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah13 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							 <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Diatas 17 Tahun : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php 
									$data8 = array();
									foreach($jumlah8 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $data8[] = $j8->id_status_penduduk;
										}
									}

									echo count($data8);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Pria : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah12 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') >= '17'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Wanita : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah13 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') >= '17'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300"><b>- Total Belum Kawin :</b></td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_belum_kawin2;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							</table>
                           </li>
							 </li>
							 
							  <!--<li class="list-group-item">
						   <div align = "left">&nbsp;&nbsp;&nbsp;&nbsp;<b>- Belum Kawin : </b></div>
							<li class="list-group-item">
							 <table class='table table-striped table-hover'>
                             <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Dibawah 17 Tahun : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data10 = array();
									foreach($jumlah8 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							 <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Diatas 17 Tahun : </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php 
									$data8 = array();
									foreach($jumlah8 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $data8[] = $j8->id_status_penduduk;
										}
									}

									echo count($data8);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300"><b>- Total Belum Kawin :</b></td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total_belum_kawin2;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							</table>
                           </li>
							 </li>-->
						  
                          <!--<li class="list-group-item">
						  <h4><b>Status Perkawinan</b></h4>
                            <span class="badge"><?php echo $total_kawin2;?></span>
                            &nbsp;&nbsp;&nbsp;&nbsp;- Kawin
							<p>
							 <table class='table table-striped table-hover'>
                          <thead>
                            <tr>
								<td align = "center" valign = "middle"> Dibawah 17 Tahun</td>
								<td align = "center" valign = "middle"> Diatas 17 Tahun</td>
                            </tr>
							
							 <tr>
								<td align = "center" valign = "middle">
								<?php 
									$data10 = array();
									foreach($jumlah7 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?>
								</td>
								<td align = "center" valign = "middle">
								 <?php 
									$data8 = array();
									foreach($jumlah7 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $data8[] = $j8->id_status_penduduk;
										}
									}

									echo count($data8);
								;?>
								</td>
								
                            </tr>
							
                          </thead>
                        </table>
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $total_belum_kawin2;?></span>
                             &nbsp;&nbsp;&nbsp;&nbsp;- Belum Kawin
							 <p>
							 <table class='table table-striped table-hover'>
                          <thead>
                            <tr>
								<td align = "center" valign = "middle"> Dibawah 17 Tahun</td>
								<td align = "center" valign = "middle"> Diatas 17 Tahun</td>
                            </tr>
							
							 <tr>
								<td align = "center" valign = "middle">
								<?php 
									$data10 = array();
									foreach($jumlah8 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
								;?>
								</td>
								<td align = "center" valign = "middle">
								 <?php 
									$data8 = array();
									foreach($jumlah8 as $j8){
										$usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
										if($usia8->format('%Y') >= '17'){
										   $data8[] = $j8->id_status_penduduk;
										}
									}

									echo count($data8);
								;?>
								</td>
								
                            </tr>
							
                          </thead>
                        </table>
							 
                          </li>-->
						  
						  <li class="list-group-item">
						  <h4><b>Berdasarkan Usia</b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Balita</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge">
							<?php 
							$data = array();
							foreach($jumlah4 as $j){
								$usia = date_diff(date_create(), date_create($j->tgl_lahir));
								if($usia->format('%Y') <= '05'){
									$data[] = $j->id_status_penduduk;
								}
							}

							echo count($data);
							;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							
							 <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Anak Diatas 5 Tahun</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge">
							<?php 
							$data4 = array();
							foreach($jumlah4 as $j4){
								$usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
								if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
								   $data4[] = $j4->id_status_penduduk;
								}
							}

							echo count($data4);
							;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							 <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Usia Produktif</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge">
							<?php 
							$data2 = array();
							foreach($jumlah4 as $j2){
								$usia2 = date_diff(date_create(), date_create($j2->tgl_lahir));
								if(($usia2->format('%Y') >= '17') AND ($usia2->format('%Y') <= '59')){
								   $data2[] = $j2->id_status_penduduk;
								}
							}

							echo count($data2);
							;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- 17 Tahun Ke Atas</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge">
							<?php 
									$data13 = array();
									foreach($jumlah4 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $data13[] = $j13->id_status_penduduk;
										}
									}

									echo count($data13);
								;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- 60 Tahun Ke Atas</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge">
							<?php 
							$data3 = array();
							foreach($jumlah4 as $j3){
								$usia3 = date_diff(date_create(), date_create($j3->tgl_lahir));
								if($usia3->format('%Y') >= '60'){
								   $data3[] = $j3->id_status_penduduk;
								}
							}

							echo count($data3);
							;?></span>&nbsp;&nbsp;Orang</td>
							</tr>
							</table>
                          </li>
						  
						  <!--<li class="list-group-item">
						  <h4><b>Status Kependudukan</b></h4>
                            <span class="badge">
							<?php 
							$data = array();
							foreach($jumlah4 as $j){
								$usia = date_diff(date_create(), date_create($j->tgl_lahir));
								if($usia->format('%Y') <= '05'){
									$data[] = $j->id_status_penduduk;
								}
							}

							echo count($data);
							;?></span>
                            &nbsp;&nbsp;&nbsp;&nbsp;- Balita
                          </li>
                          <li class="list-group-item">
                            <span class="badge">
							<?php 
							$data4 = array();
							foreach($jumlah4 as $j4){
								$usia4 = date_diff(date_create(), date_create($j4->tgl_lahir));
								if(($usia4->format('%Y') >= '06') AND ($usia4->format('%Y') <= '16')){
								   $data4[] = $j4->id_status_penduduk;
								}
							}

							echo count($data4);
							;?></span>
                             &nbsp;&nbsp;&nbsp;&nbsp;- Anak Diatas 5 Tahun
                          </li>
						   <li class="list-group-item">
                            <span class="badge">
							<?php 
									$data13 = array();
									foreach($jumlah4 as $j13){
										$usia13 = date_diff(date_create(), date_create($j13->tgl_lahir));
										if($usia13->format('%Y') >= '17'){
										   $data13[] = $j13->id_status_penduduk;
										}
									}

									echo count($data13);
								;?></span>
                             &nbsp;&nbsp;&nbsp;&nbsp;- 17 Tahun Ke Atas
                          </li>
						   <li class="list-group-item">
                            <span class="badge">
							<?php 
							$data2 = array();
							foreach($jumlah4 as $j2){
								$usia2 = date_diff(date_create(), date_create($j2->tgl_lahir));
								if(($usia2->format('%Y') >= '17') AND ($usia2->format('%Y') <= '59')){
								   $data2[] = $j2->id_status_penduduk;
								}
							}

							echo count($data2);
							;?></span>
                             &nbsp;&nbsp;&nbsp;&nbsp;- Usia Produktif
                          </li>
						   <li class="list-group-item">
                            <span class="badge">
							<?php 
							$data3 = array();
							foreach($jumlah4 as $j3){
								$usia3 = date_diff(date_create(), date_create($j3->tgl_lahir));
								if($usia3->format('%Y') >= '60'){
								   $data3[] = $j3->id_status_penduduk;
								}
							}

							echo count($data3);
							;?></span>
                             &nbsp;&nbsp;&nbsp;&nbsp;- 60 Tahun Ke Atas
                          </li>-->
						  
						  <li class="list-group-item">
						  <h4><b>Berdasarkan Tingkat Pendidikan</b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- SD(Sekolah Dasar)/ Madrasah Ibtidaiyah</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_sd;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- SMP(Sekolah Menengah Pertama) / Madrasah Tsanawiyah</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_smp;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- SMA(Sekolah Menengah Atas) / Madrasah Aliyah / SMK / Sederajat</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_sma;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Diploma III / Ahli Madya </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_d3;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Diploma IV / Strata 1(S1) </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_s1;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Strata 2(S2) </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_s2;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Strata 3(S3) </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_s3;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
						</table>
						</li>
						  
						   <li class="list-group-item">
						  <h4><b>Berdasarkan Jenis / Status Pekerjaan</b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Pelajar</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_sd;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- PNS / TNI / POLRI</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_smp;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Wiraswasta</td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_sma;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Karyawan Swasta </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_d3;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Karyawan BUMN </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_s1;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
							<tr>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle" width="300">- Pensiunan (Swasta / Negeri) </td>
								<td align = "left" valign = "middle" width="80"></td>
								<td align = "left" valign = "middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge"><?php echo $total_s2;?></span>&nbsp;&nbsp;Orang</div></td>
							</tr>
						</table>
						</li>
						  
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jumlah_kk2;?></span>
                            <b>Jumlah Kepala Keluarga</b>
                          </li>
						  <li class="list-group-item">
                            <span class="badge"><?php echo $total_sementara2;?></span>
                            <b>Jumlah Penduduk Sementara</b>
                          </li>
                        </ul>
                      </div>
                  </div>
				  
				  <!--<div class="panel-body">
                      <div class="panel panel-default">
                        <ul class="list-group">
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jml;?></span>
                            Jumlah Penduduk
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jml_sementara;?></span>
                            Jumlah Penduduk Sementara
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jumlah_kk;?></span>
                            Jumlah Kepala Keluarga
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jml_rt;?></span>
                            Jumlah RT
                          </li>
                          <li class="list-group-item">
                            <span class="badge"><?php echo $jml_lurah;?></span>
                            Jumlah Kelurahan
                          </li>
                        </ul>
                      </div>
                  </div>-->           
		   </div>
		   <!--<div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Ketua RT dan RW</h3>
              </div>
                  <div class="panel-body">
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
                              <th>Nama</th>
                              <th>RT/RW</th>
                              <th>Detail</th>
                            </tr>
                          </thead>
                          <tbody>";
                        foreach($penduduk as $pend){
                          $usia = date_diff(date_create(), date_create($pend->tanggal_input));
                          echo 
                          "<tr>"
                          .
                            "<td>".$pend->user_nama."</td>".
                            "<td>&nbsp;&nbsp;&nbsp;".$pend->rt."/".$pend->rw."</td>".
                            "<td>&nbsp;&nbsp;
                              <a href='lihat_detail1/".$pend->user_id."' class='btn btn-info btn-sm'><span class='glyphicon glyphicon-info-sign'></span></a></td>"
                          .
                          "</tr>";
                        }
                        echo "
                          </tbody>
                        </table>";
                      }
                      ?>
                  </div>
            </div>-->
        </div>
        <!-- END HOME -->
		
		 <div class="col-md-9">
            
        </div>
        
</div>
</body>
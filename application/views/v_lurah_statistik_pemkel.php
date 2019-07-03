<?php $rw = $this->input->get('rw'); ?>
<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_lurah.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_lurah2.php') ;?>
        <!-- END MENU -->
		
		<!-- HOME -->
        <div class="col-md-9">
		<div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Ketua RW</h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($penduduk2) == 0){
                        echo "<h4 class='text-info'>Belum ada data sarana masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
                        echo "
                        <table class='table table-striped table-hover display' id='example'>
                        <thead>
                            <tr>
                              <th>Nama</th>
                              <th>RW</th>
                              <th>Detail</th>
                            </tr>
                          </thead>
                          <tbody>";
                        foreach($penduduk2 as $pend){
                          $usia = date_diff(date_create(), date_create($pend->tanggal_input));
                          echo 
                          "<tr>"
                          .
                            "<td>&nbsp;".$pend->user_nama."</td>".
                            "<td>&nbsp;&nbsp;" ,"/".$pend->rw."</td>".
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
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<strong>Data Sarana dan Prasarana | RW <?php echo $rw;?></strong></h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($jumlah_pemkel) == 0){
                        echo "<h4 class='text-info'>Belum ada data penduduk masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
						 foreach($jumlah_pemkel as $pend){
                        echo "
                         <table class='table table-striped table-hover'>
                        <thead>
                          </thead>
                          <tbody>";
                       
					    echo 
						  "<tr>"
                          .
						    "<td>&nbsp;&nbsp;"."Sarana Pemerintah Kelurahan"."&nbsp;"."RT"."&nbsp;".$pend->rt."&nbsp;"."/"."&nbsp;"."RW"."&nbsp;".$pend->rw."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".

							"</tr>";
					   
                          echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Kantor Lurah"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->kantor_lurah."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
						  
						   echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Balai Pertemuan"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->balai_pertemuan."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
						  
						  echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Pos RW"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->pos_rw."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
				        	"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".
						    "<td>&nbsp;"."&nbsp;"."</td>".
                          "</tr>";
                        }
                        echo "
                          </tbody>
                        </table>";
                      }
                      ?>
					   <?php
								 $total= 0;
								 $total1= 0;
								 $total2= 0;
								$ambildata = mysql_query("select * from sarana_pemerintah WHERE rw='$rw' ");

								while ($tampilkan = mysql_fetch_array($ambildata)){
								$kantor_lurah = $tampilkan['kantor_lurah'];
								$total+=$kantor_lurah;
								$balai_pertemuan = $tampilkan['balai_pertemuan'];
								$total1+=$balai_pertemuan;
								$pos_rw = $tampilkan['pos_rw'];
								$total2+=$pos_rw;
								}
								?>
					   <li class="list-group-item">
					    <h4><b>Total Sarana Pemerintah Kelurahan | RW <?php echo $rw;?></b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Kantor Lurah</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total;?></span>&nbsp;&nbsp;Unit Kantor Lurah</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Balai Pertemuan</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total1;?></span>&nbsp;&nbsp;Unit Balai pertemuan</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Pos RW</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total2;?></span>&nbsp;&nbsp;Unit Pos RW</td>
							</tr>
						</table>
						</li>
                  </div>
            </div>
           
		  <!-- <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;Data Ketua RT</h3>
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
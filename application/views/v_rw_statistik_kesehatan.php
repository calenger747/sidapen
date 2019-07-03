<?php $rw = $this->session->userdata('rw'); ?>
<?php include('head.php');?>

<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_rw.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        <?php include('menu_rw2.php') ;?>
        <!-- END MENU -->
		
		<!-- HOME -->
        <div class="col-md-9">
		<div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<strong>Data Sarana dan Prasarana | RW <?php echo $rw;?></strong></h3>
              </div>
                  <div class="panel-body">
                      <?php
                      if(count($jumlah_puskesmas) == 0){
                        echo "<h4 class='text-info'>Belum ada data sarana masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
						 foreach($jumlah_puskesmas as $pend){
                        echo "
                         <table class='table table-striped table-hover'>
                        <thead>
                          </thead>
                          <tbody>";
                       
					    echo 
						  "<tr>"
                          .
						    "<td>&nbsp;&nbsp;"."Sarana Kesehatan"."&nbsp;"."RT"."&nbsp;".$pend->rt."&nbsp;"."/"."&nbsp;"."RW"."&nbsp;".$pend->rw."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".

							"</tr>";
					   
                          echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Puskesmas"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->puskesmas."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Posyandu"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->posyandu."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Praktek Bidan"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->praktek_bidan."</td>".
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
								$ambildata = mysql_query("select * from sarana_kesehatan WHERE rw='$rw' ");

								while ($tampilkan = mysql_fetch_array($ambildata)){
								$jumlah_puskesmas = $tampilkan['puskesmas'];
								$total+=$jumlah_puskesmas;
								$jumlah_posyandu = $tampilkan['posyandu'];
								$total1+=$jumlah_posyandu;
								$jumlah_praktek_bidan = $tampilkan['praktek_bidan'];
								$total2+=$jumlah_praktek_bidan;
								}
								?>
					   <li class="list-group-item">
					    <h4><b>Total Sarana Kesehatan | RW <?php echo $rw;?></b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Puskesmas</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total;?></span>&nbsp;&nbsp;Unit Puskesmas</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Posyandu</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total1;?></span>&nbsp;&nbsp;Unit Posyandu</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Praktek Bidan</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total2;?></span>&nbsp;&nbsp;Unit Praktek Bidan</td>
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
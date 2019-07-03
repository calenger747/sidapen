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
                      if(count($jumlah_pendidikan) == 0){
                        echo "<h4 class='text-info'>Belum ada data sarana masuk.</h4>";
                      }
                      else
                      {
                        $no = 1;
						 foreach($jumlah_pendidikan as $pend){
                        echo "
                         <table class='table table-striped table-hover'>
                        <thead>
                          </thead>
                          <tbody>";
                       
					    echo 
						  "<tr>"
                          .
						    "<td>&nbsp;&nbsp;"."Sarana Pendidikan"."&nbsp;"."RT"."&nbsp;".$pend->rt."&nbsp;"."/"."&nbsp;"."RW"."&nbsp;".$pend->rw."</td>".
							"<td>&nbsp;"."&nbsp;"."</td>".

							"</tr>";
					   
                          echo 
                          "<tr>"
                          .
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah PAUD / TK"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->paud."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Sekolah Dasar Negeri(SDN)"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->sd_negeri."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Sekolah Dasar Swasta"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->sd_swasta."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Madrasah Ibtidaiyah(MI)"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->madrasah_ibridaiyah."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Sekolah Menengah Pertama Negeri(SMPN)"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->sltp_negeri."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Sekolah Menengah Pertama Swasta"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->sltp_swasta."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Madrasah Tsanawiyah"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->madrasah_tsanawiyah."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Sekolah Menengah Atas(SMA)"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->slta_negeri."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Sekolah Menengah Atas Swasta"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->slta_swasta."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Madrasah Aliyah"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->madrasah_aliyah."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Perguruan Tinggi Negeri (PTN)"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->pt_negeri."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Perguruan Tinggi Swasta (PTS)"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->pt_swasta."</td>".
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
						    "<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"." - Jumlah Pesantren"."</td>".
							"<td>&nbsp;"."="."</td>".
                            "<td>&nbsp;".$pend->pesantren."</td>".
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
								 $total3= 0;
								 $total4= 0;
								 $total5= 0;
								 $total6= 0;
								 $total7= 0;
								 $total8= 0;
								 $total9= 0;
								 $total10= 0;
								 $total11= 0;
								 $total12= 0;
								$ambildata = mysql_query("select * from sarana_pendidikan WHERE rw='$rw' ");

								while ($tampilkan = mysql_fetch_array($ambildata)){
								$paud = $tampilkan['paud'];
								$total+=$paud;
								
								$sd_negeri = $tampilkan['sd_negeri'];
								$total1+=$sd_negeri;
								
								$sd_swasta = $tampilkan['sd_swasta'];
								$total2+=$sd_swasta;
								
								$madrasah_ibridaiyah = $tampilkan['madrasah_ibridaiyah'];
								$total3+=$madrasah_ibridaiyah;
								
								$sltp_negeri = $tampilkan['sltp_negeri'];
								$total4+=$sltp_negeri;
								
								$sltp_swasta = $tampilkan['sltp_swasta'];
								$total5+=$sltp_swasta;
								
								$madrasah_tsanawiyah = $tampilkan['madrasah_tsanawiyah'];
								$total6+=$madrasah_tsanawiyah;
								
								$slta_negeri = $tampilkan['slta_negeri'];
								$total7+=$slta_negeri;
								
								$slta_swasta = $tampilkan['slta_swasta'];
								$total8+=$slta_swasta;
								
								$madrasah_aliyah = $tampilkan['madrasah_aliyah'];
								$total9+=$madrasah_aliyah;
								
								$pt_negeri = $tampilkan['pt_negeri'];
								$total10+=$pt_negeri;
								
								$pt_swasta = $tampilkan['pt_swasta'];
								$total11+=$pt_swasta;
								
								$pesantren = $tampilkan['pesantren'];
								$total12+=$pesantren;
								}
								?>
					   <li class="list-group-item">
					    <h4><b>Total Sarana Pendidikan | RW <?php echo $rw;?></b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Paud / TK</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total;?></span>&nbsp;&nbsp;Unit Paud / TK </td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Sekolah Dasar Negeri (SDN)</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total1;?></span>&nbsp;&nbsp;Unit Sekolah Dasar Negeri (SDN)</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Sekolah Dasar Swasta</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total2;?></span>&nbsp;&nbsp;Unit Sekolah Dasar Swasta</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Madrasah Ibtidaiyah</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total3;?></span>&nbsp;&nbsp;Unit Madrasah Ibtidaiyah</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah SMP Negeri</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total4;?></span>&nbsp;&nbsp;Unit Sekolah Menengah Pertama Negeri (SMPN) </td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah SMP Swasta</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total5;?></span>&nbsp;&nbsp;Unit Sekolah Menengah Pertama Swasta</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Madrasah Tsanawiyah </td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total6;?></span>&nbsp;&nbsp;Unit Madrasah Tsanawiyah</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah SMA Negeri</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total7;?></span>&nbsp;&nbsp;Unit Sekolah Menengah Atas Negeri (SMAN) </td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah SMA Swasta</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total8;?></span>&nbsp;&nbsp;Unit Sekolah Menengah Atas Swasta</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Madrasah Aliyah </td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total9;?></span>&nbsp;&nbsp;Unit Madrasah Aliyah</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Perguruan Tinggi Negeri (PTN)</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total10;?></span>&nbsp;&nbsp;Unit Perguruan Tinggi Negeri (PTN) </td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Perguruan Tinggi Swasta (PTS)</td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total11;?></span>&nbsp;&nbsp;Unit Perguruan Tinggi Swasta (PTS)</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Pesantren </td>
								<td align = "left" valign = "middle" width="100">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total12;?></span>&nbsp;&nbsp;Unit Pesantren</td>
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
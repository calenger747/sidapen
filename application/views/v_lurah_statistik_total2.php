
<?php include('head.php');?>
<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title><?php echo $title;?></title>
        <link href="<?php echo base_url();?>berkas/css/bootstrap.css" rel="stylesheet">
		<script src="<?php echo base_url();?>berkas/js/jquery.js" type="text/javascript"></script>
		<style type="text/css">
${demo.css}
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'Grafik Sarana Pendidikan'
        },
        subtitle: {
            text: 'Kelurahan'
        },
        xAxis: {
            categories: [
				'RW 01',
				'RW 02',
				'RW 03',
				'RW 04',
				'RW 05',
				'RW 06',
				'RW 07',
				'RW 08',
				'RW 09',
				'RW 10',
				'RW 11',
				'RW 12',
				'RW 13',
				'RW 14',
				'RW 15'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (Unit)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} unit</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Jumlah',
            data: [
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
								$ambildata = mysql_query("select * from sarana_pendidikan WHERE rw='05' ");

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
								
								$total13 = $total+$total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9+$total10+$total11+$total12;
								}
								?>
								
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $total13;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>
              
            ]
        }]
    });
});

$(function () {
    $('#container1').highcharts({
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Diagram Sarana Pendidikan'
        },
        subtitle: {
            text: 'Kelurahan Range 100%'
        },
        xAxis: {
            categories: [
				'RW 05'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Presentase (%)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} %</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Presentase',
            data: [
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
								$ambildata = mysql_query("select * from sarana_pendidikan ");

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
								
								$total13 = $total+$total1+$total2+$total3+$total4+$total5+$total6+$total7+$total8+$total9+$total10+$total11+$total12;
								}
								?>
								
				['PAUD / TK', <?php echo number_format((($total/$total13)*100),2);?>], 
			    ['SD Negeri', <?php echo number_format((($total1/$total13)*100),2);?>],
			    ['SD Swasta', <?php echo number_format((($total2/$total13)*100),2);?>],
				['Madrasah Ibtidaiyah', <?php echo number_format((($total3/$total13)*100),2);?>], 
			    ['SMP Negeri', <?php echo number_format((($total4/$total13)*100),2);?>],
			    ['SMP Swasta', <?php echo number_format((($total5/$total13)*100),2);?>],
				['Madrasah Tsanawiyah', <?php echo number_format((($total6/$total13)*100),2);?>], 
			    ['SMA Negeri', <?php echo number_format((($total7/$total13)*100),2);?>],
			    ['SMA Swasta', <?php echo number_format((($total8/$total13)*100),2);?>],
				['Madrasah Aliyah', <?php echo number_format((($total9/$total13)*100),2);?>], 
			    ['Perguruan Tinggi Negeri', <?php echo number_format((($total10/$total13)*100),2);?>],
			    ['Perguruan Tinggi Swasta', <?php echo number_format((($total11/$total13)*100),2);?>],
				['Pesantren', <?php echo number_format((($total12/$total13)*100),2);?>]
              
            ]
        }]
    });
});
		</script>
	</head>
<body style="background: url(<?php echo base_url();?>berkas/img/blue.jpeg) no-repeat fixed center; background-size: 100% 100%">
<?php include('navbar_lurah.php');?>

<div style="margin-top: 80px;">
        
        <!-- MENU -->

        
        <!-- END MENU -->
        
        <!-- HOME -->
        <div class="col-md-9">
		
            <div class="panel panel-warning">
			
              <div class="panel-heading">
                <h3 class="panel-title"><span class="glyphicon glyphicon-list-alt"></span>&nbsp;&nbsp;<strong>Data Sarana dan Prasarana | Kelurahan</strong></h3>
              </div>
                  <div class="panel-body">
                      
                     
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
								$ambildata = mysql_query("select * from sarana_pendidikan ");

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
					    <h4><b>Total Sarana Pendidikan </b></h4>
						   <table class='table table-striped table-hover'>
                             <tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Paud / TK</td>
							
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total;?></span>&nbsp;&nbsp;Unit Paud / TK </td>
								<td rowspan ="13"><div id="container1" style="min-width: 480px; height: 500px; margin: 0 auto"></div></td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Sekolah Dasar Negeri (SDN)</td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total1;?></span>&nbsp;&nbsp;Unit Sekolah Dasar Negeri (SDN)</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Sekolah Dasar Swasta</td>
							
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total2;?></span>&nbsp;&nbsp;Unit Sekolah Dasar Swasta</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Madrasah Ibtidaiyah</td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total3;?></span>&nbsp;&nbsp;Unit Madrasah Ibtidaiyah</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah SMP Negeri</td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total4;?></span>&nbsp;&nbsp;Unit Sekolah Menengah Pertama Negeri (SMPN) </td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah SMP Swasta</td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total5;?></span>&nbsp;&nbsp;Unit Sekolah Menengah Pertama Swasta</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Madrasah Tsanawiyah </td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total6;?></span>&nbsp;&nbsp;Unit Madrasah Tsanawiyah</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah SMA Negeri</td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total7;?></span>&nbsp;&nbsp;Unit Sekolah Menengah Atas Negeri (SMAN) </td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah SMA Swasta</td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total8;?></span>&nbsp;&nbsp;Unit Sekolah Menengah Atas Swasta</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Madrasah Aliyah </td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total9;?></span>&nbsp;&nbsp;Unit Madrasah Aliyah</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Perguruan Tinggi Negeri (PTN)</td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total10;?></span>&nbsp;&nbsp;Unit Perguruan Tinggi Negeri (PTN) </td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Perguruan Tinggi Swasta (PTS)</td>
							
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total11;?></span>&nbsp;&nbsp;Unit Perguruan Tinggi Swasta (PTS)</td>
							</tr>
							<tr>
								
								<td align = "left" valign = "middle" width="300">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Jumlah Pesantren </td>
								
								<td align = "left" valign = "middle"><span class="badge"><?php echo $total12;?></span>&nbsp;&nbsp;Unit Pesantren</td>
							</tr>
						</table>
						 <table class='table table-striped table-hover'>
							<tr>
							<td>
							<div id="container" style="min-width: 830px; height: 350px; margin: 0 auto"></div></td>
							</tr>
						</table>
						</li>
						
                  </div>
            </div>			
		  <!-- <div class="panel panel-warning">
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
        <?php include('menu_lurah2.php') ;?>
		<script src="<?php echo base_url();?>berkas/js/highcharts.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>berkas/js/exporting.js" type="text/javascript"></script>
</div>
</body>
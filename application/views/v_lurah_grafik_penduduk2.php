<!DOCTYPE HTML>
<html>
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
            text: 'Grafik Penduduk'
        },
        subtitle: {
            text: 'Kelurahan'
        },
        xAxis: {
            categories: [
                'Penduduk',
                'Penduduk Sementara',
				'Kepala Keluarga',
                'Jumlah Pria',
                'Jumlah Wanita',
                'Kawin',
                'Belum Kawin',
                'Jumlah Balita',
				'Jumlah Anak di atas 5 tahun',
                'Jumlah usia 17 tahun ke atas',
				'Jumlah usia Produktif',
                'Jumlah usia 60 tahun ke atas',
				'Jumlah RT',
				'Jumlah RW'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (orang)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} orang</b></td></tr>',
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
                <?php echo $jml;?>, 
                <?php echo $jml_sementara;?>, 
				<?php echo $jumlah_kk;?>,
				<?php echo $jumlah1;?>,
				<?php echo $jumlah2;?>,
				<?php echo $jumlah3;?>,
				<?php echo $jumlah4;?>,
				 <?php 
                $data8 = array();
                foreach($jumlah5 as $j8){
                    $usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
                    if($usia8->format('%Y') <= '05'){
                       $data8[] = $j8->id_status_penduduk;
                    }
                }

                echo count($data8);
                ;?>,
				<?php 
                $data10 = array();
                foreach($jumlah5 as $j10){
                    $usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
                    if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){
                       $data10[] = $j10->id_status_penduduk;
                    }
                }

                echo count($data10);
                ;?>,
				<?php 
                $data9 = array();
                foreach($jumlah5 as $j9){
                    $usia9 = date_diff(date_create(), date_create($j9->tgl_lahir));
                    if($usia9->format('%Y') >= '17'){
                       $data9[] = $j9->id_status_penduduk;
                    }
                }

                echo count($data9);
                ;?>,
				<?php 
                $data6 = array();
                foreach($jumlah5 as $j6){
                    $usia6 = date_diff(date_create(), date_create($j6->tgl_lahir));
                    if(($usia6->format('%Y') >= '17') AND ($usia6->format('%Y') <= '59')){
                       $data6[] = $j6->id_status_penduduk;
                    }
                }

                echo count($data6);
                ;?>,
				<?php 
                $data12 = array();
                foreach($jumlah5 as $j12){
                    $usia12 = date_diff(date_create(), date_create($j12->tgl_lahir));
                    if($usia12->format('%Y') >= '60'){
                       $data12[] = $j12->id_status_penduduk;
                    }
                }

                echo count($data12);
                ;?>,
				<?php echo $jml_rt;?>, 
				<?php echo $jml_rw;?>
              
            ]
        }]
    });
});

$(function () {
    $('#container1').highcharts({
        chart: {
            type: ''
        },
        title: {
            text: 'Grafik Penduduk Pria'
        },
        subtitle: {
            text: 'Kelurahan'
        },
        xAxis: {
            categories: [
                 //'Penduduk',
                //'Penduduk Sementara',
                //'Kepala Keluarga',
                'Jumlah Pria',
				'Balita laki-laki',
				'Anak laki-laki di atas 5 tahun',
				'Pria usia produktif',
				'Pria di atas 17 tahun',
				'Pria di atas 60 tahun',
				'Pria menikah di atas 17 tahun',
				'Pria menikah di bawah 17 tahun',
				'Pria belum menikah di atas 17 tahun',
				'Pria belum menikah di bawah 17 tahun',
                //'Jumlah Wanita',
				//'Balita perempuan',
				//'Anak perempuan di atas 5 tahun',
				//'Wanita di atas 17 tahun',
				//'Wanita di atas 60 tahun',
               // 'Kawin',
               // 'Belum Kawin',
               // 'Jumlah Balita',
				//'Jumlah Anak di atas 5 tahun',
               // 'Jumlah usia 17 tahun ke atas',
               // 'Jumlah usia 60 tahun ke atas'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (orang)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} orang</b></td></tr>',
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
                <?php echo $jumlah1;?>, 
				 <?php 
                $data8 = array();
                foreach($jumlah7 as $j8){
                    $usia8 = date_diff(date_create(), date_create($j8->tgl_lahir));
                    if($usia8->format('%Y') <= '05'){
                       $data8[] = $j8->id_status_penduduk;
                    }
                }

                echo count($data8);
                ;?>,
				<?php 
                $data10 = array();
                foreach($jumlah7 as $j10){
                    $usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
                    if(($usia10->format('%Y') >= '06') AND ($usia10->format('%Y') <= '16')){
                       $data10[] = $j10->id_status_penduduk;
                    }
                }

                echo count($data10);
                ;?>,
				<?php 
                $data6 = array();
                foreach($jumlah7 as $j6){
                    $usia6 = date_diff(date_create(), date_create($j6->tgl_lahir));
                    if(($usia6->format('%Y') >= '17') AND ($usia6->format('%Y') <= '59')){
                       $data6[] = $j6->id_status_penduduk;
                    }
                }

                echo count($data6);
                ;?>,
				<?php 
                $data16 = array();
                foreach($jumlah7 as $j16){
                    $usia16 = date_diff(date_create(), date_create($j16->tgl_lahir));
                    if($usia16->format('%Y') >= '17'){
                       $data16[] = $j16->id_status_penduduk;
                    }
                }

                echo count($data16);
                ;?>,
				<?php 
                $data12 = array();
                foreach($jumlah7 as $j12){
                    $usia12 = date_diff(date_create(), date_create($j12->tgl_lahir));
                    if($usia12->format('%Y') >= '60'){
                       $data12[] = $j12->id_status_penduduk;
                    }
                }

                echo count($data12);
                ;?>,
				<?php
				$data10 = array();
									foreach($jumlah8 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') >= '17'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
				?>,
				<?php
				$data10 = array();
									foreach($jumlah8 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
				?>,
				<?php
				$data10 = array();
									foreach($jumlah10 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') >= '17'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
				?>,
				<?php
				$data10 = array();
									foreach($jumlah10 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
				?>
              
            ]
        }]
    });
});

$(function () {
    $('#container2').highcharts({
        chart: {
            type: ''
        },
        title: {
            text: 'Grafik Penduduk Wanita'
        },
        subtitle: {
            text: 'Kelurahan'
        },
        xAxis: {
            categories: [
                  //'Penduduk',
                //'Penduduk Sementara',
                //'Kepala Keluarga',
                //'Jumlah Pria',
				//'Balita laki-laki',
				//'Anak laki-laki di atas 5 tahun',
				//'Pria usia produktif',
				//'Pria di atas 17 tahun',
				//'Pria di atas 60 tahun',
                'Jumlah Wanita',
				'Balita perempuan',
				'Anak perempuan di atas 5 tahun',
				'Wanita usia produktif',
				'Wanita di atas 17 tahun',
				'Wanita di atas 60 tahun',
				'Wanita menikah di atas 17 tahun',
				'Wanita menikah di bawah 17 tahun',
				'Wanita belum menikah di atas 17 tahun',
				'Wanita belum menikah di bawah 17 tahun',
               // 'Kawin',
               // 'Belum Kawin',
               // 'Jumlah Balita',
				//'Jumlah Anak di atas 5 tahun',
               // 'Jumlah usia 17 tahun ke atas',
               // 'Jumlah usia 60 tahun ke atas'
            ]
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (orang)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:1f} orang</b></td></tr>',
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
               <?php echo $jumlah2;?>, 
				<?php 
                $data7 = array();
                foreach($jumlah6 as $j7){
                    $usia7 = date_diff(date_create(), date_create($j7->tgl_lahir));
                    if($usia7->format('%Y') <= '05'){
                       $data7[] = $j7->id_status_penduduk;
                    }
                }

                echo count($data7);
                ;?>,
				<?php 
                $data9 = array();
                foreach($jumlah6 as $j9){
                    $usia9 = date_diff(date_create(), date_create($j9->tgl_lahir));
                    if(($usia9->format('%Y') >= '06') AND ($usia9->format('%Y') <= '16')){
                       $data9[] = $j9->id_status_penduduk;
                    }
                }

                echo count($data9);
                ;?>,
				<?php 
                $data5 = array();
                foreach($jumlah6 as $j5){
                    $usia5 = date_diff(date_create(), date_create($j5->tgl_lahir));
                    if(($usia5->format('%Y') >= '17') AND ($usia5->format('%Y') <= '59')){
                       $data5[] = $j5->id_status_penduduk;
                    }
                }

                echo count($data5);
                ;?>,
				<?php 
                $data15 = array();
                foreach($jumlah6 as $j15){
                    $usia15 = date_diff(date_create(), date_create($j15->tgl_lahir));
                    if($usia15->format('%Y') >= '17'){
                       $data15[] = $j15->id_status_penduduk;
                    }
                }

                echo count($data15);
                ;?>,
				<?php 
                $data11 = array();
                foreach($jumlah6 as $j11){
                    $usia11 = date_diff(date_create(), date_create($j11->tgl_lahir));
                    if($usia11->format('%Y') >= '60'){
                       $data11[] = $j11->id_status_penduduk;
                    }
                }

                echo count($data11);
                ;?>,
				<?php
				$data10 = array();
									foreach($jumlah9 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') >= '17'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
				?>,
				<?php
				$data10 = array();
									foreach($jumlah9 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
				?>,
				<?php
				$data10 = array();
									foreach($jumlah11 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') >= '17'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
				?>,
				<?php
				$data10 = array();
									foreach($jumlah11 as $j10){
										$usia10 = date_diff(date_create(), date_create($j10->tgl_lahir));
										if($usia10->format('%Y') <= '16'){
										   $data10[] = $j10->id_status_penduduk;
										}
									}

									echo count($data10);
				?>
              
            ]
        }]
    });
});

		</script>
	</head>
	<body>
 <script src="<?php echo base_url();?>berkas/js/highcharts.js" type="text/javascript"></script>
        <script src="<?php echo base_url();?>berkas/js/exporting.js" type="text/javascript"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
<table align ="center">
<tr>
	<td><div id="container1" style="width: 800px; height: 400px; margin: 0 auto" ></div></td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
	<td><div id="container2" style="width: 800px; height: 400px; margin: 0 auto" ></div></td>
</tr>
</table>
<div class="container" align="center">
    <button class="btn btn-sm btn-info" onclick="window.location='<?php echo base_url();?>home_lurah'">&larr; kembali ke halaman sebelumnya</button><p>
	 <img src="<?php echo base_url();?>berkas/img/lrlogo.png" width="200px">
		&copy; Hak Cipta 2015 &minus; LRCOM
</div>
	</body>
</html>
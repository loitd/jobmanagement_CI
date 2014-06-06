<html>
<head>
	<title>Quan ly truc</title>
	<!--Load the AJAX API
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	-->
	<script type="text/javascript" src="/QuanLyTruc/js/jquery.min.js"></script>
	<script type="text/javascript" src="/QuanLyTruc/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/QuanLyTruc/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/QuanLyTruc/js/jsapi.js"></script>
	
	<link rel="stylesheet" type="text/css" href="/QuanLyTruc/css/bootstrap.min.css"/>
	<link rel="stylesheet" type="text/css" href="/QuanLyTruc/css/datepicker.css"/>
	<link rel="stylesheet" type="text/css" href="/QuanLyTruc/css/font-awesome.min.css"/>
	<link rel="stylesheet" type="text/css" href="/QuanLyTruc/css/qlt_baocao.css"/>
	
	
	<script type="text/javascript">
    
    </script>


</head>
<body>

<div id="header" style="width: 1000px; align: center; margin: auto; padding-bottom: 15px;">
	<!--Div that will hold the pie chart-->
	<ul>
		<li><a href="/quanlytruc/index.php/quanlytruc/">Báo cáo lỗi</a></li>
		<li><a href="/quanlytruc/index.php/quanlytruc/tonghop/">Tổng hợp</a></li>
		<li><a href="/quanlytruc/index.php/quanlytruc/export">Export Excel</a></li>
		<li><?php 
		//print_r($data);
		//var_dump($data);
		/*
		Luu y can init var truoc khi tao form. Neu khong bien se khong doc duoc.
		*/
		$samp = $data['services'];
		//var_dump($samp[0]['SERVICE_NAME']);
		echo $data['username']; 
		?></li>
		<li><a href="/quanlytruc/index.php/quanlytruc/logout">Logout</a></li>
		<li class="endli"><a href="/quanlytruc/index.php/quanlytruc/register">Register</a></li>
	</ul>
</div>

<div id="form" style="align: center; width: 1000px; margin: auto;">
	<h2><span class="fontawesome-lock"></span>Báo cáo trực hệ thống</h2>
	<?php 
		//var_dump($data); 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	?>
	
	<div style="font-style: italic; color: red;">
		<?php echo validation_errors(); ?>
	</div>
	
	<?php echo form_open('/quanlytruc/index'); ?>
	<label for="service_name">Tên dịch vụ:</label>
	<select id="service_name" name="service_name">
		<?php 
			for($i =0; $i< count($samp); $i++)
			{
				//echo '<option value="' . $samp[$i]['SERVICE_NAME'] . '">' . $samp['SERVICE_NAME'] . '</option>';
				echo '<option value="' . $samp[$i]['SERVICE_NAME'] .'">' . $samp[$i]['SERVICE_NAME'] . '</option>';
			}
			
		?>
	</select>
	<br/>
	<!-- -->
	<label for="error_code">Mã lỗi:</label>
	<input type="text" size="30" id="error_code" name="error_code"/></td>
	<br/>
	<!-- -->
	<label for="error_desc">Mô tả lỗi:</label></br>
	<textarea rows="4" cols="50" name="error_desc" placeholder="Error description here."></textarea>
	<br/>
	<!-- -->
	<label for="solution_desc">Mô tả cách xử lý:</label></br>
	<textarea rows="4" cols="50" name="solution_desc" placeholder="Error solution here."></textarea>
	<br/>
	<!-- -->
	<label for="error_time">Thời gian lỗi:</label>
	<input type="text" size="30" id="error_time" name="error_time" value="<?php echo date("m/d/Y H:i:s", time());?>"/>
	<br/>
	<!-- -->
	<label for="solution_time">Thời gian xử lý lỗi:</label>
	<select id="solution_time" name="solution_time">
		<option value="0">Trong giờ hành chính</option>
		<option value="0.5">30 phút</option>
		<option value="1">1 giờ</option>
		<option value="1.5">1 giờ 30 phút</option>
		<option value="2">2 giờ</option>
		<option value="2.5">2 giờ 30 phút</option>
		<option value="3">3 giờ</option>
		<option value="3.5">3 giờ 30 phút</option>
		<option value="4">4 giờ</option>
		<option value="4.5">4 giờ 30 phút</option>
		<option value="5">5 giờ</option>
		<option value="5.5">5 giờ 30 phút</option>
		<option value="6">6 giờ</option>
		<option value="6.5">6 giờ 30 phút</option>
		<option value="7">7 giờ</option>
		<option value="7.5">7 giờ 30 phút</option>
		<option value="8">8 giờ</option>
		<option value="8.5">8 giờ 30 phút</option>
		<option value="9">9 giờ</option>
		<option value="9.5">9 giờ 30 phút</option>
		<option value="10">10 giờ</option>
		<option value="0">Không xử lý</option>
	</select>
	<br/>
	<!-- -->
	<input type="submit" value="Submit" name="submit"/><br/>
	<!-- -->
	<?php echo $data['submit_result'];?>
</div>

</body>
</html>
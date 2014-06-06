<html>
<head>
	<title>Quan ly truc register page</title>
	<!--Load the AJAX API
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	-->
	<script type="text/javascript" src="js/jsapi.js"></script>
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="/QuanLyTruc/css/qlt_login.css"/>
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
		//$samp = $data['services'];
		//var_dump($samp[0]['SERVICE_NAME']);
		echo $data['username']; 
		?></li>
		<li><a href="/quanlytruc/index.php/quanlytruc/logout">Logout</a></li>
		<li class="endli"><a href="/quanlytruc/index.php/quanlytruc/register">Register</a></li>
	</ul>
</div>

<div id="form" style="align: center; width: 1000px; margin: auto;">
	<h2><span class="fontawesome-lock"></span>Register new user</h2>
	
	<div style="font-style: italic; color: red;">
		<?php echo validation_errors(); ?>
	</div>
	
	<?php echo form_open('/quanlytruc/register'); ?>
	
	<label for="username">Username:</label>
	<input type="text" size="30" id="username" name="username"/>
	<br/>
	<label for="fullname">Fullname:</label>
	<input type="text" size="30" id="fullname" name="fullname"/>
	<br/>
	<label for="password">Password:</label>
	<input type="password" size="30" id="password" name="password"/>
	<br/>
	<input type="submit" value="Register" name="submit"/>
	</br>
	<?php 
		echo $data['submit_result']; 
	?>
</div>

</body>
</html>
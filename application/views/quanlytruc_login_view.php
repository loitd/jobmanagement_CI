<html>
<head>
	<title>Quan ly truc login page</title>
	<!--Load the AJAX API
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	-->
	<script type="text/javascript" src="/QuanLyTruc/js/jquery.min.js"></script>
	<script type="text/javascript" src="/QuanLyTruc/js/bootstrap-datepicker.js"></script>
	<script type="text/javascript" src="/QuanLyTruc/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/QuanLyTruc/js/jsapi.js"></script>
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
		<li class="endli"><a href="/quanlytruc/index.php/quanlytruc/export">Export Excel</a></li>
		<li class="endli"><a href="/quanlytruc/index.php/quanlytruc/register">Register</a></li>
	</ul>
</div>

<div id="form" style="align: center; width: 1000px; margin: auto;">
	<h2><span class="fontawesome-lock"></span>Please login now</h2>
	
	<div style="font-style: italic; color: red;">
		<?php echo validation_errors(); ?>
	</div>
	
	<?php echo form_open('/quanlytruc/login'); ?>
	
	<label for="username">Username:</label>
	<input type="text" size="30" id="username" name="username"/>
	<br/>
	<label for="password">Password:</label>
	<input type="password" size="30" id="password" name="password"/>
	<br/>
	<input type="submit" value="Login" name="submit"/>
</div>

</body>
</html>
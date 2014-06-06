<html>
<head>
	<title>Quan ly truc - Bao cao tong hop</title>
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
	<link rel="stylesheet" type="text/css" href="/QuanLyTruc/css/qlt_tonghop.css"/>
	<script type="text/javascript">
		$(function() {
		  $('.datepicker').datepicker({
		  	format: "mm/dd/yyyy 00:00:00",
		  	todayBtn: "linked",
			todayHighlight: true
		  });
		});
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
		$users = $data['users'];
		//var_dump($samp[0]['SERVICE_NAME']);
		echo $data['username']; 
		?></li>
		<li><a href="/quanlytruc/index.php/quanlytruc/logout">Logout</a></li>
		<li class="endli"><a href="/quanlytruc/index.php/quanlytruc/register">Register</a></li>
	</ul>
</div>

<div id="form" style="align: center; width: 1000px; margin: auto;">
	<h2><span class="fontawesome-lock"></span>Báo cáo tổng hợp</h2>
	<?php 
		//var_dump($data); 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	?>
	
	<div style="font-style: italic; color: red;">
		<?php echo validation_errors(); ?>
	</div>
	
	<?php echo form_open('/quanlytruc/tonghop'); ?>
	
	<label for="from_date">From date:</label>
	<input type="text" size="30" id="from_date" name="from_date" class="datepicker" 
	value="<?php if(isset($data['from_date']))
					{echo $data['from_date'];} else
					{echo date("m/d/Y 00:00:00", time() - 30*60*60*24);} ?>"/>
	<br/>
	<!-- -->
	<label for="to_date">To date:</label>
	<input type="text" size="30" id="to_date" name="to_date" class="datepicker" 
	value="<?php if(isset($data['to_date']))
					{echo $data['to_date'];} else
					{echo date("m/d/Y 23:59:59", time());}?>"/>
	<br/>
	<!-- -->
	<label for="service_name">Tên dịch vụ:</label>
	<select id="service_name" name="service_name">
		<option value="ALL_SERVICES" <?php if($data['service_name'] == "ALL_SERVICES") echo "selected"; ?> >Tất cả dịch vụ</option>
		<?php 
			for($i =0; $i< count($samp); $i++)
			{
				//echo '<option value="' . $samp[$i]['SERVICE_NAME'] . '">' . $samp['SERVICE_NAME'] . '</option>';
				if($data['service_name'] == $samp[$i]['SERVICE_NAME']) {
					$ischeck = "selected";
				} else {
					$ischeck = "";
				}
				
				echo '<option value="' . $samp[$i]['SERVICE_NAME'] .'"' . $ischeck . '>' . $samp[$i]['SERVICE_NAME'] . '</option>';
			}
			
		?>
	</select>
	<br/>
	<!-- -->
	<label for="user_name">Tên nhân viên:</label>
	<select id="user_name" name="user_name">
		<option value="ALL_USERS" <?php if($data['selected_user'] == "ALL_USERS") echo "selected"; ?> >Tất cả nhân viên</option>
		<?php 
			for($i =0; $i< count($users); $i++)
			{
				//echo '<option value="' . $samp[$i]['SERVICE_NAME'] . '">' . $samp['SERVICE_NAME'] . '</option>';
				if($data['selected_user'] == $users[$i]['USERNAME']) {
					$ischeck = "selected";
				} else {
					$ischeck = "";
				}
				echo '<option value="' . $users[$i]['USERNAME'] .'"' . $ischeck .'>' . $users[$i]['USERNAME'] . '</option>';
			}
			
		?>
	</select>
	<br/>
	<!-- -->
	<input type="submit" value="Search" name="submit"/><br/>
	<!-- -->
	<?php 
		echo $data['submit_result'];
		echo "<br>Tổng thời gian trực: " . $data['total_hours'][0]['TOTAL_HOURS'] . " giờ.";
	?>
	
</div>

<div id="Q_R" style="align: center; width: 1000px; margin: auto; border-top:1px solid red; min-height: 50px; padding: 10px 0px;">
	<table border="1" width="100%" style="background-color:#fff;">
			<tr style="background-color:#f95252; color: #fff; height:50px;">
			<th>ID</th>
			<th>SERVICE_NAME</th>
			<th>ERROR_CODE</th>
			<th>ERROR_DESC</th>
			<th>SOLUTION_DESC</th>
			<th>ERROR_TIME</th>
			<th>SOLUTION_TIME</th>
			<th>USERNAME</th>
			<th>STATUS</th>
			<th>CONFIRM?</th>
			</tr>
			
			<?php 
				//print_r($sqldata);
				$detail = $data['detail'];
				if($detail != "")
				{
					while ($item = current($detail)) {
						echo "<tr><td>" . $item['ID'] . "</td>" . 
						"<td>" . $item['SERVICE_NAME'] . "</td>" . 
						"<td>" . htmlspecialchars_decode($item['ERROR_CODE'], ENT_QUOTES) . "</td>" . 
						"<td>" . htmlspecialchars_decode($item['ERROR_DESC'], ENT_QUOTES) . "</td>" . 
						"<td>" . htmlspecialchars_decode($item['SOLUTION_DESC'], ENT_QUOTES) . "</td>" . 
						"<td>" . htmlspecialchars_decode($item['ERROR_TIME'], ENT_QUOTES) . "</td>" . 
						"<td>" . $item['SOLUTION_TIME'] . "</td>" . 
						"<td>" . $item['USERNAME'] . "</td>" . 
						"<td>" . $item['STATUS'] . "</td>" . 
						"<td>" . "<a href=\"/quanlytruc/index.php/quanlytruc/confirm/" . $item['ID'] 
						. "/ACCEPTED\">ACCEPT</a> </br></br> <a href=\"/quanlytruc/index.php/quanlytruc/confirm/" . $item['ID'] . "/REJECTED\">REJECT</a>" . "</td></tr>";
						next($detail);
						
						
					}
				}
				
				
						
			?>
			
			<!-- -->
	</table>

</div>


</body>
</html>
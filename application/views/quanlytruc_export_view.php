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
	<link rel="stylesheet" type="text/css" href="/QuanLyTruc/css/qlt_export.css"/>
	<script type="text/javascript">
    
    </script>


</head>
<body>

<div id="header" style="width: 1000px; align: center; margin: auto; padding-bottom: 15px; padding-top: 15px;">
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
		//$users = $data['users'];
		//var_dump($samp[0]['SERVICE_NAME']);
		echo $data['username']; 
		?></li>
		<li><a href="/quanlytruc/index.php/quanlytruc/logout">Logout</a></li>
		<li class="endli"><a href="/quanlytruc/index.php/quanlytruc/register">Register</a></li>
	</ul>
</div>

<div id="form" style="align: center; width: 1000px; margin: auto;">
	<h2><span class="fontawesome-lock"></span>Xuất báo cáo</h2>
	<?php 
		//var_dump($data); 
		date_default_timezone_set('Asia/Ho_Chi_Minh');
	?>
	
	<div style="font-style: italic; color: red;">
		<?php echo validation_errors(); ?>
	</div>
	
	<?php echo form_open('/quanlytruc/toexcel'); ?>
	
	<label for="from_date">From date:</label>
	<input type="text" size="30" id="from_date" name="from_date" 
		value="<?php if(isset($data['from_date']))
					{echo $data['from_date'];} else
					{echo date("m/d/Y 00:00:00", time() - 30*60*60*24);}?>"/>
	<br/>
	<!-- -->
	<label for="to_date">To date:</label>
	<input type="text" size="30" id="to_date" name="to_date" 
		value="<?php if(isset($data['to_date']))
					{echo $data['to_date'];} else
					{echo date("m/d/Y 23:59:59", time());}?>"/>
	<br/>
	<!-- -->
	<input type="submit" value="Search" name="submit"/>
	<input type="submit" value="Export to Excel" name="submit"/><br/>
	<!-- -->
	<?php 
		//echo $data['submit_result'];
	?>
	
</div>

<div id="Q_R" style="align: center; width: 1000px; margin: auto; border-top:1px solid red; min-height: 50px; padding: 10px 0px;">
	<table border="0" width="100%" style="background-color:#fff;">
			<tr style="background-color:#f95252; color: #fff; height:50px;">
				<th>Dịch vụ</th>
				<th>Tên nhân viên</th>
				<th>Tổng thời gian xử lý (giờ)</th>
				<th>Ghi chú</th>
			</tr>
			
			<?php 
				//print_r($sqldata);
				$detail = $data['detail'];
				if($detail != "")
				{
					while ($item = current($detail)) {
						echo "<tr><td>" . $item['SERVICE_NAME'] . "</td><td>" . $item['USERNAME'] . "</td>" . 
						"<td>" . htmlspecialchars_decode($item['TOTAL_TIME'], ENT_QUOTES) . "</td><td>";
						next($detail);
					}
				}
				
			?>
			
			<!-- -->
	</table>

</div>





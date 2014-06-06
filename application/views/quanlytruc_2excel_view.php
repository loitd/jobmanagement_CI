<?php 
	//header("Content-type: application/octet-stream");
	header('Content-Type: application/vnd.ms-excel'); //mime type
	header("Content-Disposition: attachment; filename=BaoCaoQuanLyTruc.xls");
	header("Cache-Control: max-age=0");
	header("Pragma: no-cache");
	header("Expires: 0");
?>
		<table border='1' style="">
			<caption><h1>BÁO CÁO TRỰC DỊCH VỤ PHÒNG HỆ THỐNG</h1>
			</br><h4>Thời gian báo cáo từ: <?php echo $data['from_date']; ?> đến: <?php echo $data['to_date']; ?></h4>
			</caption>
			<tr>
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
		</table>
<?php include("process/header.php"); ?>
<div class="container" style="margin-top:20px">
	<div class="row">
		<div class="hidden-xs hidden-sm col-md-3">
			<?php include('process/page_left.php'); ?>
		</div>
		<div class="col-md-9">
			<?php hor_detail(); ?>
			<?php list_room(); ?>
			<div style="clear:both"></div>
			<?php album(); ?>
			<div class="fb-page hidden-md hidden-lg"
				data-href="https://www.facebook.com/kmitlhorpak"
				data-hide-cover="false"
				data-show-facepile="false"
				data-show-posts="false">
				<div class="fb-xfbml-parse-ignore">
					<blockquote cite="https://www.facebook.com/kmitlhorpak">
						<a href="https://www.facebook.com/kmitlhorpak">Kmitlhorpak</a>
					</blockquote>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
include("process/footer.php");

//===========================[Function zone]======================//
function hor_detail() {
	include('process/connect.php');
	$sql = "SELECT *
		FROM (horpak INNER JOIN horpak_type ON horpak.horpak_typeId = horpak_type.horpak_typeId)
		INNER JOIN zone
		ON horpak.zoneID = zone.zoneID
		WHERE horpakId = {$_GET['horpakId']};";
	$result = mysqli_query($cn,$sql);
	while($row = mysqli_fetch_array($result)) {
		$id = $row["horpakId"];
		$name = $row["horpakName"];
		$type = $row["horpak_typeName"];
		$zone = $row["zoneName"];
		$internet = $row["netDetail"];
		$detail = $row["detailMore"];
		$price = $row["deposit"];
		$water = $row["unitWater"];
		$elec = $row["unitElec"];
		$contract = $row["horpakTel"];
		echo " <h3>{$name}</h3><hr>";
		echo '<div class="row">';
			echo '<div class="col-md-4" style="padding-right:20px">';
					if($row['horpakImage']) {
						echo '<dd>'
						     . '<img src="data:image/jpeg;base64,' . base64_encode($row['horpakImage']) . '" style="width:100%">'
						     . '</dd>';
					} else {
						echo '<img src="img/logo.jpg" style="width:100%;">';
					}
			echo '</div>';
			echo "<div class='detail-horpak-page col-md-8'>
					<p>
						<b>ประเภท :</b> {$type}<br>
						<b>โซน :</b> {$zone}<br>
						<b>ค่าน้ำ :</b> {$water}<br>
						<b>ค่าไฟ :</b> {$elec}<br>
					</p>
					<p><b>รายละเอียด :</b><br>{$detail}</p>
					<p><b>รายละเอียด Internet :</b><br>{$internet}</p>
					<p><b>รายละเอียดค่ามัดจำ :</b><br>{$price}</p>
					<p><b>รายละเอียดการติดต่อ :</b><br> {$contract}</p>
				</div>";
		echo '</div><hr>';
	}
	mysqli_close($cn);
}

function list_room() {
	include('process/connect.php');
	echo '<h3>รายละเอียดห้องพัก</h3>';
	$sql = "SELECT *
		FROM roomdetail
		WHERE horpakId = {$_GET['horpakId']};";
	$result = mysqli_query($cn,$sql);
	echo '
		<table class="table table-bordered">
			<tr text-align="center">
				<th>ขนาดห้อง</th>
				<th>ประเภทห้อง</th>
				<th>Furniture</th> 
				<th>รายละเอียดเพิ่มเติม</th>
				<th>ค่าเช่า</th>

			</tr>';
	while($row = mysqli_fetch_array($result)) {
		$size = $row["sizeWH"];
		$type = $row["roomType"];
		$furn = $row["furniture"];
		$memo = $row["memorandum"];
		$rent = $row["rent"];
		echo "   
			<tr>
				<td>{$size}</td>
				<td>{$type}</td>
				<td>{$furn}</td> 
				<td>{$memo}</td>
				<td>{$rent}</td>
			</tr>";
	}
	echo '</table>
		<a class="btn btn-primary" href="add_room.php?horpakId='.$_GET['horpakId'].'" role="button" style="float:right">เพิ่มห้องพัก</a>
	';
	mysqli_close($cn);
}

function album() {
?>
	<hr>
	<div style="margin-bottom:20px">
		<h3>ภาพถ่าย</h3>
	</div>
	<div class="row">
		<div class="col-md-4">
			<div class="panel panel-default">
				<a class="hov" href="#" style="color:#424242">
					<div class="panel-body" style="height:220px;text-align:center;background-color:rgb(232, 232, 232);padding-top:85px">
						<!--<span class="glyphicon glyphicon-plus" aria-hidden="true" style="font-size:30px"></span><br>-->
						<span style="font-size:30px">เพิ่มรูปภาพ</span>
					</div>
				</a>
			</div>
		</div>
	</div>

<?php
}
?>



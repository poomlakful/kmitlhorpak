<?php include("process/header.php"); ?>
<div class="hidden-xs">
	<img src='img/hormap.png' usemap="#Map" style='width:100%;'>
</div>
<div class="container" style="margin-top:20px">
	<div class="row">
		<div class="hidden-xs hidden-sm col-md-3">
			<?php include('process/page_left.php'); ?>
		</div>
		<div class="col-md-9">
			<?php 
				echo '<h3 id="list">รายชื่อหอพัก</h3>';
				select_form(); 
			?>
			<div class="row">
				<?php list_horpak_process(); ?>
			</div>
		</div>
	</div>
</div>

<?php
include("process/footer.php");

//===========================[Function zone]======================//
function list_horpak_process() {
	if(isset($_POST["sent_select"])) {
		if(($_POST["select_zone"] == "all") && ($_POST["select_type"] == "all")) {
			list_horpak(
				"SELECT *
				FROM (horpak INNER JOIN horpak_type ON horpak.horpak_typeId = horpak_type.horpak_typeId)
				INNER JOIN zone
				ON horpak.zoneID = zone.zoneID
				ORDER BY horpakId DESC;"
			);
		} else { 
			if(!($_POST["select_zone"] == "all") && ($_POST["select_type"] == "all")) {
				list_horpak(
					"SELECT *
					FROM (horpak INNER JOIN horpak_type ON horpak.horpak_typeId = horpak_type.horpak_typeId)
					INNER JOIN zone
					ON horpak.zoneID = zone.zoneID
					WHERE zoneName = '{$_POST['select_zone']}'
					ORDER BY horpakId DESC;"
				);
			} else if(($_POST["select_zone"] == "all") && !($_POST["select_type"] == "all")) {
				list_horpak(
					"SELECT *
					FROM (horpak INNER JOIN horpak_type ON horpak.horpak_typeId = horpak_type.horpak_typeId)
					INNER JOIN zone
					ON horpak.zoneID = zone.zoneID
					WHERE horpak_typeName = '{$_POST['select_type']}'
					ORDER BY horpakId DESC;"
				);
			} else {
				list_horpak(
					"SELECT *
					FROM (horpak INNER JOIN horpak_type ON horpak.horpak_typeId = horpak_type.horpak_typeId)
					INNER JOIN zone
					ON horpak.zoneID = zone.zoneID
					WHERE zoneName = '{$_POST['select_zone']}' AND horpak_typeName = '{$_POST['select_type']}'
					ORDER BY horpakId DESC;"
				);
			}
		}
	} else {
		list_horpak(
			"SELECT *
			FROM (horpak INNER JOIN horpak_type ON horpak.horpak_typeId = horpak_type.horpak_typeId)
			INNER JOIN zone
			ON horpak.zoneID = zone.zoneID
			ORDER BY horpakId DESC;"
		);
	}
}

function select_form() {
	include('process/connect.php');
	$sql = "SELECT *
		FROM (horpak INNER JOIN horpak_type ON horpak.horpak_typeId = horpak_type.horpak_typeId)
		INNER JOIN zone
		ON horpak.zoneID = zone.zoneID
		ORDER BY horpakId;";
	$result = mysqli_query($cn,$sql);
?>
	<form class="form-inline" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
		<span class="top-space-moile">เลือกประเภทหอพัก : </span><select class="top-space-moile form-control" name="select_type">
			<option value="all">ทั้งหมด</option>
			<?php
			$sql = "SELECT *
				FROM horpak_type
				ORDER BY horpak_typeId;";
			$result = mysqli_query($cn,$sql);
			while($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['horpak_typeName']."' onchange='loadhorlist(this.value)''>{$row['horpak_typeName']}</option>";
			}
			?>&nbsp;&nbsp;
		</select>
		<span class="top-space-moile">เลือกโซน : </span><select class="top-space-moile form-control" name="select_zone">
			<option value="all">ทั้งหมด</option>
			<?php
			$sql = "SELECT *
				FROM zone
				ORDER BY zoneId;";
			$result = mysqli_query($cn,$sql);
			while($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['zoneName']."'>{$row['zoneName']}</option>";
			}
			?>&nbsp;&nbsp;
		</select>
		<div style="display:inline;text-align:center">
			<input class="btn-moile btn btn-primary" type="submit" name="sent_select">
		</div>
	</form><br>
<?php
	mysqli_close($cn);
}

function list_horpak($sql) {
	include('process/connect.php');
	$result = mysqli_query($cn,$sql);
	$i = 0;
	while($row = mysqli_fetch_array($result)) {
		$i++;
		$id = $row["horpakId"];
		$name = $row["horpakName"];
		$type = $row["horpak_typeName"];
		$zone = $row["zoneName"];
		$internet = $row["netDetail"];
		$detail = $row["detailMore"];
		$price = $row["deposit"];
		$contract = $row["horpakTel"];
		echo "<div class='col-sm-6 col-md-4'>
				<div class='thumbnail'>
					<a href='horpak_page.php?horpakId={$id}'>";
						if($row['horpakImage']) {
							echo '<dd>'
							     . '<img src="data:image/jpeg;base64,' . base64_encode($row['horpakImage']) . '" style="width:100%">'
							     . '</dd>';
						} else {
							echo '<img src="img/logo.jpg" style="width:100%">';
						}
		echo"		</a>
					<div class='caption'>
						<h3>{$name}</h3>
						<p>
							<span class='label label-default'>{$type}</span>
							<span class='label label-primary'>{$zone}</span>
						</p>
						<p><b>รายละเอียดหอพัก : </b><br>{$detail}</p>
						<p><b>รายละเอียด Internet : </b><br>{$internet}</p>
						<p><b>รายละเอียดราคา : </b><br>{$price}</p>
						<p><a href='horpak_page.php?horpakId={$id}' class='btn btn-primary' role='button'>รายละเอียดเพิ่มเติม</a> <a href='#' class='btn btn-default' role='button'>แก้ไข</a></p>
					</div>
				</div>
			</div>
		";
		if($i==3) {
			$i = 0;
			echo "<div style='clear: both;'></div>";
		}
	}
	mysqli_close($cn);
}
?>

<?php
include("process/header.php");
echo '<div class="container" style="margin-top:20px">';
if(isset($_POST['send'])) {
	if(antispam()) {
		process_add();
		add_form();
	} else {
		echo '<div class="alert alert-danger" role="alert">รหัสป้องกัน Spam ไม่ถูกต้อง </div>';
		add_form_value();
	}
} else {
	add_form();
}
echo '</div>';
include("process/footer.php");

function antispam() {
	@session_start(); // start session if not started yet
	if ($_SESSION['AntiSpamImage'] != $_REQUEST['antispamcode']) {
		return FALSE;
	} else {
		$_SESSION['AntiSpamImage'] = rand(1,9999999);
		return TRUE;
	}
}

function process_add() {
	include('process/connect.php');
	$name = addslashes($_POST["name"]);
	$zone = $_POST["zone"];
	$type = $_POST["type"];
	$waterUnit = addslashes($_POST["waterUnit"]);
	$elecUnit = addslashes($_POST["elecUnit"]);
	$detail = addslashes($_POST["detail"]);
	$internet = addslashes($_POST["internet"]);
	$price = addslashes($_POST["price"]);
	$contract = addslashes($_POST["contract"]);
	$image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
	$sql = "INSERT INTO horpak (horpakName,horpakTel,netDetail,unitWater,unitElec,deposit,detailMore,zoneId,horpak_typeId,horpakImage) 
		VALUES ('$name','$contract','$internet','$waterUnit','$elecUnit','$price','$detail','$zone','$type','$image')";
	$result = mysqli_query($cn,$sql);
	if($result) {
		echo '<div class="alert alert-success" role="alert" style="margin-top:20px">ส่งข้อมูลเรียบร้อยแล้ว</div>';
		echo 'ข้อมูลคือ :<br>
		<table style="width:100%" class="table table-bordered">
			<tr>
				<th>ชื่อหอ</th>
				<th>โซน</th>
				<th>ประเภทหอพัก</th> 
				<th>ค่าน้ำ</th>
				<th>ค่าไฟ</th>
				<th>รายละเอียดหอพัก</th>
				<th>รายละเอียด internet</th>
				<th>รายละเอียดค่ามัดจำ</th>
				<th>รายละเอียดการติดต่อ</th>
			</tr>
			<tr>
				<td>'.$_POST['name'].'</td>
				<td>'.$_POST['zone'].'</td>
				<td>'.$_POST['type'].'</td>
				<td>'.$_POST['waterUnit'].'</td>
				<td>'.$_POST['elecUnit'].'</td>
				<td>'.$_POST['detail'].'</td>
				<td>'.$_POST['internet'].'</td>
				<td>'.$_POST['price'].'</td>
				<td>'.$_POST['contract'].'</td>
			</tr>
		</table>';
	} else {
		echo '<div class="alert alert-danger" role="alert">ส่งข้อมูลไม่สำเร็จ</div>';
		add_form_value();
	}
}

function add_form() {
	include('process/connect.php');
?>
	<h3>เพิ่มหอพัก</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
		ชื่อหอ : <input type="text" name="name"><br>
		ภาพหอพัก : <input type="file" name="image" style="display:inline"><br>
		โซนหอพัก : <select name="zone">
			<?php
			$sql = "SELECT *
				FROM zone
				ORDER BY zoneId;";
			$result = mysqli_query($cn,$sql);
			while($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['zoneId']."'>{$row['zoneName']}</option>";
			}
			?></select><br>
		ประเภทหอพัก : <select name="type">
			<?php
			$sql = "SELECT *
				FROM horpak_type
				ORDER BY horpak_typeId;";
			$result = mysqli_query($cn,$sql);
			while($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['horpak_typeId']."' onchange='loadhorlist(this.value)''>{$row['horpak_typeName']}</option>";
			}
			?></select><br>
		ค่าน้ำ : <input type="text" name="waterUnit"><br>
		ค่าไฟ : <input type="text" name="elecUnit"><br>
		รายละเอียดหอพัก* : <br>
			<textarea cols="50" row="5" name="detail"></textarea><br>
		รายละเอียด internet* : <br>
			<textarea cols="50" row="5" name="internet"></textarea><br>
		รายละเอียดค่ามัดจำ* : <br>
			<textarea cols="50" row="5" name="price"></textarea><br>
		รายละเอียดการติดต่อ* : <br>
			<textarea cols="50" row="5" name="contract"></textarea><br><br>
		<font color="gray">* พิมพ์ &lt;br&gt; ในการเว้นบรรทัด</font><br><br>
		ใสรหัสป้องกัน Spam <input name="antispamcode" type="text" size="6" maxlength="10" /> <img src="process/antispam.php" /><br>
		<button type="submit" name="send" class="btn btn-primary">ส่งข้อมูล</button>
	</form>
<?php
}

function add_form_value() {
	include('process/connect.php');
?>
	<h3>เพิ่มหอพัก</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
		ชื่อหอ : <input type="text" name="name" value="<?php echo $_POST['name']; ?>"><br>
		ภาพหอพัก : <input type="file" name="image" style="display:inline"><br>
		โซนหอพัก : <select name="zone">
			<?php
			$sql = "SELECT *
				FROM zone
				ORDER BY zoneId;";
			$result = mysqli_query($cn,$sql);
			while($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['zoneId']."'>{$row['zoneName']}</option>";
			}
			?></select><br>
		ประเภทหอพัก : <select name="type">
			<?php
			$sql = "SELECT *
				FROM horpak_type
				ORDER BY horpak_typeId;";
			$result = mysqli_query($cn,$sql);
			while($row = mysqli_fetch_array($result)) {
				echo "<option value='".$row['horpak_typeId']."' onchange='loadhorlist(this.value)''>{$row['horpak_typeName']}</option>";
			}
			?></select><br>
		ค่าน้ำ : <input type="text" name="waterUnit" value="<?php echo $_POST['waterUnit']; ?>"><br>
		ค่าไฟ : <input type="text" name="elecUnit" value="<?php echo $_POST['elecUnit']; ?>"><br>
		รายละเอียดหอพัก* : <br>
		<textarea cols="50" row="5" name="detail"><?php echo $_POST['detail']; ?></textarea><br>
		รายละเอียด internet* : <br>
		<textarea cols="50" row="5" name="internet" ><?php echo $_POST['internet']; ?></textarea><br>
		รายละเอียดค่ามัดจำ* : <br>
		<textarea cols="50" row="5" name="price" ><?php echo $_POST['price']; ?></textarea><br>
		รายละเอียดการติดต่อ *: <br>
		<textarea cols="50" row="5" name="contract"><?php echo $_POST['contract']; ?></textarea><br>
		<font color="gray">* พิมพ์ &lt;br&gt; ในการเว้นบรรทัด</font><br><br>
		ใสรหัสป้องกัน Spam <input name="antispamcode" type="text" size="6" maxlength="10" /> <img src="process/antispam.php" /><br>
		<button type="submit" name="send" class="btn btn-primary">ส่งข้อมูล</button>
	</form>
<?php
}
?>

<?php
include("process/header.php");
echo '<div class="container">';
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
	$size = addslashes($_POST["size"]);
	$type = addslashes($_POST["room_type"]);
	$furniture = addslashes($_POST["furniture"]);
	$room_detail = addslashes($_POST["room_detail"]);
	$room_price = addslashes($_POST["room_price"]);
	$horpakId = $_GET['horpakId'];
	$sql = "INSERT INTO roomdetail (sizeWH,roomType,furniture,memorandum,rent,horpakId) VALUES ('$size','$type','$furniture','$room_detail','$room_price','$horpakId')";
	$result = mysqli_query($cn,$sql);
	if($result) {
		echo '<div class="alert alert-success" role="alert" style="margin-top:20px">ส่งข้อมูลเรียบร้อยแล้ว <a href="horpak_page.php?horpakId='.$_GET["horpakId"].'">ไปที่หน้าหอพัก</a></div>';
		echo 'ข้อมูลคือ :<br>
		<table style="width:100%" class="table table-bordered">
			<tr>
				<th>ชื่อหอ</th>
				<th>โซน</th> 
				<th>รายละเอียดหอพัก</th>
				<th>รายละเอียด internet</th>
				<th>รายละเอียดราคา</th>
			</tr>
			<tr>
				<td>'.$_POST['size'].'</td>
				<td>'.$_POST['room_type'].'</td> 
				<td>'.$_POST['furniture'].'</td>
				<td>'.$_POST['room_detail'].'</td>
				<td>'.$_POST['room_price'].'</td>
			</tr>
		</table>';
	} else {
		echo '<div class="alert alert-danger" role="alert">ส่งข้อมูลไม่สำเร็จ</div>';
		add_form_value();
	}
}

function add_form() {
?>
	<h3>เพิ่มห้อง</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?horpakId=<?php echo $_GET['horpakId']; ?>" method="POST" enctype="multipart/form-data">
		ขนาดห้อง : <input type="text" name="size"><br>
		ประเภทห้อง : <input type="text" name="room_type"><br>
		ค่าเช่า : <input type="text" name="room_price"><br>
		Furniture : <br>
			<textarea cols="50" row="5" name="furniture" ></textarea><br>
		รายละเอียดเพิ่มเติม : <br>
			<textarea cols="50" row="5" name="room_detail" ></textarea><br>
		<font color="gray">* พิมพ์ &lt;br&gt; ในการเว้นบรรทัด</font><br><br>
		ใสรหัสป้องกัน Spam <input name="antispamcode" type="text" size="6" maxlength="10" /> <img src="process/antispam.php" /><br>
		<button type="submit" name="send" class="btn btn-primary">ส่งข้อมูล</button>
	</form>
<?php
}

function add_form_value() {
?>
	<h3>เพิ่มห้อง</h3>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>?horpakId=<?php echo $_GET['horpakId']; ?>" method="POST" enctype="multipart/form-data">
		ขนาดห้อง : <input type="text" name="size" value="<?php echo $_POST['size']; ?>"><br>
		ประเภทห้อง : <input type="text" name="room_type" value="<?php echo $_POST['room_type']; ?>"><br>
		ค่าเช่า : <input type="text" name="room_price" value="<?php echo $_POST['room_price']; ?>"><br>
		Furniture : 
			<textarea cols="50" row="5" name="furniture" ><?php echo $_POST['furniture']; ?></textarea><br>
		รายละเอียดเพิ่มเติม : <br>
			<textarea cols="50" row="5" name="room_detail" ><?php echo $_POST['room_detail']; ?></textarea><br>
		<font color="gray">* พิมพ์ &lt;br&gt; ในการเว้นบรรทัด</font><br><br>
		ใสรหัสป้องกัน Spam <input name="antispamcode" type="text" size="6" maxlength="10" /> <img src="process/antispam.php" /><br>
		<button type="submit" name="send" class="btn btn-primary">ส่งข้อมูล</button>
	</form>
<?php
}
?>

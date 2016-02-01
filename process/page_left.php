<?php 
facebook_block();
ad_block();	

function ad_block() {
	echo '
		<div class="panel panel-default">
			<div class="panel-heading">Advertisment</div>
			<div class="panel-body">
				<br><br><br><br><br><br><br><br>
			</div>
		</div>
	';
}

function facebook_block() {
	echo '
		<div class="panel panel-default">
			<div class="panel-heading">Facebook</div>
			<div class="panel-body">
				<br><br><br><br><br><br><br><br>
			</div>
		</div>
	';
}
?>
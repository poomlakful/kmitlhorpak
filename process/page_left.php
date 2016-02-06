<?php 
facebook_block();
ad_block();	

function facebook_block() {

?>
		<div class="panel panel-default">
			<div class="panel-heading">Facebook</div>
			<div class="panel-body" style="padding:0">
				<div class="fb-page" 
					data-href="https://www.facebook.com/kmitlhorpak" 
					data-tabs="timeline" 
					data-small-header="false" 
					data-adapt-container-width="true" 
					data-hide-cover="false" 
					data-show-facepile="true">
					<div class="fb-xfbml-parse-ignore">
						<blockquote cite="https://www.facebook.com/kmitlhorpak">
							<a href="https://www.facebook.com/kmitlhorpak">Kmitlhorpak</a>
						</blockquote>
					</div>
				</div>
			</div>
		</div>
<?php
}

function ad_block() {
?>
		<div class="panel panel-default">
			<div class="panel-heading">Advertisment</div>
			<div class="panel-body">
				<br><br><br><br><br><br><br><br>
			</div>
		</div>
<?php
}
?>
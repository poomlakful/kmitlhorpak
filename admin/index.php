<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Admin Login Page</title>
    <meta name="description" content="Flat UI Kit Free is a Twitter Bootstrap Framework design and Theme, this responsive framework includes a PSD and HTML version."/>

    <meta name="viewport" content="width=1000, initial-scale=1.0, maximum-scale=1.0">

    <!-- Loading Bootstrap -->
    <link href="dist/css/vendor/bootstrap.min.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="dist/css/flat-ui.css" rel="stylesheet">
    <link href="docs/assets/css/demo.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
    <!--[if lt IE 9]>
      <script src="dist/js/vendor/html5shiv.js"></script>
      <script src="dist/js/vendor/respond.min.js"></script>
    <![endif]-->
	<style>
	.h{
		width:500px;
		position:fixed;
		left:50%;
		top:50%;
		margin:-210px 0 0 -250px;
	}
	.outer{
	  display: table;
	  height: 100%;width: 100%;
	  position: fixed; /* หรือจะใช้ absolute ถ้าต้องการให้มันไม่เลื่อนตามหน้าจอ*/
	  overflow: hidden;
	  z-index: 100; /* ถ้ายังไม่อยู่บนสุดก็เพิ่มค่านี้ */
	  margin:0 auto;
	}
	</style>
  </head>
  
  <body style="background:#1abc9c">
    
	<div class="h"><div class="login-form">
            <div class="form-group">
              <input type="text" class="form-control login-field" value="" placeholder="Enter your name" id="login-name" />
              <label class="login-field-icon fui-user" for="login-name"></label>
            </div>

            <div class="form-group">
              <input type="password" class="form-control login-field" value="" placeholder="Password" id="login-pass" />
              <label class="login-field-icon fui-lock" for="login-pass"></label>
            </div>

            <a class="btn btn-primary btn-lg btn-block" href="#">Log in</a>
            <a class="login-link" href="#">Lost your password?</a>
          </div></div>

    <script src="dist/js/vendor/jquery.min.js"></script>
    <script src="dist/js/vendor/video.js"></script>
    <script src="dist/js/flat-ui.min.js"></script>
    <script src="docs/assets/js/application.js"></script>

    <script>
      videojs.options.flash.swf = "dist/js/vendors/video-js.swf"
    </script>
  </body>
</html>
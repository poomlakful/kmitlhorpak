<!DOCTYPE html>
<html lang="th">
<head>
	<meta http-equiv=Content-Type content="text/html; charset=utf-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>KMITLHORPAK - หอพักลาดกระบัง</title>
    <link href="img/favicon.ico" rel="shortcut icon"/> 
    <link href="css/main.css" rel="stylesheet">
    <link href="css/main.css" rel="reset">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<!---<div><br><br><br><br><br><br><br><br><br></div>-->
<nav class="navbar navbar-default" id="top" style="margin-bottom:0;">
  <div class="container" style="margin-botton:0px;">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="img/logo2.png" height="30"></a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="add_hor.php">เพิ่มหอพัก </a></li>
        <li><a href="index.php#list">รายชื่อหอพัก</a></li>
        <li><a href="index.php#list">ซื้อขายสัญญาหอพัก</a></li>
		<li><a href="http://poomdev.zz.mu" target="_blank">เกี่ยวกับ</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="" target="_blank" data-toggle="modal" data-target="#loginModal"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> login</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<!-- Modal -->
<div id="loginModal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-body">
        <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Username">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
              </div>
              <div class="input-group" style="margin-top:10px">
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Password">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
              </div>
              <button href="#" type="button" class="btn btn-primary" style="display:block;width:100%;margin-top:10px">Log in</button>
              <div style="text-align:center">
                <a class="login-link" href="#">Lost your password?</a>
              </div>
            </div>
            <div class="col-md-6">
              <div class="input-group">
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Username">
                <div class="input-group-addon"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div>
              </div>
              <div class="input-group" style="margin-top:10px">
                <input type="text" class="form-control" id="exampleInputAmount" placeholder="Password">
                <div class="input-group-addon"><span class="glyphicon glyphicon-lock" aria-hidden="true"></span></div>
              </div>
              <button href="#" type="button" class="btn btn-primary" style="display:block;width:100%;margin-top:10px">Log in</button>
              <div style="text-align:center">
                <a class="login-link" href="#">Lost your password?</a>
              </div>
            </div>
          </div>
        </div>        
      </div>
    </div>
  </div>
</div>

    
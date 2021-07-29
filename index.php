<?php
	require_once('include/connection.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Stock Exchange | Log in</title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/ionicons.min.css">
<link rel="stylesheet" href="dist/css/fontstyles.css">
<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
<link rel="stylesheet" href="plugins/select2/select2.min.css">
<link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<style>
.login-page { background: -webkit-linear-gradient(top,  rgba(179,220,237,1) 0%, rgba(41,184,229,1) 50%, rgba(188,224,238,1) 81%, rgba(188,224,238,1) 100%); background-size:cover;}
.login-box-body { background: #FFFFFF;border-radius: 50px 50px 0px 0px;padding: 20px;}
.login__submit,.reg__submit { background-color:#3c8dbc !important;color:#fff !important;margin-top:5%;}
.login__submit:hover,.reg__submit:hover { background-color:#3c8dbc !important;color:#fff !important;}
.form-control:focus { border:1px solid #38818e !important;}
.unamecmpl { margin-top:50px;}
.usernm,.paswd,.instit {font-size:15px;font-family: Times New Roman;}
.txt {font-size:20px;font-family: Times New Roman;}
.logo {padding:20px;}
.login-box {padding:20px; background:#1222;}
@media only screen and (min-width: 500px)
{
	.ig { float:right; }
}
.help-block { display:none;}
</style>
</head>
<body class="hold-transition login-page" onload="myFunction()">
	<div class="login-box">
		<div class="login-box-body">
			<div class="logo text-center">
			<img src="images/stocks.jpeg">
			</div>
		<br>
			<h2 class="txt" align="center">Stock Exchange Login</h2>
			<form action="index.php" method="post" class="sform">
				<div class="form-group has-feedback unamecmpl">
					<label class="usernm">Username</label>
					<input type="text" class="form-control username" id="username" name="uName">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback pwdcmpl">
					<label class="paswd">Password</label>
					<input type="password" class="form-control pwd" id="password" name="pwrd">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<span class="help-block pwdalrt">Please enter correct password</span>
				</div>
						<div class="row">
							<div class="col-xs-12">
								<button type="button" class="btn btn-block btn-flat login__submit" id="signin" name="sign_bttn">Submit</button>
							</div>
						</div>
				<input type="hidden" name="pid" id="pid" value="">
				<input type="hidden" name="pname" id="pname" value="">
			</form>
		</div>
		<div class="row loading">
			<h1 class="text-center"><i class="fa fa-refresh fa-spin"></i></h1>
		</div>
	</div>
</body>

<div class="modal fade" id="modal-warningmodal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header heading" style="background-color:#D2C650;">
				<a href="#" class="fa fa-times pull-right closewarng" style="color:#040504;" data-dismiss="modal"></a>
				<h4 class="modal-title">&nbsp; Warning</h4>
			</div>
			<div class="modal-body">
				<div class="text-center" style="margin-bottom:20px;">
					<span id="msg"></span>
					<input type="hidden" name="focus" class="focus" value="">
				</div>
			</div>
			<div class="modal-footer clearfix" style="margin-top:-22px;">
			</div>
		</div>
	</div>
</div>
</html>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
$(function ()
{
	$(".select2").select2();
});

$(".login__submit").click(function()
{
	if($(".username").val()=='') { $(".unamecmpl").addClass('has-error');return false;}
	else { $(".unamecmpl").removeClass('has-error');}
	if($(".pwd").val()=='') { $(".pwdcmpl").addClass('has-error');return false;}
	else { $(".pwdcmpl").removeClass('has-error');}
	$.post('ajax_stocklogin.php',{username:$('.username').val(),password:$('.pwd').val()},function(data)
	{
		if(data=='1')
		{
			window.location='stockhome.php';
		}
		else
		{
			$(".pwdalrt").hide();$(".pwdcmpl").removeClass('has-error');
			$("#modal-warningmodal").modal('show');
			$("#msg").text("No matching records found");
		}
	});
});

function myFunction()
{
  $(".loading").hide();
}
</script>

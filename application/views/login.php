<script>
var login_frmdata;
$(document).ready(function(){
	$("#login_frm").submit(function(event){
		$('.alert').html("");
		
		login_frmdata	=	$("#login_frm").serialize();
		$.ajax({
		       url  : '<?php echo base_url(); ?>index.php/usr/verify',
		       type : 'POST',
		       data : login_frmdata,
		       success : function(msg) {
		           if(msg == 'fail'){
			           $('.alert').html("Oops ! Enter Valid Credentials !");
			       }else{
			    	   window.location = "<?php echo base_url(); ?>index.php/showhome/";
			    	   location.reload();
					}
		       }
		});
		event.preventDefault();
	});
});
</script>
</head>
<body>
	<form name='login_frm' id='login_frm' method='POST'>
		<div class="login-form">
			<div class="form-group">
				<input type="text" class="form-control" name='usrnme' placeholder="Email" required>
			</div>
			<div class="form-group">
				<input type="password" class="form-control" name='pwd' placeholder="Password" required>
			</div>
			<a class="link" target="_blank" href="http://www.php.net/">Create new Account !</a>
			<br>
			<button type="submit" id='frm_submit' class="btn btn-primary">
				Sign In
			</button>
			<div class="alert"></div>
		</div>
	</form>
</body>
</html>
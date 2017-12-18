<?php
echo 'currency converter page';
?>
</head>
<body>
	<h3>Welcome ! <?php echo $this->session->userdata('email'); ?></h3>
	<a href="<?php echo base_url(); ?>index.php/logout">Log Out</a>
</body>
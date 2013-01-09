<html>
<head>
	<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen"> 
</head>
	<body bgcolor="#E6E6FA">


	<div class="content">
		<h1>WELCOME</h1>
		<table border="4">
		<tr><td><div class="paging"><?php if(isset($pagination)){echo $pagination;} ?></div></td></tr>
		<tr>
			<div class="data"><td><?php if(isset($table)){echo $table;} ?></div><td></tr>
	</table border="4">
		<br />
		<?php if(isset($table)){ echo anchor('hr/add/','add new data',array('class'=>'add'));} ?>
	</div>

	

</body>
</html>
<html>
<head>
	
</head> 


<body>
	
	

	<div class="content">
		<h1><?php echo $title; ?></h1>
		<?php echo $message; ?>
		<form method="post" action="<?php echo $action; ?>">
		<div class="data">
		<table border="4">
			<tr>
				<td width="30%">ID</td>
				<td><input type="text" name="id" disabled="disable" class="text" value="<?php echo $this->validation->id; ?>"/></td>
				<input type="hidden" name="id" value="<?php echo $this->validation->id; ?>"/>
			</tr>
			<tr>
				<td valign="top">First Name<span style="color:red;">*</span></td>
				<td><input type="text" name="first_name" class="text" value="<?php echo $this->validation->first_name; ?>"/>
				<?php echo $this->validation->first_name_error; ?></td>
			</tr>
			<tr>
				<td valign="top">Last Name <span style="color:red;">*</span></td>
				<td><input type="text" name="last_name" class="text" value="<?php echo $this->validation->last_name; ?>"/>
				<?php echo $this->validation->last_name_error; ?></td>
			</tr>
			<tr>
				<td valign="top">Gender<span style="color:red;">*</span></td>
				<td><input type="radio" name="gender" value="M" <?php echo $this->validation->set_radio('gender', 'M'); ?>/> M
					<input type="radio" name="gender" value="F" <?php echo $this->validation->set_radio('gender', 'F'); ?>/> F
					<?php echo $this->validation->gender_error; ?></td>
			</tr>
			<tr>
				<td valign="top">Date of birth (dd-mm-yyyy)<span style="color:red;">*</span></td>
				<td><input type="text" name="birth_date"  class="text" value="<?php echo $this->validation->birth_date; ?>"/>
				<?php echo $this->validation->birth_date_error; ?></td>
			</tr>
			<tr>
				<td valign="top">Hire date (dd-mm-yyyy)<span style="color:red;">*</span></td>
				<td><input type="text" name="hire_date"  class="text" value="<?php echo $this->validation->hire_date; ?>"/>
				<?php echo $this->validation->hire_date_error; ?></td>
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td><input type="submit" value="Save"/></td>
			</tr>
		</table>
		</div>
		</form>
		<br />
		<?php echo $link_back; ?>
	</div>
</body>
</html>
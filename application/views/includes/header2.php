<!DOCTYPE html>

<html lang="en">

<head>

	<meta http-equiv= "Content-Type" content="text/html; charset-utf-8">
<title></title>
<body bgcolor="#E6E6FA">
<style>
		* {
			font-family: Arial;
			font-size: 12px;
		}
		table {
			border-collapse: collapse;
		}
		td, th {
			border: 1px solid #666666;
			padding:  4px;
		}
		div {
			margin: 4px;
		}

		label {
			display: inline-block;
			width: 120px;
		}
		.search tr:nth-child(odd) {
			background:#C4B0B7;
		}
	</style>
</head>

<body>
<center>
<form method="get" action="<?php echo base_url() . 'index.php/auth/logout'; ?>">
<input type="Submit" value="Logout" />
</form>
	<table >
		<tr>
						<td><FORM METHOD="LINK" ACTION="<?php echo base_url() . 'index.php/hr'; ?>"><INPUT TYPE="submit" VALUE="Home"></td></FORM></FORM></td> 
			<td><FORM METHOD="LINK" ACTION="<?php echo base_url() . 'index.php/search/searchFull'; ?>"><INPUT TYPE="submit" VALUE="Search"></td></FORM></FORM></td> 
			<td><FORM METHOD="LINK" ACTION="<?php echo base_url() . 'index.php/hr/add'; ?>"><INPUT TYPE="submit" VALUE="Add"></td></FORM></FORM></td> 
			<td><form method="get" action="<?php echo base_url() . 'index.php/hr/update_noempno'; ?>"><input type="submit" value="Edit"/></form></td> </form></td>
			<td><form method="get" action="<?php echo base_url() . 'index.php/hr/delete_noempno'; ?>"><input type="submit" value="Remove"/></form></td> </form></td>

		</tr>


	</table>

	<hr/>

<html>
<head>
<title>User Details</title>
</head>
<body bgcolor="#E6E6FA">
<h2>User details</h2>
<table>
<tbody>
<?php foreach ($user as $one_user => $value): ?>
<tr>
<td><?php echo $value->first_name?></td>
<td><?php echo $value->last_name ?></td>
<td><?php echo $value->dept_name ?></td>
<td><?php echo $value->title ?></td>


</tr>
<?php endforeach; ?>
</tbody>
</table>

 
</body>
</html>          
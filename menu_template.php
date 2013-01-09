<?php
$this->load->helper('url');
$index = "myButtons";
$userlogin = "myButtons";
$register = "myButtons";
$remove = "myButtons";
$accounts = "myButtons";

$menuLinkid = basename($_SERVER['PHP_SELF'], ".php");
if ($menuLinkid == "index"){
		$index = 'myActiveButton';
} else if ($menuLinkid == "userlogin"){
	$index = 'myActiveButton';
} else if ($menuLinkid == "register"){
	$index = 'myActiveButton';
} else if ($menuLinkid == "remove"){
	$index = 'myActiveButton';
} else if ($menuLinkid == "accounts"){
	$index = 'myActiveButton';
}
?>

<a class="<?php echo $index; ?>" href="<?php echo site_url('auth/userlogin') ?>">User</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('hr/addhr') ?>">Add</a>
<a class="<?php echo $index; ?>" href="<?php echo site_url('hr/movedept') ?>">Remove_Employee</a>
<a class="<?php echo $index; ?>" href="">Accounts</a>
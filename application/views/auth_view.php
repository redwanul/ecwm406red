<html>
<head>
<body bgcolor="#E6E6FA">
<title>Login</title>
<form action="/ci/index.php/auth/createaccount" method="POST">

   <b> Name:
        <br/><input type="text" name='name' length="20" size="50">  <br>
    Create username:
       <br/> <input type="text" name='uname' length="10" size="10">  <br>
    Create password:
       <br/> <input type="password" name='pword' length="15" size="30"> <br>
    Confirm password:
        <br/><input type="password" name='conf_pword' length="15" size="30">
        <br/>
    <input type="submit" value='Register!'></b>
</form>
<span style="color: red"><?php echo $errmsg ?></span> <br>
</head>
</html>
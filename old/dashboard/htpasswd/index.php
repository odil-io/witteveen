<?php

if (!empty($_POST['username']) && !empty($_POST['password'])) {

	$username = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
	$password = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
  $password = crypt($password, base64_encode($password));

  $title = filter_var(trim($_POST['title']), FILTER_SANITIZE_STRING);

  $account = $username . ':' . $password;

  ?>

  <pre>

    <?
	echo '
HTACCESS
AuthName "Protected Access"
AuthType Basic
AuthUserFile .htpasswd"
Require valid-user

HTPASSWD
'.$account;
?>
</pre>

<a href="https://odil.io/tools/htpasswd/">Create another account</a>
<?

} else {

?>
<html>
	<head>
		<title>.htaccess Generator</title>
	</head>
	<body>
		<form method="post">
			<input type="text" name="username" placeholder="Username" />
			<input type="password" name="password" placeholder="Password" />
			<input type="submit" value="Generate" />
		</form>
    <div class="output">

    </div>
	</body>
</html>
<?php
}
?>

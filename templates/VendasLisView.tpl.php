<?php
	$this->assign('title','SISSTC | Clientes');
	$this->assign('nav','clientes');

	$this->display('_Header.tpl.php');
?>

<script type="text/javascript">
	$LAB.script("scripts/app/clientes.js").wait(function(){
		$(document).ready(function(){
			page.init();
		});
		
		// hack f\or IE9 which may respond inconsistently with document.ready
		setTimeout(function(){
			if (!page.isInitialized) page.init();
		},1000);
	});
</script>
$this->display('_Header.tpl.php');
<form method="post" action="http://www.stchost.com.br/whmcs/dologin.php">
Email Address: <input type="text" name="username" size="50" /><br />
Password: <input type="password" name="password" size="20" /><br />
<input type="submit" value="Login" />
</form>

<?php
	$this->display('_Footer.tpl.php');
?>

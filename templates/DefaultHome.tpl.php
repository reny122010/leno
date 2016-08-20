<?php
	$this->assign('title','SISSTC | Home');
	$this->assign('nav','home');

	$this->display('_Header.tpl.php');
?>

	<div class="modal hide fade" id="getStartedDialog">
		<div class="modal-header">
			<a class="close" data-dismiss="modal">&times;</a>
			<h3>LENO MOTOS</h3>
		</div>

	</div> <!-- /container -->

<?php
	$this->display('_Footer.tpl.php');
?>
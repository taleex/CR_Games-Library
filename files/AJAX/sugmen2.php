<?php
require '../cone.php';
$s=$_GET["q"];

	$sql="delete from sugestoes where Codigo_Sugestao = $s";
	$lig->query($sql);

?>
	<form action="index.php?cmd=addSug" method="POST" role="form" onsubmit="return validaSUG();">
	<div class="form-group row">
		<label class="col-lg-3 col-form-label form-control-label">Nome de Jogo</label>
		<div class="col-lg-9">
			<input class="form-control" type="text" id="sugN" name="sugN" value="" onblur="return existeSug(this);">
			<div class="msg-erro" id='txtSug'></div>
		</div>
	</div>

	<div class="form-group row">
		<label class="col-lg-3 col-form-label form-control-label">Nome de Produtor</label>
		<div class="col-lg-9">
			<input class="form-control" type="text" id="sugPr" name="sugPr" value="" onblur="return validPR(this);">
			<span class='msg-erro msg-pr'></span>
		</div>
	</div>
	
	<span class='msg-erro msg-sug'></span>
	<div class="form-group row">
		<label class="col-lg-3 col-form-label form-control-label"></label>
		<div class="col-lg-9">
			<input type="reset" class="btn btn-secondary" value="Cancel">
			<input type="submit" class="btn btn-danger" value="enviar">
		</div>
	</div>
	
	</form>

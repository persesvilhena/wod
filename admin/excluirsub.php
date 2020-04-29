<?php
include "cabeca.dll";
$idsub = $_GET['id'];
?>
<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Deseja realmente excluir a subpasta?";
if(isset($_POST["excluir"])) { 
	

			$delete = mysql_query("delete from subpasta where id = '$idsub';") or die(mysql_error());
			$delete = mysql_query("delete from links where subpasta = '$idsub';") or die(mysql_error());
			
			if($delete) {
				
				$mensagem_erro = "<b>subpasta excluida com sucesso!</b>";
			}
		
		
	}
	else {
	
		$mensagem_erro = "<b>Deseja realmente excluir a subpasta?</b>";
		
			
}
?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend>Excluir subpasta</legend>
<b><?php echo "$mensagem_erro"; ?></b><br>
<form method="post" action="<?php $PHP_SELF; ?>">
<input type="submit" name="excluir" value="Confirmar">
</form>

<?php
include "cabeca.dll";
$idpasta = $_GET['id'];
?>
<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Deseja realmente excluir a pasta?";
if(isset($_POST["excluir"])) { 
	

		
			$delete = mysql_query("delete from pasta where id = '$idpasta';") or die(mysql_error());
			$delete = mysql_query("delete from subpasta where pasta = '$idpasta';") or die(mysql_error());
			$delete = mysql_query("delete from links where pasta = '$idpasta';") or die(mysql_error());
			
			if($delete) {
				
				$mensagem_erro = "<b>Pasta excluida com sucesso!</b>";
			}
		
		
	}
	else {
	
		$mensagem_erro = "<b>Deseja realmente excluir a pasta?</b>";
		
			
}
?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend>Excluir Pasta</legend>
<b><?php echo "$mensagem_erro"; ?></b><br>
<form method="post" action="<?php $PHP_SELF; ?>">
<input type="submit" name="excluir" value="Confirmar">
</form>

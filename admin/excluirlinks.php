<?php
include "cabeca.dll";
$idlink = $_GET['id'];
?>
<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Deseja realmente excluir a link?";
if(isset($_POST["excluir"])) { 
	

			$delete = mysql_query("delete from links where id = '$idlink';") or die(mysql_error());
			
			if($delete) {
				
				$mensagem_erro = "<b>link excluido com sucesso!</b>";
			}
		
		
	}
	else {
	
		$mensagem_erro = "<b>Deseja realmente excluir a link?</b>";
		
			
}
?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend>Excluir link</legend>
<b><?php echo "$mensagem_erro"; ?></b><br>
<form method="post" action="<?php $PHP_SELF; ?>">
<input type="submit" name="excluir" value="Confirmar">
</form>

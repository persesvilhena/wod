<?php
include "cabeca.dll";
$idpasta = $_GET['id'];
?>
<?php
$sql = mysql_query("SELECT * FROM `pasta` where id='$idpasta';");
$exibesql = mysql_fetch_array($sql);
?>
<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Alterar Pasta";
if(isset($_POST["enviar"])) { 
	
	if(!empty($_POST["nome"]) && !empty($_POST["descricao"]) && !empty($_POST["categoria"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$descricao = $class->antisql($_POST["descricao"]); 
		$categoria = $class->antisql($_POST["categoria"]);
		
			$insert = mysql_query("update pasta set nome = '$nome', descricao = '$descricao', categoria = '$categoria' where id = '$idpasta';") or die(mysql_error());
			
			if($insert) {
				
				$mensagem_erro = "<b>Dados Alterados com sucesso!</b>";
			}
		
		
	}
	else {
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}		
}
?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend>Alterar Pasta</legend>
<b><?php echo "$mensagem_erro"; ?></b><br>
<form method="post" action="<?php $PHP_SELF; ?>">
<b>Nome:</b><input type="text" name="nome" value="<?php echo $exibesql["nome"]; ?>"><br>
<b>Descrição:</b><input type="text" name="descricao" value="<?php echo $exibesql["descricao"]; ?>"><br>
<b>Categoria:</b><input type="text" name="categoria" value="<?php echo $exibesql["categoria"]; ?>"><br>
<input type="submit" name="enviar" value="Salvar">
</form>

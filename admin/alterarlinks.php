<?php
include "cabeca.dll";
$idlink = $_GET['id'];
?>
<?php
$sql = mysql_query("SELECT * FROM `links` where id='$idlink';");
$exibesql = mysql_fetch_array($sql);
?>
<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Alterar link";
if(isset($_POST["enviar"])) { 
	
	if(!empty($_POST["nome"]) && !empty($_POST["link"]) && !empty($_POST["tamanho"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$link = $class->antisql($_POST["link"]); 
		$tamanho = $class->antisql($_POST["tamanho"]);
		$subpasta = $class->antisql($_POST["subpasta"]);
		
			$insert = mysql_query("update pasta set nome = '$nome', link = '$link', tamanho = '$tamanho', subpasta = '$subpasta' where id = '$idlink';") or die(mysql_error());
			
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
<legend>Alterar Link</legend>
<b><?php echo "$mensagem_erro"; ?></b><br>
<form method="post" action="<?php $PHP_SELF; ?>">
<b>Nome:</b><input type="text" name="nome" value="<?php echo $exibesql["nome"]; ?>"><br>
<b>Link:</b><input type="text" name="link" value="<?php echo $exibesql["link"]; ?>"><br>
<b>Tamanho:</b><input type="text" name="tamanho" value="<?php echo $exibesql["tamanho"]; ?>"><br>
<b>Subpasta pertencente (id):</b><input type="text" name="subpasta" value="<?php echo $exibesql["subpasta"]; ?>"><br>
<input type="submit" name="enviar" value="Salvar">
</form>

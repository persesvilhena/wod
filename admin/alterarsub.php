<?php
include "cabeca.dll";
$idsub = $_GET['id'];
?>
<?php
$sql = mysql_query("SELECT * FROM `subpasta` where id='$idsub';");
$exibesql = mysql_fetch_array($sql);
?>
<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Alterar SubPasta";
if(isset($_POST["enviar"])) { 
	
	if(!empty($_POST["nome"]) && !empty($_POST["descricao"]) && !empty($_POST["pasta"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$descricao = $class->antisql($_POST["descricao"]); 
		$pasta = $class->antisql($_POST["pasta"]);
		
			$insert = mysql_query("update subpasta set nome = '$nome', descricao = '$descricao', pasta = '$pasta' where id = '$idsub';") or die(mysql_error());
			
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
<legend>Alterar SubPasta</legend>
<b><?php echo "$mensagem_erro"; ?></b><br>
<form method="post" action="<?php $PHP_SELF; ?>">
<b>Nome:</b><input type="text" name="nome" value="<?php echo $exibesql["nome"]; ?>"><br>
<b>Descrição:</b><input type="text" name="descricao" value="<?php echo $exibesql["descricao"]; ?>"><br>
<b>Pasta Pertencente (id):</b><input type="text" name="pasta" value="<?php echo $exibesql["pasta"]; ?>"><br>
<input type="submit" name="enviar" value="Salvar">
</form>

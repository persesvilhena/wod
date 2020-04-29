<?php
include "cabeca.dll";
$idsub = $_GET['ids'];
$idpasta = $_GET['idp'];
?>

<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Criar link";
if(isset($_POST["enviar"])) { 
	
	if(!empty($_POST["nome"]) && !empty($_POST["link"]) && !empty($_POST["tamanho"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$link = $class->antisql($_POST["link"]); 
		$tamanho = $class->antisql($_POST["tamanho"]);
		$subpasta = $class->antisql($_POST["subpasta"]);
		$pasta = $class->antisql($_POST["pasta"]);
		
			$insert = mysql_query("INSERT INTO `wod`.`links` (`id`, `pasta`, `subpasta`, `nome`, `link`, `tamanho`) VALUES (NULL, '$pasta', '$subpasta', '$nome', '$link', '$tamanho');") or die(mysql_error());
			
			if($insert) {
				
				$mensagem_erro = "<b>Link criado com sucesso!</b>";
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
<b>Nome:</b><input type="text" name="nome" value=""><br>
<b>Link:</b><input type="text" name="link" value=""><br>
<b>Tamanho:</b><input type="text" name="tamanho" value=""><br>
<b>Subpasta pertencente (id):</b><input type="text" name="subpasta" value="<?php echo "$idsub"; ?>"><br>
<b>Pasta pertencente (id):</b><input type="text" name="pasta" value="<?php echo "$idpasta"; ?>"><br>
<input type="submit" name="enviar" value="Salvar">
</form>

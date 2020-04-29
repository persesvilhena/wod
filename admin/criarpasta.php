<?php
include "cabeca.dll";
?>

<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Criar Pasta";
if(isset($_POST["enviar"])) { 
	
	if(!empty($_POST["nome"]) && !empty($_POST["descricao"]) && !empty($_POST["categoria"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$descricao = $class->antisql($_POST["descricao"]); 
		$categoria = $class->antisql($_POST["categoria"]);
		
			$insert = mysql_query("INSERT INTO  `wod`.`pasta` (`id` ,`nome` ,`descricao` ,`categoria`) VALUES (NULL ,  '$nome',  '$descricao',  '$categoria');") or die(mysql_error());
			
			if($insert) {
				
				$mensagem_erro = "<b>Pasta criada com sucesso!</b>";
			}
		
		
	}
	else {
	
		$mensagem_erro = "<b>Por favor, preencha os campos corretamente!</b>";
		
	}		
}
?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend>Criar Pasta</legend>
<b><?php echo "$mensagem_erro"; ?></b><br>
<form method="post" action="<?php $PHP_SELF; ?>">
<b>Nome:</b><input type="text" name="nome" value=""><br>
<b>Descrição:</b><input type="text" name="descricao" value=""><br>
<b>Categoria:</b><input type="text" name="categoria" value=""><br>
<input type="submit" name="enviar" value="Salvar">
</form>

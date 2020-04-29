<?php
include "cabeca.dll";
$idpasta = $_GET['id'];
?>
<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Criar SubPasta";
if(isset($_POST["enviar"])) { 
	
	if(!empty($_POST["nome"]) && !empty($_POST["descricao"]) && !empty($_POST["pasta"])) { 
		
		$nome = $class->antisql($_POST["nome"]);
		$descricao = $class->antisql($_POST["descricao"]); 
		$pasta = $class->antisql($_POST["pasta"]);
		
			$insert = mysql_query("INSERT INTO  `wod`.`subpasta` (`id` ,`nome` ,`descricao` ,`pasta`)VALUES (NULL ,  '$nome',  '$descricao',  '$pasta');") or die(mysql_error());
			
			if($insert) {
				
				$mensagem_erro = "<b>Subpasta criada com sucesso!</b>";
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
<b>Nome:</b><input type="text" name="nome" value=""><br>
<b>Descrição:</b><input type="text" name="descricao" value=""><br>
<b>Pasta Pertencente (id):</b><input type="text" name="pasta" value="<?php echo "$idpasta"; ?>"><br>
<input type="submit" name="enviar" value="Salvar">
</form>

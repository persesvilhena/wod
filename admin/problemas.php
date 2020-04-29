<?php
include "cabeca.dll";
?>

<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Pedidos";
if(isset($_POST["deleta"])) { 
$iddeleta = $class->antisql($_POST["deletav"]);

		
			$insert = mysql_query("delete from problemas where id = '$iddeleta';") or die(mysql_error());
			
			if($insert) {
				
				$mensagem_erro = "<b>Pedido apagado com sucesso!</b>";
			}
		
		
	
	else {
	
		$mensagem_erro = "<b>erro! informe o webmaster</b>";
		
			
} }
?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend><b>Problemas:</b></legend>


<?php
$res = mysql_query("SELECT * FROM  `problemas` ORDER BY  `problemas`.`id` ASC LIMIT 0 , 30") or die(mysql_error());
echo "<table border=1>";
echo "<tr>
<td width=5%><span class=titulo>Id</span></td>
<td width=90%><span class=titulo>Problema</span></td>
<td width=5%><span class=titulo>apagar</span></td></tr>";
 while($escrever=mysql_fetch_array($res)){
 echo "<tr>
  <td><span class=texto>" . $escrever['id'] . "</span></td>
  <td><span class=texto>" . $escrever['problema'] . "</span></td>
  <td><span class=texto><form method=post action=problemas.php><input type=hidden name=deletav value=" . $escrever['id'] . "><input type=submit name=deleta value=Apagar></form></span></td></tr>";
 } 
  echo "</table>";
?>

</fieldset>

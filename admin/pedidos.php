<?php
include "cabeca.dll";
?>

<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Pedidos";
if(isset($_POST["deleta"])) { 
$iddeleta = $class->antisql($_POST["deletav"]);

		
			$insert = mysql_query("delete from pedidos where id = '$iddeleta';") or die(mysql_error());
			
			if($insert) {
				
				$mensagem_erro = "<b>Pedido apagado com sucesso!</b>";
			}
		
		
	
	else {
	
		$mensagem_erro = "<b>erro! informe o webmaster</b>";
		
			
} }
?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend><b>Pedidos:</b></legend>


<?php
$res = mysql_query("SELECT * FROM  `pedidos` ORDER BY  `pedidos`.`id` ASC LIMIT 0 , 30") or die(mysql_error());
echo "<table border=1>";
echo "<tr>
<td width=5%><span class=titulo>Id</span></td>
<td width=35%><span class=titulo>Nome</span></td>
<td width=5%><span class=titulo>email</span></td>
<td width=50%><span class=titulo>pedido</span></td>
<td width=5%><span class=titulo>apagar</span></td></tr>";
 while($escrever=mysql_fetch_array($res)){
 echo "<tr>
  <td><span class=texto>" . $escrever['id'] . "</span></td>
  <td><span class=texto>" . $escrever['nome'] . "</span></td>
  <td><span class=texto>" . $escrever['email'] . "</span></td>
  <td><span class=texto>" . $escrever['pedido'] . "</span></td>
  <td><span class=texto><form method=post action=pedidos.php><input type=hidden name=deletav value=" . $escrever['id'] . "><input type=submit name=deleta value=Apagar></form></span></td></tr>";
 } 
  echo "</table>";
?>

</fieldset>

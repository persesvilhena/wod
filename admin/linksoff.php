<?php
include "cabeca.dll";
?>

<?php include "menu.dll"; ?>

<?php
$mensagem_erro = "Pedidos";
if(isset($_POST["deleta"])) { 
$iddeleta = $class->antisql($_POST["deletav"]);

		
			$insert = mysql_query("delete from linkoff where id = '$iddeleta';") or die(mysql_error());
			
			if($insert) {
				
				$mensagem_erro = "<b>Pedido apagado com sucesso!</b>";
			}
		
		
	
	else {
	
		$mensagem_erro = "<b>erro! informe o webmaster</b>";
		
			
} }
?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend><b>Links Off:</b></legend>


<?php
$res = mysql_query("SELECT * FROM  `linkoff` ORDER BY  `linkoff`.`id` ASC LIMIT 0 , 30") or die(mysql_error());
echo "<table border=1>";
echo "<tr>
<td width=5%><span class=titulo>Id</span></td>
<td width=85%><span class=titulo>Link</span></td>
<td width=5%><span class=titulo>corrigir</span></td>
<td width=5%><span class=titulo>apagar</span></td></tr>";
 while($escrever=mysql_fetch_array($res)){
 echo "<tr>
  <td><span class=texto>" . $escrever['id'] . "</span></td>
  <td><span class=texto><a href=" . $escrever['link'] . " target=_top>" . $escrever['link'] . "</a></span></td>
  <td><span class=texto><a href=alterarlinks.php?id=" . $escrever['ido'] . " target=_top>Corrigir</a></span></td>
  <td><span class=texto><form method=post action=linksoff.php><input type=hidden name=deletav value=" . $escrever['id'] . "><input type=submit name=deleta value=Apagar></form></span></td></tr>";
 } 
  echo "</table>";
?>

</fieldset>

<?php include "cabeca.dll"; ?>
<?php
$procura1 = $class->antisql($_POST["procura"]);
$seek = str_replace(' ','%',$procura1);
?>

<?php include "menu.dll"; ?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend><b>Administrador:</b> <?php echo "$row[nome]"; ?></legend>

<form method="post" action="<?php $PHP_SELF; ?>">
<br><input type="text" name="procura"><button type="submit" name="busca" value="Cadastrar">Buscar</button></form>
<hr size="1" color="#cccccc">
<?php
$res = mysql_query("SELECT * FROM  `pasta` WHERE nome LIKE  '%$seek%'ORDER BY  `pasta`.`nome` DESC LIMIT 0 , 30") or die(mysql_error());
echo "<table>";
echo "<tr>
<td width=40%><span class=titulo>Nome</span></td>
<td width=5%><span class=titulo>Alterar</span></td>
<td width=5%><span class=titulo>Excluir</span></td>
<td width=50%><span class=titulo>Descrição</span></td></tr>";
if(isset($_POST["busca"])) {
 while($escrever=mysql_fetch_array($res)){
 echo "<tr>
  <td><span class=texto><a href=verpasta.php?id=" . $escrever['id'] . " target=_top>" . $escrever['nome'] . "</a></span></td>
  <td><span class=texto><a href=alterarpasta.php?id=" . $escrever['id'] . " target=_top>Alterar</a></span></td>
  <td><span class=texto><a href=excluirpasta.php?id=" . $escrever['id'] . " target=_top>Excluir</a></span></td>
  <td><span class=texto>" . $escrever['descricao'] . "</span></td></tr>";
 } }
  echo "</table>";
?>

</fieldset>
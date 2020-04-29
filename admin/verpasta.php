<?php
include "cabeca.dll";
$idpasta = $_GET['id'];
?>

<?php
$sql = mysql_query("SELECT * FROM `pasta` where id='$idpasta';");
$exibesql = mysql_fetch_array($sql);
?>
<?php include "menu.dll"; ?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend><span class="titulo"><?php echo "$exibesql[nome]"; ?></span></legend>
<span class="texto">
<b>Descrição:</b> <?php echo "$exibesql[descricao]"; ?><br>
<span class="titulo"><a href="criarsub.php?id=<?php echo "$exibesql[id]"; ?>" target="_top">Criar Subpasta</a><br><br>
<b>Subpasta:</b> <br>
<?php
$res = mysql_query("SELECT * FROM  `subpasta` WHERE pasta='$idpasta'") or die(mysql_error());
echo "<table>";
 while($escrever=mysql_fetch_array($res)){
 echo "<tr>
  <td><span class=texto><a href=versub.php?id=" . $escrever['id'] . " target=_top>" . $escrever['nome'] . "</a></span></td>
  <td><span class=texto><a href=alterarsub.php?id=" . $escrever['id'] . " target=_top>Alterar</a></span></td>
  <td><span class=texto><a href=excluirsub.php?id=" . $escrever['id'] . " target=_top>Excluir</a></span></td>
  </tr>";
 }
  echo "</table>";
?>
</fieldset>
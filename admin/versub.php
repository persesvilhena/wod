<?php
include "cabeca.dll";
$idsub = $_GET['id'];
?>

<?php
$sql = mysql_query("SELECT * FROM `subpasta` where id='$idsub';");
$exibesql = mysql_fetch_array($sql);
?>
<?php include "menu.dll"; ?>
<fieldset style="width: 800px; position: relative; left: 250;">
<legend><span class="titulo"><?php echo "$exibesql[nome]"; ?></span></legend>
<span class="texto">
<b>Descrição:</b> <?php echo "$exibesql[descricao]"; ?><br>
<span class="titulo"><a href="criarlinks.php?ids=<?php echo "$exibesql[id]"; ?>&idp=<?php echo "$exibesql[pasta]"; ?>" target="_top">Criar link</a><br><br>
<b>Links:</b> <br>
<?php
$res = mysql_query("SELECT * FROM  `links` WHERE subpasta='$idsub'") or die(mysql_error());
echo "<table>";
 while($escrever=mysql_fetch_array($res)){
 echo "<tr>
 <td><span class=texto><a href=" . $escrever['link'] . " target=_top>" . $escrever['nome'] . "</a></span></td>
 <td><span class=texto><a href=alterarlinks.php?id=" . $escrever['id'] . " target=_top>Alterar</a></span></td>
 <td><span class=texto><a href=excluirlinks.php?id=" . $escrever['id'] . " target=_top>Excluir</a></span></td>
 </tr>";
 }
  echo "</table>";
?>
</fieldset>
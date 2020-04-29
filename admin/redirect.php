<link rel="stylesheet" href="css/style.css" type="text/css">
<?php include "conexao.php" ?>

<?php
$info1 = $_GET['info1'];
?>

<?php
if(isset($_GET["index"])) {
include "include/index/index.dll";	
}
?>
<?php
if(isset($_GET["verpasta"])) {
include "include/index/verpasta.dll";	
}
?>
<?php
if(isset($_GET["versub"])) {
include "include/index/versub.dll";	
}
?>
<?php
if(isset($_GET["series"])) {
include "include/classes/series.dll";	
}
?>
<?php
if(isset($_GET["filmes"])) {
include "include/classes/filmes.dll";	
}
?>
<?php
if(isset($_GET["musicas"])) {
include "include/classes/musicas.dll";	
}
?>
<?php
if(isset($_GET["desenhos"])) {
include "include/classes/desenhos.dll";	
}
?>
<?php
if(isset($_GET["imagens"])) {
include "include/classes/imagens.dll";	
}
?>
<?php
if(isset($_GET["videos"])) {
include "include/classes/videos.dll";	
}
?>
<?php
if(isset($_GET["jogos"])) {
include "include/classes/jogos.dll";	
}
?>
<?php
if(isset($_GET["programas"])) {
include "include/classes/programas.dll";	
}
?>
<title><?php echo "$titulopag"; ?></title>
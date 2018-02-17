<?php
if (isset($_POST['submit'])) {
$fp = fopen("myarchivo.txt","a");
fwrite($fp, $_POST['nombre'] . "\t" . $_POST['apellido'] . PHP_EOL);
fclose($fp);
die;
}
?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<input type="text" name="nombre" />
<input type="text" name="apellido" />
<input type="submit" name="submit" />
</form>
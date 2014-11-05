<?PHP
$method=$_GET['method'];
$callback=$_GET['callback'];
echo $callback."(";
include $method.".php";
echo ")";
?>

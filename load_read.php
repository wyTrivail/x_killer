<?PHP
include_once("redis_tool.php");
$id = $_SESSION['id'];
$vals = redis_hget(2,$id);
if( empty($vals))
    echo "[]";
else{
    echo "[";
    echo $vals[0];
    for($i=1;$i < sizeof($vals); ++$i)
        echo ",".$vals[$i];
    echo "]";
}
?>

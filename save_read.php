<?PHP
include_once("redis_tool.php");
$user_id = $_SESSION['id'];
$url=$_GET['url'];
$strategy_id=$_GET['strategy_id'];
$height=$_GET['height'];
$title=$_GET['title'];
$value=urldecode(json_encode(array('height'=>$height,'title'=>urlencode($title),'url'=>urlencode($url))));
redis_hset(2,$user_id,$strategy_id,$value);
echo json_encode(array('save_state'=>0));
?>

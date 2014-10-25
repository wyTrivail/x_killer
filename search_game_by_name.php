<?php
include_once("mysql_tool.php");
include_once("db_item.php");
$search_name = urldecode($_GET['name']);
$start = $_GET['start'];
$length = $_GET['length'];
$result = db_query("select id,game_name,pic_url from game_info where game_name like '%$search_name%' limit $start,$length");
$data = array();
while($row=mysql_fetch_array($result)){
    array_push($data,new game_item($row['id'],urlencode($row['game_name']), urlencode($row['pic_url'])));
}
echo urldecode(json_encode($data));
?>

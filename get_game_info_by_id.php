<?php
include_once("mysql_tool.php");
$id = $_GET['id'];
$result=db_query("select id,game_name,english_name,game_type,release_area,release_date,publisher,summary_url,pic_url,support_chinese,support_english,support_japanese,player_num,xbox,ps,wii,3ds,is_internet,pc from game_info where id = $id");
$row = mysql_fetch_assoc($result);
$redis = new Redis();
$redis->connect("127.0.0.1");
$redis->select(1);
$json=array('id'=>$row['id'], 'game_name'=>urlencode($row['game_name']),'english_name'=>$row['english_name'],'game_type'=>urlencode($redis->get('game_type'.$row['game_type'])),'release_area'=>urlencode($redis->get('release_area'.$row['release_area'])), 'publisher'=>urlencode($redis->get('publisher'.$row['publisher'])),'summary_url'=>urlencode($row['summary_url']),'pic_url'=>urlencode($row['pic_url']), 'player_num'=>$row['player_num'], 'platform'=> $redis->get('xbox'.$row['xbox']).' '.$redis->get('ps'.$row['ps']).' '.$redis->get('wii'.$row['wii']).' '.$redis->get('3ds'.$row['3ds']).' '.$redis->get('pc'.$row['pc']), 'is_internet'=>$row['is_internet'], 'language'=>urlencode(($row['support_chinese']?'中文':"").' '.($row['support_english']?"英文":'').' '.($row['support_japanese']?"日文":'')),'release_date'=>$row['release_date']);
echo urldecode(json_encode($json));

?>


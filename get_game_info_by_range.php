<?php
$connect =mysql_pconnect('localhost','root','123456');
mysql_select_db('gamedb',$connect);
mysql_query("set names utf8");
$data = array();
$i=0;
$result = mysql_query("select id,game_name,pic_url from game_info limit $_GET[start],$_GET[length]");
class game_item{
	public $system_id;
    public $name;
    public $pic_url;
	function __construct($id, $name,$pic_url){
		$this->system_id = $id;
        $this->name = $name;
        $this->pic_url = $pic_url;
	}
}
while($row = mysql_fetch_array($result)){
	$data[$i] = new game_item($row['id'],urlencode($row['game_name']), urlencode($row['pic_url'])); 
	$i++;
}
echo urldecode(json_encode(array($data)));
mysql_close($connect);
?>

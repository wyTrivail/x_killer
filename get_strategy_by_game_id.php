<?php
include_once("mysql_tool.php");
class strategy_item{
    public $name;
    public $id;
    function __construct($id,$name){
        $this->id = $id;
        $this->name = $name;
    }
}
$result = db_query("select id,strategy_name from strategy where game_id = '$_GET[id]' order by rank limit $_GET[start], $_GET[length]");
$data = array();
while($row=mysql_fetch_array($result)){
    array_push($data, new strategy_item($row['id'],urlencode($row['strategy_name'])));
}
echo urldecode(json_encode(array($data)));
?>

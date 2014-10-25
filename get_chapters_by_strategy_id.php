<?php
include_once("mysql_tool.php");
class chapter_item{
    public $name;
    public $id;
    function __construct($id,$name){
        $this->id = $id;
        $this->name = $name;
    }
}
$start = $_GET['start'];
$length = $_GET['length'];
$result = db_query("select * from chapter where strategy_id = '$_GET[id]' order by section limit $start,$length");
$data = array();
while($row=mysql_fetch_array($result)){
    array_push($data, new chapter_item($row['id'],urlencode($row['chapter_name'])));
}
echo urldecode(json_encode($data));
?>

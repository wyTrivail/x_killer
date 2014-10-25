<?php
include_once("mysql_tool.php");
class page_item{
    public $number;
    public $page_url;
    function __construct($page_number,$page_url){
        $this->number = $page_number;
        $this->page_url = $page_url;
    }

}
$start = $_GET['start'];
$length = $_GET['length'];
$result = db_query("select page_number,page_url from page where chapter_id = '$_GET[chapter_id]' order by page_number limit $start,$length");
$data = array();
while($row=mysql_fetch_array($result)){
    array_push($data, new page_item($row['page_number'],urlencode($row['page_url'])));
}
echo urldecode(json_encode(array($data)));

?>

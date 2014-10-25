<?php
class game_item{
    public $system_id;
    public $name;
    public $pic_url;
    function __construct($id,$name,$pic_url){
        $this->system_id = $id;
        $this->name = $name;
        $this->pic_url = $pic_url;
    }
}
?>

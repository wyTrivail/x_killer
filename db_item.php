<?php
class game_item{
    public $id;
    public $name;
    public $pic_url;
    function __construct($id,$name,$pic_url){
        $this->id = $id;
        $this->name = $name;
        $this->pic_url = $pic_url;
    }
}
?>

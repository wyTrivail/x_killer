<?php
   function build_connection(){
       $connect = mysql_pconnect('localhost','root','123456');
       mysql_select_db('gamedb',$connect);
       mysql_query('set names utf8');
    return $connect;
   }
   function db_query($sql){
       $connect = build_connection();
       $result = mysql_query($sql);
       mysql_close($connect);
       return $result;
   }
?>

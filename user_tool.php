<?PHP
include_once("mysql_tool.php");
function is_user_name_existed($user_name){
    $result = db_query("select id from user_info where user_name = '$user_name'");
    $array = mysql_fetch_array($result);
    return !empty($array);
}
function is_email_existed($email){
    $result = db_query("select id from user_info where email = '$email'");
    $array = mysql_fetch_array($result);
    return !empty($array);
}
function is_email_valid($email){
    return preg_match('/\w+@(\w|\d)+\.\w{2,3}/i', $email);
}
function is_password_valid($password){
    return strlen($password) >= 0;
}
?>

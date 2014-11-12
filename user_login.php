<?PHP
include_once("mysql_tool.php");
$email = $_GET['email'];
$password = $_GET['password'];
$result = db_query("select id,user_name,user_authority from user_info where email = '$email' and password = '$password'");
$array = mysql_fetch_array($result);
if(empty($array))
    echo json_encode(array('login_state'=>1));
else {
    session_start();
    $row = $array;
    $_SESSION['id'] = $row['id'];
    $_SESSION['user_authority'] = $row['user_authority'];
    echo json_encode(array('login_state'=>0, 'user_name'=>$row['user_name']));
}

?>

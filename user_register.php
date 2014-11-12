<?PHP
include_once("user_tool.php");
$password=$_GET['password'];
$user_name=$_GET['user_name'];
$email=$_GET['email'];
if(!is_password_valid($password))
    echo json_encode(array('register_state'=>1));
else if(!is_email_valid($email))
    echo json_encode(array('register_state'=>2));
else if(is_email_existed($email))
    echo json_encode(array('register_state'=>3));
else if(is_user_name_existed($user_name))
    echo json_encode(array('register_state'=>4));
else{
    $id = db_insert("insert into user_info(password,user_name,email,user_authority) values ('$password','$user_name','$email',1)");
    if($id ==0)
        echo json_encode(array('register_state'=>5));
    else{
        session_start();
        $_SESSION['id'] = $id;
        echo json_encode(array('register_state'=>0));
    }
}
?>

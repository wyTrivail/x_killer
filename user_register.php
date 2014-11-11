<?PHP
include_once("user_tool.php");
$password=$_GET['password'];
$user_name=$_GET['user_name'];
$email=$_GET['email'];
if(!is_password_valid($password))
    echo json_encode(array('retcode'=>201));
else if(!is_email_valid($email))
    echo json_encode(array('retcode'=>202));
else if(is_email_existed($email))
    echo json_encode(array('retcode'=>203));
else if(is_user_name_existed($user_name))
    echo json_encode(array('retcode'=>204));
else{
    $id = db_insert("insert into user_info(password,user_name,email,user_authority) values ('$password','$user_name','$email',1)");
    if($id ==0)
        echo json_encode(array('retcode'=>205));
    else{
        session_start();
        $_SESSION['id'] = $id;
        echo json_encode(array('retcode'=>200));
    }
}
?>

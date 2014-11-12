<?PHP
function return_value($callback,$val){
    return $callback."(".$val.")";
}
function request_handle($callback,$method){
    echo $callback."(";
    echo "{\"retcode\":200,";
    echo "\"content\":";
    include $method.".php";
    echo "})";
}
static $authority_map = array('save_read'=>0x0001, 'load_read'=>0x0001);
$method=$_GET['method'];
$callback=$_GET['callback'];
if( isset($authority_map[$method])){
    session_start();

    $method_authority = $authority_map[$method];
    if(!isset($_SESSION['id'])){
        echo return_value($callback, json_encode(array('retcode'=>201)));
        exit();
    }
    $user_authority = $_SESSION['user_authority'];
    if( $user_authority & $method_authority == $method_authority)
        request_handle($callback,$method);
    else
        echo return_value($callback, json_encode(array('retcode'=>202)));
}else{
    request_handle($callback,$method);
}

?>

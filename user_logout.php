<?PHP
session_start();
session_unset();
session_destroy();
echo json_encode('retcode'=>200);
?>

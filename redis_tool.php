<?PHP
function redis_init($area){
    $redis = new Redis();
    $redis->connect("127.0.0.1");
    $redis->select($area);
    return $redis;
}
function redis_hset($area,$hash,$key,$value){
    return redis_init($area)->hset($hash,$key,$value);
}
function redis_hget($area,$hash){
    return redis_init($area)->hvals($hash);
}
?>

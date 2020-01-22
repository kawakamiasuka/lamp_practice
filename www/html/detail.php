<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'history.php';

session_start();

if(is_logined() === false) {
    redirect_to(LOGIN_URL);
}


$db = get_db_connect();
$user = get_login_user($db);
$post_token = get_post('token');

if(is_valid_csrf_token($post_token) === false) {
    redirect_to(LOGIN_URL);
} else {
    unset($_SESSION['csrf_token']);
}

$order_id = get_post('order_id');
$information = get_detail_information($db, $order_id);
$total_price = get_history_data_order($db, $order_id);




include_once '../view/detail_view.php';
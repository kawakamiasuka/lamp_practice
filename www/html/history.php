<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'db.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'history.php';

session_start();

if(is_logined() === false) {
    redirect_to(LOGIN_URL);
}

$db = get_db_connect();
$user = get_login_user($db);
if(is_admin($user) === false) {
    $information = get_history_data($db, $user['user_id']);
} else {
    $information = get_history_data_admin($db);
}
$token = get_csrf_token();


include_once '../view/history_view.php';

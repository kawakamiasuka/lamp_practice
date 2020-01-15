<?php
require_once '../conf/const.php';
require_once MODEL_PATH . 'functions.php';
require_once MODEL_PATH . 'user.php';
require_once MODEL_PATH . 'item.php';
require_once MODEL_PATH . 'cart.php';
//セッション開始
session_start();
//$_SESSION['user_id']が存在しなければログイン画面へリダイレクト
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
//データベース接続、ログインしているユーザーの情報を$userへ格納
$db = get_db_connect();
$user = get_login_user($db);
//フォームから送られてきた情報を格納
$cart_id = get_post('cart_id');
$post_token = get_post('token');

//トークンが一致するか確認
if(is_valid_csrf_token($post_token) === false) {
  redirect_to(LOGIN_URL);
} else {
  unset($_SESSION['csrf_token']);
}
//カートを削除
if(delete_cart($db, $cart_id)){
  set_message('カートを削除しました。');
} else {
  set_error('カートの削除に失敗しました。');
}
//リダイレクト
redirect_to(CART_URL);
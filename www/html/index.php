<?php
require_once '../conf/const.php';
require_once '../model/functions.php';
require_once '../model/user.php';
require_once '../model/item.php';
require_once '../model/page.php';
//セッション開始
session_start();
//$_SESSION['user_id']が存在しなければ、ログイン画面へリダイレクト
if(is_logined() === false){
  redirect_to(LOGIN_URL);
}
//データベースへ接続、ログインしているユーザーの情報を$userへ格納
$db = get_db_connect();
$user = get_login_user($db);
$page = get_get('page'); //一番はじめは空
$now_page = page($page);// $pageが空の時１を返す。空じゃないときはそのページ数を返す
$offset_page = offset_page($now_page);
//公開されている商品情報のみを取得
$items = get_items_limit($db, $offset_page);//変更８個ずつにする処理
//処理
$count_items = get_count_items($db);
//１ページ８個のアイテム。８でわって小数点は切り上げ（切り捨てならfloat)総ページ数を表す
$pages = ceil($count_items[0]["count_item"]/8);




$token = get_csrf_token();


//リダイレクト

include_once '../view/index_view.php';
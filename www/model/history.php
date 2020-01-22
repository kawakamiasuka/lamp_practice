<?php
//購入履歴を表示するための関数(user)
function get_history_data($db, $user_id) {
  $sql = "
          SELECT
            order_id,
            created,
            updated,
            total_price
          FROM
            history
          WHERE
            user_id = :user_id
          ";
          
  return fetch_all_query($db, $sql, array(':user_id' => $user_id));
}
//詳細画面で、合計金額を表示する際に、order_idを指定して情報を取ってくる関数が必要
function get_history_data_order($db,$order_id) {
    $sql = "
            SELECT
                total_price
            FROM
                history
            WHERE
                order_id = :order_id
            ";
    return fetch_all_query($db, $sql, array(':order_id' => $order_id));
}
//(admin)
function get_history_data_admin($db) {
    $sql = "
            SELECT
              order_id,
              created,
              updated,
              total_price
            FROM
              history
            ";
            
    return fetch_all_query($db, $sql);
  }

//購入ボタンが押された時、historyテーブルに情報を格納する
function insert_history_table($db,$total_price,$user_id) {
  $sql = "
        INSERT INTO
            history(total_price,user_id)
        VALUES(:total_price, :user_id)
          ";
  return execute_query($db, $sql, array(':total_price' => $total_price, ':user_id' => $user_id));
}

//購入ボタンが押された時に、detailテーブルに情報を格納する
function insert_detail_table($db, $order_id, $item_id, $price, $amount) {
  $sql = "
          INSERT INTO
            detail(order_id,item_id,price,amount)
          VALUES(:order_id,:item_id,:price,:amount)
          ";
  return execute_query($db, $sql, array(':order_id' => $order_id, ':item_id' => $item_id, ':price' => $price, ':amount' => $amount));
}

//履歴明細を表示する
function get_detail_information($db, $order_id){
  $sql = "
          SELECT
            detail.item_id,
            detail.price,
            detail.amount,
            detail.order_id,
            detail.created,
            detail.price * detail.amount AS the_total_price,
            items.name
          FROM 
            detail
          INNER JOIN
            items
          ON
            detail.item_id = items.item_id
          WHERE
            order_id = :order_id
          ";
  return fetch_all_query($db, $sql, array(':order_id' => $order_id));
}

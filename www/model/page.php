<?php
//総ページ数を取得する関数
function get_count_items($db) {
    $sql = "
            SELECT
                COUNT(*) AS count_item
            FROM items
            ";
    return fetch_all_query($db, $sql);
}


function get_items_limit($db, $offset_page){//変更
    $sql = '
      SELECT
        item_id, 
        name,
        stock,
        price,
        image,
        status
      FROM
        items
      WHERE status = 1
      LIMIT 8
        OFFSET :offset_page
      ';

    return fetch_all_query($db, $sql,array(':offset_page' =>$offset_page));
}


  function page($page){
     if($page === '') {
        return 1;
     }
    return $page;
  }
  function offset_page($page) {
      return ($page-1)*8;
  }
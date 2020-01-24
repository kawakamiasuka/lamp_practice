<?php
header('X-FRAME-OPTIONS:DENY');
?>
<!DOCTYPE html>
    <html lang="ja">
        <head>
        <?php include VIEW_PATH . 'templates/head.php'; ?>
            <title>購入詳細画面</title>
        <style>
            .table{
                border-style:solid gray;
            }
        </style>
        </head>
        <body>
        <?php include VIEW_PATH . 'templates/header_logined.php'; ?>
            <div class="container">
                <h1>購入詳細</h1>
                    <p>注文番号：<?php print(h($information[0]['order_id'])); ?></p>
                    <p>購入日時：<?php print(h($information[0]['created']));?></p>
                    <p>合計金額：<?php print(h($total_price[0]['total_price']));?>円</p>
                    <table class="table">
                        <tr>
                            <th>商品名</th>
                            <th>商品価格</th>
                            <th>購入数</th>
                            <th>小計</th>
                        </tr>
                        <?php foreach($information as $info) { ?>
                        <tr>
                            <th><?php print(h($info['name']));?></th>
                            <th><?php print(h($info['price'])); ?>円</th>
                            <th><?php print(h($info['amount'])); ?>個</th>
                            <th><?php print(h($info['the_total_price'])); ?>円</th>
                        </tr>
                        <?php } ?>
                    </table>
            </div>
        </body>
    </html>
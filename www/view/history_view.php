<?php
header('X-FRAME-OPTIONS:DENY');
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <?php include VIEW_PATH . 'templates/head.php'; ?>
        <title>購入履歴一覧</title>
        <link rel="stylesheet" href="">
        <style>
            .table{
                border-style:solid gray;
            }
        </style>
    </head>
    <body>
        <?php include_once VIEW_PATH . 'templates/header_logined.php';?>
        
        <div class="container">
            <h1>購入履歴</h1>
            <?php include_once VIEW_PATH . 'templates/messages.php'; ?>
                <table class="table">
                    <tr>
                        <th>注文番号</th>
                        <th>購入日時</th>
                        <th>注文の合計額</th>
                        <th>明細</th>
                    </tr>
                    <?php foreach($information as $info){ ?>
                    <tr>
                        <td><?php print(h($info['order_id'])); ?></td>
                        <td><?php print(h($info['updated'])); ?></td>
                        <td><?php print(h($info['total_price']));?>円</td>
                        <td>
                            <form method="post" action="detail.php">
                                <input type="submit" name="display" value="購入明細表示">
                                <input type="hidden" name="token" value="<?php print $token;?>">
                                <input type="hidden" name="order_id" value="<?php print(h($info['order_id']));?>">
                            </form>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
        </div>
    </body>
</html>


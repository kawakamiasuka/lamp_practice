購入履歴画面用のテーブルです
CREATE TABLE history(
    order_id INT AUTO_INCREMENT,
    total_price INT(11),
    user_id INT(11),
    created datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updated datetime DEFAULT CURRENT_TIMESTAMP,
    primary key(order_id)
);

購入詳細画面用のテーブルです
CREATE TABLE detail(
    id INT(11) AUTO_INCREMENT,
	oder_id INT(11),
    item_id INT(11),
    price INT(11),
    total_amount INT(11),
    created DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    updated DATETIME DEFAULT CURRENT_TIMESTAMP
    primary key(id)
);


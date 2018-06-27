<?php

class orders {

  function save($userId){
      //save to orders
      global $db;
      $query = 'INSERT INTO `orders`
      (amount, payment_status, user_id, created_at, updated_at)
      VALUES
      (:amount, :payment_status, :user_id, :created_at, :updated_at)';

      $order_date = date('Y-m-d H:i:s');
      $order = $db->getConnection()->prepare($query);
      $order->execute([
          'amount' => $_SESSION['cart'] ['total'],
          'payment_status' => 'open',
          'user_id' => $userId,
          'created_at' => $order_date,
          'updated_at' => $order_date,
      ]);

      //set $orderId to the last saved row's id
      $orderId = $db->getConnection()->lastInsertId();

      // save to orders_products
      $query = 'INSERT INTO `orders_products`
      (order_id, product_id, price, quantity, created_at, updated_at)
      VALUES
      (:order_id, :product_id, :price, :quantity, :created_at, :updated_at)';

              foreach ($_SESSION['cart']['products'] as $id => $product) {
                  $products = $db->getConnection()->prepare($query);
                  $products->execute([
                      'order_id' => $orderId,
                      'product_id' => $product['id'],
                      'price' => $product['price'],
                      'quantity' => $product['quantity'],
                      'created_at' => $order_date,
                      'updated_at' => $order_date,
                  ]);
          }
    }
}

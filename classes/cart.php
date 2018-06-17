<?php

require_once __DIR__ .'/db.php';
class Cart {


    public static function addToCart($id, $quantity = 1)
    {
        global $db;
        if(isset($_SESSION['cart']['products'][$id])) {
            $_SESSION['cart']['products'][$id]['quantity'] += $quantity;
        }
        else {
            $product = $db->query('SELECT * FROM products WHERE id = '.$id);
            $product = $db->select('products');

            if(!empty($product[0]))
            $_SESSION['cart']['products'][$id] = [
                'quantity' => 1,
                'title' => $product[0]->title,
                'price' => $product[0]->price,
                'id' => $product[0]->id
            ];


        }

        self::calculate();
    }


    public static function removeFromCart($id)
    {
        if($_SESSION['cart']['products'][$id]['quantity'] > 1) {
            $_SESSION['cart']['products'][$id]['quantity']--;
        }
        else {
            unset($_SESSION['cart']['products'][$id]);
        }

        self::calculate();
    }


    public static function get()
    {
        return $_SESSION['cart'];
    }


    private static function calculate()
    {
        $totalPrice = 0;
        foreach($_SESSION['cart']['products'] as $key => $value) {
            $totalPrice += $value['price'] * $value['quantity'];
        }

        $_SESSION['cart']['total'] = $totalPrice;
    }


    public static function reset()
    {
        // default cart create
        $_SESSION['cart'] = [
            'products' => [],
            'total' => 0.00,
        ];
    }
}

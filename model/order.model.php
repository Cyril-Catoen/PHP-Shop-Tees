<?php 

class Order {
    public string $product;
    public int $quantity;
    public DateTime $createdAt;
    public string $status; 

// Je créé un nouvel objet avec un ensemble de propriétés à définir
$order = new Order();

// Je définis la valeur des propriétés de ce nouvel objet
$order->product = "Teeshirt Mathieu Rozand";
$order->quantity = 3;
$order->createdAt = new DateTime();
$order->status = "Cart";
}?>


<?php
$lines = file("products.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

$products = [];
foreach ($lines as $line) {
    list($name, $price) = explode(",", $line);
    $products[] = ["name" => $name, "price" => (int)$price];
}

usort($products, function($a, $b) {
    return $a['price'] <=> $b['price'];
});

echo "<h3>Product List (Sorted by Price)</h3>";
echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>Product Name</th><th>Price</th></tr>";
foreach ($products as $product) {
    echo "<tr><td>{$product['name']}</td><td>{$product['price']}</td></tr>";
}
echo "</table>";
?>


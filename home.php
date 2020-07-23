<?php
// https://codeshack.io/how-to-integrate-paypal-php-mysql/
// echo "I am here from home.php!<br>";
// Get the 4 most recently added products
// $pdo = pdo_connect_mysql();
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added DESC LIMIT 4');
// $stmt = $pdo->prepare('SELECT * FROM products ORDER BY date_added');
// echo "I am here2 from home.php!<br>";
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>

<?=template_header('Home')?>

<div class="featured">
    <h2>Gadgets</h2>
    <p>Essential gadgets for everyday use</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Recently Added Products</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
        <!-- <?php echo "home.php line 24: " .$recently_added_products. "<br>"; ?> -->
        <!-- <?php echo $product['id'] . "<br>"; ?> -->
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="imgs/<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <span class="price">
                &dollar;<?=$product['price']?>
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp">&dollar;<?=$product['rrp']?></span>
                <?php endif; ?>
            </span>
        </a>
        <?php endforeach; ?>
    </div>
</div>

<?=template_footer()?>
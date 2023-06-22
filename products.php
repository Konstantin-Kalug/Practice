<?php
// The amounts of products to show on each page
$num_products_on_each_page = 4;
// The current page - in the URL, will appear as index.php?page=products&p=1, index.php?page=products&p=2, etc...
$current_page = isset($_GET['p']) && is_numeric($_GET['p']) ? (int)$_GET['p'] : 1;
// Select products ordered by the date added
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY id DESC LIMIT ?,?');
// bindValue will allow us to use an integer in the SQL statement, which we need to use for the LIMIT clause
$stmt->bindValue(1, ($current_page - 1) * $num_products_on_each_page, PDO::PARAM_INT);
$stmt->bindValue(2, $num_products_on_each_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch the products from the database and return the result as an Array
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);
// Get the total number of products
$total_products = $pdo->query('SELECT * FROM products')->rowCount();
?>
<?=template_header('Products')?>
<div class='panel'>
    <a href='index.php'>Категория 1</a>
    <a href='index.php'>Категория 2</a>
    <a href='index.php'>Категория 3</a>
    <a href='index.php'>Категория 4</a>
    <a href='index.php'>Категория 5</a>
    <a href='index.php'>Категория 6</a>
    <a href='index.php'>Категория 7</a>
    <button class='cart'><b>Корзина</b></button>
</div>
<div class="products content-wrapper">
    <h1>Продукты</h1>
    <p><?=$total_products?> Продуктов</p>
    <div class="products-wrapper">
        <?php foreach ($products as $product): ?>
        <a href="index.php?page=product&id=<?=$product['id']?>" class="product">
            <img src="<?=$product['img']?>" width="200" height="200" alt="<?=$product['name']?>">
            <span class="name"><?=$product['name']?></span>
            <div>
                <p class="text"><?=$product['desc']?></p>
            </div>
            <span class="price">
                <?=$product['price']?>₽
                <?php if ($product['rrp'] > 0): ?>
                <span class="rrp"><?=$product['rrp']?>₽</span>
                <?php endif; ?>
            </span>
            <b>300 г</b>
        </a>
        <?php endforeach; ?>
    </div>
    <div class="buttons">
        <?php if ($current_page > 1): ?>
        <a href="index.php?page=products&p=<?=$current_page-1?>">Prev</a>
        <?php endif; ?>
        <?php if ($total_products > ($current_page * $num_products_on_each_page) - $num_products_on_each_page + count($products)): ?>
        <a href="index.php?page=products&p=<?=$current_page+1?>">Next</a>
        <?php endif; ?>
    </div>
</div>

<?=template_footer()?>
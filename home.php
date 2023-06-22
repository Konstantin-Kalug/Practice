<?php
// Get the 4 most recently added products
$stmt = $pdo->prepare('SELECT * FROM products ORDER BY id DESC LIMIT 4');
$stmt->execute();
$recently_added_products = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?=template_header('Home')?>
<div class='panel'>
    <a href='#Category'>Категория 1</a>
    <a href='#Category'>Категория 2</a>
    <a href='#Category'>Категория 3</a>
    <a href='#Category'>Категория 4</a>
    <a href='#Category'>Категория 5</a>
    <a href='#Category'>Категория 6</a>
    <a href='#Category'>Категория 7</a>
    <button class='cart'><b>Корзина</b></button>
</div>
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/img1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/img2.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="img/img3.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Предыдущий</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"  data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Следующий</span>
  </button>
</div>
<div class="recentlyadded content-wrapper">
    <h2 id="Category">Название категории</h2>
    <div class="products">
        <?php foreach ($recently_added_products as $product): ?>
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
</div>
<div class="recentlyadded content-wrapper">
    <h2>Условия доставки</h2>
    <p>Самовывоз из офиса интернет-магазина</br>Минимальная сумма заказа отсутствует. Эта услуга бесплатна.</br>Cвой заказ можно получить в офисе интернет-магазина каждый день с с 9:00 до 21:00.<br>по адресу: Челюскинцев ул, дом 15</p>
    <p>Доставка курьерской службой</br>Наш курьер доставит заказ по указанному адресу с 10:00 до 21:00. После предварительного звонка оператора курьер дополнительно свяжется для предупреждения о выезде по адресу доставки (ориентировочно за 1 час).</br>Стоимость доставки 200 руб. при сумме заказа менее 2000 руб.</p> 
    <p>При сумме заказа более 2000 руб. доставка осуществляется бесплатно.</p>
    <p>Мы можем предложить доставку в день заказа или в любой последующий день с 10:00 до 21:00. Срочная доставка может быть осуществлена в любое удобное время в интервале 1 час, но не ранее, чем через 3 часа после оформления заказа. В случае опоздания курьера - доставка за наш счет!</p>
</div>
<div class="recentlyadded content-wrapper">
    <h2>Доставка еды</h2>
    <table>
        <tr>
            <td>
                <p>Россия, г. Новокузнецк,</br>ул. Красноармейская, 65</p>
                <p>8 800 000 00 00</br>E-mail: pf_zodchiy_granit@mail.ru</p>
                <p>Время работы: Пн. - пт: с 9:00 до 18:00,</br>сб.: с 10:00 до 15:00, вс.: выходной</p>
            </td>
            <td>
                <img class="map-img" src='img/map.png'/>
            </td>
        </tr>
    </table>
</div>
<div class='simple-space'></div>
<?=template_footer()?>
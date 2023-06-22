<?php
function pdo_connect_mysql() {
    // Update the details below with your MySQL details
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'shoppingcart.db';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// If there is an error with the connection, stop the script and display the error.
    	exit('Failed to connect to database!');
    }
}
// Template header, feel free to customize this
function template_header($title) {
header("Content-Type: text/html; charset=UTF-8");
echo <<<EOT
<!DOCTYPE html>
<html>
	<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>$title</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	</head>
	<body>
        <header>
            <div class="content-wrapper">
                <img class='logo' src='img/logo.jpg'/>
                <h1>Доставка еды</h1>
                <nav>
                    <a href="index.php">Домой</a>
                    <a href="index.php?page=products">Продукты</a>
                </nav>
                <div class="link-icons">
					<b>8 800 000 00 00</b>
                </div>
                <div class="link-icons">
                    <a href='index.php'>Войти</a>|<a href='index.php'>Регистрация</a>
                </div>
            </div>
        </header>
        <main>
EOT;
}
// Template footer
function template_footer() {
$year = date('Y');
echo <<<EOT
        </main>
        <footer>
            <div class="content-wrapper">
                <p>Доставка еды</p>
                <nav>
                    <a href='https://vk.com'><img src='img/vk.png'/></a>
                    <a href='https://ok.ru'><img src='img/ok.png'/></a>
                    <a href='https://web.telegram.org/'><img src='img/tg.png'/></a>
                </nav>
            </div>
            <div class="link-icons">
                <b>8 800 000 00 00</b>
            </div>
        </footer>
    </body>
</html>
EOT;
}
?>
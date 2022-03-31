<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopster | main</title>
    <link href="./style/main.css" rel="stylesheet">
    <link href="./style/misc-style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <a href="index.php"><span><h1 class ="logo">shopster.</h1></span></a>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul>
                <li><a class="button-header" href="./index.php">home</a></li>
                <li><a class="button-header" href="#news">products</a></li>
                <li><a class="button-header" href="#contact">about</a></li>
                <?php
                echo '<li style="float:right"><a class="active" href="./loginPage.php"><strong>Log in</strong></a></li>';
                ?>
            </ul>
        </div>
    </nav>
    <div class="todayDeal">
        <div class="checkoutCon">
            <?php
            echo '<a class="checkoutButt" href="">check out</a>';
            ?>
        </div>
        <div class="todayHeader">
            <p>- TODAY'S DEALS -</p>
        </div>
        <div class="itemDisplayContainer">
            <div class="dealItem">
                <img src="https://static.nike.com/a/images/t_PDP_1280_v1/f_auto,q_auto:eco/a03158c1-8969-4e5f-acea-37eef71cf0b7/air-jordan-1-retro-high-og-shoe-PLe8kL.png" alt="">
                <p class="product-text">Product</p>
                <a href="" class="button1">
                    Add to cart
                </a>
            </div>
            <div class="dealItem">
                <img src="https://static.nike.com/a/images/t_prod_ss/w_960,c_limit,f_auto/953f8c77-48ab-4583-b040-c04a3a93ab32/air-jordan-1-ko-chicago-release-date.jpg" alt="">
                <p class="product-text">Product</p>
                <a href="" class="button1">
                    Add to cart
                </a>
            </div>
            <div class="dealItem">
                <img src="https://www.highsnobiety.com/static-assets/thumbor/g9qmlsrSzNY4d55HaM3HxiNa5Rs=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2021/12/01120911/ama-aj1-2.jpeg" alt="">
                <p class="product-text">Product</p>
                <a href="" class="button1">
                    Add to cart
                </a>
            </div>
            <div class="dealItem">
                <img src="https://www.highsnobiety.com/static-assets/thumbor/Z5LvtQYYpR69OwFjtuFbXF1zboY=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2020/04/02175908/nike-air-jordan-1-mid-light-ash-release-date-price-02.jpg" alt="">
                <p class="product-text">Product</p>
                <a href="" class="button1">
                    Add to cart
                </a>
            </div>
            <div class="dealItem">
                <img src="https://www.highsnobiety.com/static-assets/thumbor/Z5LvtQYYpR69OwFjtuFbXF1zboY=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2020/04/02175908/nike-air-jordan-1-mid-light-ash-release-date-price-02.jpg" alt="">
                <p class="product-text">Product</p>
                <a href="" class="button1">
                    Add to cart
                </a>
            </div>
            <div class="dealItem">
                <img src="https://www.highsnobiety.com/static-assets/thumbor/Z5LvtQYYpR69OwFjtuFbXF1zboY=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2020/04/02175908/nike-air-jordan-1-mid-light-ash-release-date-price-02.jpg" alt="">
                <p class="product-text">Product</p>
                <a href="" class="button1">
                    Add to cart
                </a>
            </div>
            <div class="dealItem">
                <img src="https://www.highsnobiety.com/static-assets/thumbor/Z5LvtQYYpR69OwFjtuFbXF1zboY=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2020/04/02175908/nike-air-jordan-1-mid-light-ash-release-date-price-02.jpg" alt="">
                <p class="product-text">Product</p>
                <a href="" class="button1">
                    Add to cart
                </a>
            </div>
            <div class="dealItem">
                <img src="https://www.highsnobiety.com/static-assets/thumbor/Z5LvtQYYpR69OwFjtuFbXF1zboY=/1600x1067/www.highsnobiety.com/static-assets/wp-content/uploads/2020/04/02175908/nike-air-jordan-1-mid-light-ash-release-date-price-02.jpg" alt="">
                <p class="product-text">Product</p>
                <a href="" class="button1">
                    Add to cart
                </a>
            </div>
        </div>
    </div>

</body>
<footer>
    Shopster &copy; 2022
</footer>

</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/base/_custom.css">
    <link rel="stylesheet" href="./css/pages/_skeleton.css">
    <title>Shopping Cart | Home</title>
</head>
<body>
    <header id="header" class="header">
      <div class="container">
          <div class="flex__navbar">
              <div class="logo"><a href="#">iShop</a></div>
              <div class="shoppping__cart">
                  <ul>
                      <li class="sub__menu">
                          <img src="./css/img/cart.png" alt="">
                         <div id="shopping__list">
                             <table id="cart__content" class="full_width">
                                <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                               <!--<tbody>
                                    <tr>
                                        <td><img src="./css/img/course1.jpg" width="120"></td>
                                        <td>HTML5, CSS3, JavaScript for beginners</td>
                                        <td>$15</td>
                                        <td><a href="#" class="remove">X</a></td>
                                    </tr>
                                    <tr>
                                        <td><img src="./css/img/course2.jpg" width="120"></td>
                                        <td>Cooking Course</td>
                                        <td>$15</td>
                                        <td><a href="#" class="remove">X</a></td>
                                   </tr>
                                </tbody>-->
                             </table>
                             <a href="#" id="clear-cart" class="button u-full-width">Clear Cart</a>
                         </div>
                      </li>
                  </ul>
              </div>
          </div>
      </div>
        </div>
    </header>
    <div id="banner">
        <div class="container">
            <div class="row">
             <div class="banner__container">
                 <div class="banner__content">
                    <h2 id="learn">Learn Something Today</h2>
                    <p class="tagline"> Special Offer, any course $15</p>
                    <form action="#" id="search" method="post" class="form">
                        <input class="u-full-width" type="text" placeholder="What Do You Want To Learn? " id="search-course">
                        <input type="submit" id="submit-search-course" class="submit-search-course">
                    </form>
                 </div>
             </div>
            </div>
        </div>
    </div>
    <section>
    <div class="main-bar">
        <div class="container">
            <div class="row">
                    <div class="four columns icon icon1">
                        <p>20,000 online courses <br>
                        Learn new skills</p>
                    </div>
                    <div class="four columns icon icon2">
                        <p>Expert Instructors<br>
                        Learn with different teach styles</p>
                    </div>
                    <div class="four columns icon icon3">
                        <p>Lifetime access <br>
                        learn at your own pace</p>
                    </div>

         </div>
            </div>
        </div>
</div>
</section>
<section>
<div id="courses-list" class="container">
    <h1 id="heading" class="heading">Online Choice</h1>
    <div class="row__content">
        <div class="four columns" id="grid__column">
            <div class="card">
                <img src="./css/img/images.jpg" class="course-image_1">
                <div class="info-card">
                    <h4>HTML5, CSS3, JavaScript for beginners</h4>
                    <p>Okey Hacker</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="1">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/course2.jpg" class="course-image">
                <div class="info-card">
                    <h4>Cooking Course</h4>
                    <p>Mama Calabar</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="2">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/course3.jpg" class="course-image">
                <div class="info-card">
                    <h4>Guitar for beginners</h4>
                    <p>Okay production</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="3">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/images-bag.png" class="course-image_1">
                <div class="info-card">
                    <h4>Home made bags</h4>
                    <p>Chris Collection</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="4">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/images-model2.png" class="course-image_1">
                <div class="info-card">
                    <h4>Polo & Shirt</h4>
                    <p>Chris Collection</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="5">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/undraw_real-time_sync_o57k.png" class="course-image_1">
                <div class="info-card">
                    <h4>Web Design for beginners</h4>
                    <p>Eddy Peogrammer</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="1">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/course2.jpg" class="course-image">
                <div class="info-card">
                    <h4>Learn to cook nigerian food</h4>
                    <p>1k Fast Food</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="1">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/course3.jpg" class="course-image">
                <div class="info-card">
                    <h4>Build a Music Studio</h4>
                    <p>DMW studio</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="6">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/course1.jpg" class="course-image">
                <div class="info-card">
                    <h4>Modern JavaScript</h4>
                    <p>Sullivan Wisdom</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="7">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/trek3.jpg" class="course-image_1">
                <div class="info-card">
                    <h4>Panasonic Bikes</h4>
                    <p>Gideon Ukaegbu</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="8">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/course6.jpeg" class="course-image_1">
                <div class="info-card">
                    <h4>Fix your home</h4>
                    <p>Bekee Construction</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="9">Add to Cart</a>
                </div>
            </div> <!--.card-->
            <div class="card">
                <img src="./css/img/bg.jpg" class="course-image_1">
                <div class="info-card">
                    <h4>Super Bikes</h4>
                    <p>Chibuzo & Co Sales</p>
                    <img src="./css/img/stars.png">
                    <p class="price">$200  <span class="u-pull-right ">$15</span></p>
                    <a href="#" class="u-full-width button-primary button input add-to-cart" data-id="10">Add to Cart</a>
                </div>
            </div> <!--.card-->
            </div>
    </div>
    </div>
    </section>
    <footer>
        
    <footer id="footer" class="footer">
        <div class="container">
            <div class="row">
                    <div class="four columns">
                            <nav id="primary" class="menu">
                                <a class="link" href="#">For Business</a>
                                <a class="link" href="#">Become an Instructor</a>
                                <a class="link" href="#">Mobile Applications</a>
                                <a class="link" href="#">Support</a>
                                <a class="link" href="#">Help</a>
                            </nav>
                    </div>
                    <div class="four columns">
                            <nav id="secondary" class="menu">
                                <a class="link" href="#">About Us</a>
                                <a class="link" href="#">Work with us</a>
                                <a class="link" href="#">Blog</a>
                            </nav>
                    </div>
            </div>
        </div>
    </footer>
  <script src="./js/cart.js"></script>
</body>
</html>
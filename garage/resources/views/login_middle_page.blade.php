
<!DOCTYPE html>

<html class="no-js" lang="en-US">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Garage Management system</title>
  <link rel="icon" href="https://pushnifty.com/dasinfoau/php/garage/fevicol.png" type="image/gif" sizes="16x16">
  <link href="https://pushnifty.com/dasinfoau/php/garage/public/css/middle_login_page/style.css" rel="stylesheet">

  <link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
  <link rel="stylesheet" type="text/css" href="https://school.pushnifty.com/wp-content/plugins/school-management/assets/css/Bootstrap/bootstrap5.min.css" />
  <!-- <link rel="stylesheet" href="/garagemaster_web/resources/views/auth/responsive.css" type="text/css"> -->
  <script type="text/javascript" src="https://school.pushnifty.com/wp-content/plugins/school-management/assets/js/Bootstrap/bootstrap5.min.js"></script>
  <link href="https://pushnifty.com/dasinfoau/php/garage/public/css/middle_login_page/responsive.css" rel="stylesheet">
  <style id="custom-background-css">
    body.custom-background {
      background-color: #ffffff;
      font-family: 'Poppins';
    }

    .demo_button {
      border-radius: 28px;
      padding: 6px 50px;
      background-color: #EA6B00;
      border: 0px;
      color: #ffffff;
      font-size: 20px;
      text-transform: uppercase;
    }

    a.demo_button {
      text-decoration: none;
    }

    body {
      font-family: 'Roboto' !important;
    }
.offer-banner a {
    display: block;
    width: 100%;
    height: 100%;
    text-decoration: none;
    padding: 12px;
}
    /*new css  */

.site_footer
{
    font-size: 15px !important;
    color: #7E7E7E !important;
}
.login_to_demo_btn
{
  margin-top: -2%;
}
.image_item
{
  font-size:14px;
  font-weight: 600;
}
.wp-image-253
{
    margin-top: -3% !important;
}
.image-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 20px;
    flex-wrap: nowrap;
}

.image-row .item {
    text-align: center;
    flex: 1;
}
.item1
{
    margin-top:15px;
}

.image-row .item img {
    width: 100%;
    max-width: 310px !important;
    height: auto;
}
.image-row .item a {
    display: flex;
    flex-direction: column;
    align-items: center;
    text-decoration: none;
}

.image-row .item .image_item {
    margin-top: 8px;
    font-size: 16px;
    font-weight: 600;
    color: #333;
    display: block;
    text-align: center;
}
#site-footer
{
        padding-bottom: 20px !important;
        padding-top: 20px !important;
    }

@media (min-width: 1200px) {
    .image-row .item img {
        max-width: 180px;
    }
}


@media (max-width: 1199px) {
    .image-row {
        gap: 15px;
    }
    .image-row .item img {
        max-width: 150px;
    }
}


@media (max-width: 991px) {
    .image-row {
        gap: 12px;
        flex-wrap: wrap;
    }
    .image-row .item {
        flex: 0 0 33%;
    }
    .image-row .item img {
        max-width: 140px;
    }
}


@media (max-width: 767px) {
    .image-row {
        gap: 10px;
        flex-wrap: wrap;
    }
    .image-row .item {
        flex: 0 0 45%;
    }
    .image-row .item img {
        max-width: 130px;
    }
    .image-row .item .image_item {
        font-size: 14px;
    }
}


@media (max-width: 575px) {
    .image-row {
        gap: 8px;
        flex-wrap: wrap;
    }
    .image-row .item {
        flex: 0 0 100%;   /* 1 per row */
    }
    .image-row .item img {
        max-width: 120px;
    }
    .image-row .item .image_item {
        font-size: 13px;
    }
}
  @media (max-width: 1204px) {
      .login_to_demo_btn {
          margin-top: 10px !important;
          margin-bottom: 10px !important;
          width: 100% !important;
          display: flex;
          justify-content: center;
      }

      .login_to_demo_btn .demo_button {
          padding: 10px 35px !important; /* reduce width to avoid cutting */
          font-size: 18px !important;
          white-space: nowrap; /* prevents text breaking */
      }

     .left_heading {
        /* display: block !important; */
        text-align: center !important;
        margin-top: 37px  !important;
        width: fit-content !important;
        font-size: 18px !important;

    }

}


.image-row {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 20px;
    text-align: center;
    padding: 10px;
    background-color: #eeeeee;
    border-bottom: 1px solid #7E7E7E;
}


.image-row .item p {
    margin-top: 8px;
    font-size: 16px;
    color: black;
}
.Garage_new
{
  margin-bottom: 5px !important;
}
.Complete_garage
{
        margin-top: -30px !important;
}
@media (max-width: 768px) {
    .image-row {
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .image-row .item img {
        width: 80%;
        margin: auto;
    }

    .image-row .item p {
        font-size: 14px;
    }
  .login_to_demo_btn .demo_button
    {
        margin-top: 10px;
        margin-bottom: -15px;
    }
    .cyber_sale_img
    {
        height: 71px !important;
    }
    .Complete_garage
      {
        margin-top: -5px !important;
      }

}
@media (min-width: 768px) and (max-width: 1024px) {
    .header-inner.section-inner {
        display: flex !important;
        flex-direction: row !important;
        justify-content: space-between !important;
        align-items: center !important;
        flex-wrap: nowrap !important;
        gap: 10px;
    }
    .header-titles-wrapper,
    .login_to_demo_btn {
        width: 33.33% !important;
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }
    .selling_software {
        justify-content: flex-start !important;
        display: flex !important;
        width: 100%;
    }

    .left_heading {
        font-size: 20px !important;
        padding: 10px 18px !important;
        position: relative;
        top: 26px;
    }

    .header-titles img {
        width: auto !important;
        height: auto;
    }

    .login_to_demo_btn .demo_button {
        padding: 10px 30px !important;
        font-size: 18px !important;
    }
    .item1
{
    margin-top:0px !important;
}
}


@media (min-width: 1025px) {

}
  </style>
  <link href="https://pushnifty.com/dasinfoau/php/garage/public/css/middle_login_page/garage-site.css" rel="stylesheet">
</head>

<body class="home page-template-default page page-id-246 custom-background wp-custom-logo wp-embed-responsive singular missing-post-thumbnail has-no-pagination not-showing-comments show-avatars footer-top-hidden reduced-spacing">

  <a class="skip-link screen-reader-text" href="#site-content">Skip to the content</a>
  <header id="site-header" class="header-footer-group" role="banner">

    <div class="row" style="height:71px">
        <a href="https://mojoomla.com/product-category/mobileapps/"><div style="height:71px;background-image: url(CyberSale.jpg);background-repeat: no-repeat; background-position: center;">
        <!--span class="screen-reader-text">Garage Management System</span--></div></a>
      </div>
      <div class="header-inner section-inner">

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 header-titles-wrapper" style="justify-content:flex-start;">


          <div class="header-titles selling_software">

            <div class="site-logo faux-heading"><a href="https://pushnifty.com/dasinfoau/php/garage/login" class="custom-logo-link" rel="home" aria-current="page" style="text-decoration: none;"><span style="background-color: #5840BA;padding: 10px 10px 10px 10px;border-radius: 0px 10px 10px 0px;font-size:xx-large;font-weight:600;letter-spacing:0.5px;" class="left_heading">#1 Selling Software</span></a><!--span class="screen-reader-text">Garage Management System</span--></div>
          </div><!-- .header-titles -->

        </div><!-- .header-titles-wrapper -->

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4 header-titles-wrapper" style="justify-content: center;">


          <div class="header-titles">

            <div class="site-logo faux-heading"><a href="https://pushnifty.com/dasinfoau/php/garage/login" class="custom-logo-link" rel="home" aria-current="page"><img width="100%" height="auto" src="https://pushnifty.com/dasinfoau/php/garage/public/middle_login_page/Logo.png" /></a><!--span class="screen-reader-text">Garage Management System</span--></div>
          </div><!-- .header-titles -->

        </div><!-- .header-titles-wrapper -->

            <!-- <div class="wp-block-buttons" style="margin-bottom: 24px;"> -->
            <div class="wp-block-button is-style-outline login-demo login_to_demo_btn"><a class="demo_button" href="https://pushnifty.com/dasinfoau/php/garage/login" target="_blank" rel="noreferrer noopener" style="font-family: 'Roboto';padding:10px 50px;border:2px solid #5840BA;
; background-color: #5840BA;
;box-shadow:inset 0 0 0 2px #fff">Login to demo</a></div>

      </div>
    </div><!-- .header-inner -->


  </header><!-- #site-header -->


  <main id="site-content" role="main">


    <article class="post-246 page type-page status-publish hentry" id="post-246">


      <header class="entry-header has-text-align-center header-footer-group">

        <div class="entry-header-inner section-inner medium">

          <h1 class="entry-title">Home</h1>
        </div><!-- .entry-header-inner -->

      </header><!-- .entry-header -->

      <div class="post-inner thin ">

        <div class="entry-content">


          <h2 class="spacing-head Complete_garage" style="font-family: 'poppins';font-weight:900;font-size: 44px ;">Complete Garage Management System</h2>

                   <figure class="wp-block-image size-large Garage_new"><a href="https://www.youtube.com/watch?v=Dw6TnXqz8y8" target="_blank"><img loading="lazy"  width="500px" height="330px"  src="https://pushnifty.com/dasinfoau/php/garage/public/middle_login_page/Garage_new_1.png" alt="" class="wp-image-253" style="margin:auto;" /></a></figure>

          <div class="wp-block-buttons"></div>

        </div><!-- .entry-content -->

      </div><!-- .post-inner -->
         <div class="image-row">

        <div class="item">
            <a href="http://mojoomla.com/product/garage-master-app-mobile-app-for-garage-master/">
                <img src="garage_app.png" alt="Garage Master Mobile App">
                <span class="image_item">Garage Master Mobile App</span>
            </a>
        </div>

        <div class="item">
            <a href="https://mojoomla.com/product/school-management-system-for-wordpress/">
                <img src="school_management.png" alt="School Management System for WordPress" >
                <span class="image_item" >School Management System for WP</span>
            </a>
        </div>
		<div class="item">
            <a href="https://mojoomla.com/product/gym-management-system/">
                <img src="gym_management_system.png" alt="GYM Management System for WordPress" >
                <span class="image_item">GYM Management System for WordPress</span>
            </a>
        </div>

        <div class="item">
            <a href="https://mojoomla.com/product/school-master-mobile-app/">
                <img src="school_master_app.png" alt="School Master Mobile App" >
                <span class="image_item">School Master Mobile App</span>
            </a>
        </div>
        
        <div class="item">
            <a href="https://mojoomla.com/product/apartment-management-iphone-app-for-wpams-plugin/">
                <img src="Appartment.png" alt="GYM Management System for WordPress" >
                <span class="image_item">Apartment Management for Mobile App  </span>
            </a>
        </div>

      </div>
      <div class="section-inner">

      </div><!-- .section-inner -->


    </article><!-- .post -->

  </main><!-- #site-content -->


  <footer id="site-footer" role="contentinfo" class="header-footer-group site_footer">

    <div class="section-inner">

      <div class="footer-credits">

        <p class="footer-copyright">&copy;
          Copyright 2025 | <a href="https://pushnifty.com/dasinfoau/php/garage/login">Garage Master | All Rights Reserved</a>
        </p><!-- .footer-copyright -->

      </div><!-- .footer-credits -->
    </div><!-- .section-inner -->

  </footer><!-- #site-footer -->

</body>

</html>
<?php
$favicon = (isset($this->setting_data['favicon']) && !empty($this->setting_data['favicon']))?  base_url().UPLOAD.$this->setting_data['favicon']:ADMIN_ASSETS_PATH."img/favicon.ico";
$mobile = isset($this->setting_data['mobile']) ? $this->setting_data['mobile'] : '';
$phone = isset($this->setting_data['phone']) ? $this->setting_data['phone'] : '';
$email = isset($this->setting_data['email']) ? $this->setting_data['email'] : '';
?>
<!DOCTYPE html>
<html lang="en" current_page="home-page">


<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

  <link rel="canonical" href="index.html" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="msvalidate.01" content="B3FE41A8CF0AE61BF3B3EDDF38510EE5" />
  <meta name="curtime" content="1726108990" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <Meta name="yandex-verification" content="006955606678c517" />
  <!-- <meta name="google-site-verification" content="TsBO4XYAqhy7apuKZcBxJCjECDD6teCYJPBVhIWTkZY" />
  <meta name="description"
    content="Top Pharmaceutical Company India. Pziff Life Care is a leading supplier, exporter & dropshipper of Pharma finished formulation & generic medicine products in Surat - India.">
  <meta name="keywords"
    content="Top Pharmaceutical Manufacturing Company, Leading Pharmaceutical Manufacturing Company, Pharmaceutical Formulation Manufacturers In India, Pharmaceutical Formulation Exporters In India, Pharmaceutical Formulation Suppliers In India,  Pharmaceutical P">

  <meta property="og:title" content="Pharmaceutical Manufacturing Company, Pharma Supplier & Exporter Surat India" />
  <meta property="og:type" content="" />
  <meta property="og:site_name" content="index.html" />
  <meta property="og:description"
    content="Top Pharmaceutical Company India. Pziff Life Care is a leading supplier, exporter & dropshipper of Pharma finished formulation & generic medicine products in Surat - India." />
  <meta property="og:url" content="index.html" />
  <meta property="og:image" content="" /> -->

  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Pharmaceutical Manufacturing Company, Pharma Supplier & Exporter Surat India</title>

  <!-- <noscript id="deferred-styles"> -->
  <!-- Fonts -->
  <link href="<?= ASSETS_PATH; ?>css/font-awesome.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800" rel="stylesheet" />
  <!-- Bootstrap -->
  <link href="<?= ASSETS_PATH; ?>css/bootstrap.min.css" rel="stylesheet" />

  <!-- Slick slider -->
  <link href="<?= ASSETS_PATH; ?>css/slick.css" rel="stylesheet" />
  <link href="<?= ASSETS_PATH; ?>css/slick-theme.css" rel="stylesheet" />

  <!-- magnific -->
  <link href="<?= ASSETS_PATH; ?>css/magnific-popup.css" rel="stylesheet" />


  <!-- Custom Csss -->
  <link href="<?= ASSETS_PATH; ?>css/style.css" rel="stylesheet" />
  <!-- Wordpress CSS -->
  <link href="<?= ASSETS_PATH; ?>css/wp_blogs.css" rel="stylesheet" />
  <!-- / Wordpress CSS -->
  <!-- Responsive Csss -->
  <link href="<?= ASSETS_PATH; ?>css/responsivef7f2.css?x=111" rel="stylesheet" />
  <link href="<?= ASSETS_PATH; ?>css/custom.css?g=45" rel="stylesheet" />
  <!-- </noscript> -->
  <link href="<?= ASSETS_PATH; ?>css/lightbox.css" rel="stylesheet" type="text/css">

  <!-- Favicon -->
  <link rel="shortcut icon" href="<?= ASSETS_PATH; ?>images/favicon.ico" />
  <script src="<?= ASSETS_PATH; ?>js/jquery.min.js"></script>
  <script src="<?= ASSETS_PATH; ?>js/jquery.cookie.js"></script>
  <script async src="<?= ASSETS_PATH; ?>js/bootstrap.min.js"></script>

  <!-- <script>
    (function (i, s, o, g, r, a, m) {
      i['GoogleAnalyticsObject'] = r;
      i[r] = i[r] || function () {
        (i[r].q = i[r].q || []).push(arguments)
      }, i[r].l = 1 * new Date();
      a = s.createElement(o),
        m = s.getElementsByTagName(o)[0];
      a.async = 1;
      a.src = g;
      m.parentNode.insertBefore(a, m)
    })(window, document, 'script', '../www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-93009216-1', 'auto');
    ga('send', 'pageview');

  </script> -->
   
  <!-- <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || []; w[l].push({
        'gtm.start':
          new Date().getTime(), event: 'gtm.js'
      }); var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s), dl = l != 'dataLayer' ? '&l=' + l : ''; j.async = true; j.src =
          '../www.googletagmanager.com/gtm5445.html?id=' + i + dl; f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-K77QC5M');
  </script> -->
 
  <!--- ----------------seo schema tag---------------->
  <!-- <script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "product",
  "brand": "Pziff Life Care",
  "name": "Pharma Company India",
  "image": "https://pzifflifecare.com/admincms/logo/logo.png",
  "description": "Top Pharmaceutical Company India. Pziff Life Care is a leading supplier, exporter & dropshipper of Pharma finished formulation & generic medicine products in Surat - India",
  "aggregateRating": {
    "@type": "aggregateRating",
    "ratingValue": "4.6",
    "reviewCount": "17"
  }
}
</script>
  <script type='application/ld+json'>
{
  "@context": "http://www.schema.org",
  "@type": "ProfessionalService",
  "name": "Pziff Life Care",
  "url": "https://pzifflifecare.com/",
  "logo": "https://pzifflifecare.com/admincms/logo/logo.png",
  "image": "https://pzifflifecare.com/images/we-are-dedicated.jpg",
  "description": "Top Pharmaceutical Company India. Pziff Life Care is a leading supplier, exporter & dropshipper of Pharma finished formulation & generic medicine products in Surat - India",
  "pricerange": "INR",
  "address": {
      "@type": "PostalAddress",
      "streetAddress": "243, Leonard Square, Yogi Chowk",
      "addressLocality": "Surat",
      "addressRegion": "Gujarat",
      "postalCode": "395006",
      "addressCountry": "India",
      "email": "info@pzifflifecare.com",
      "telephone": "+91-7490041245"
     },
     
     "geo": { 
      "@type": "GeoCoordinates",
      "latitude": "21.21436",
      "longitude": "72.887"
     },
  "hasMap": "https://www.google.com/maps/place/Wellona+Pharma+-+Pharma+Tablet,+Capsules+%26+Injection+Manufacturers+India/@21.21436,72.887,15z/data=!4m2!3m1!1s0x0:0x558be77e303ce7bf?sa=X&ved=2ahUKEwibnaGMyNXlAhWf7nMBHbOVAokQ_BIwCnoECA8QCA",
  "openingHours": "Mo, Tu, We, Th, Fr 08:30-17:30",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+91-7490041245",
    "contactType": "customer service"
  }
}
</script> -->


</head>
<input type="hidden" id="base" value="<?=base_url(); ?>" />

<body>
  <!-- Google Tag Manager (noscript) -->
  <!-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-K77QC5M" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript> -->

<header class="header float-100">
    <div class="container">
      <div class="m-search hidden-lg hidden-md"><i class="fa fa-search"></i></div>
      <div class="float-left">
        <a href="<?= base_url(); ?>" class="logo">
          <img src="<?= ASSETS_PATH; ?>images/logo.png" alt="Pziff Life Care">
        </a>
      </div>
      <div class="menu-icon hidden-lg hidden-md"><i class="fa fa-navicon"></i></div>
      <div class="float-right">
        <ul>
          <li><strong><i class="fa fa-envelope"></i> E-mail :</strong> <a href="maito:info@pzifflifecare.com"
              class="t-black"><?= $email ?></a></li>
          <li><strong><i class="fa fa-phone"></i> Call : </strong> +91-<?= $phone ?></li>
          <li><strong><i class="fa fa-mobile"></i> Mob: </strong> +91-<?= $mobile ?></li>
        </ul>
        <!-- <form class="header-search" style="float: left;margin-left: 14px;">
          <i class="search-back fa fa-arrow-left hidden-lg hidden-md"></i>
          <input type="text" class="search txtsearch" value="" placeholder="Search Product" name="" data-provide=""  />
          <input class="search-icon" id="subscribe" value="">
        </form> -->
        <form class="header-search" style="float: left;margin-left: 14px;">
          <i class="search-back fa fa-arrow-left hidden-lg hidden-md"></i>
          <input type="text" class="search txtsearch" placeholder="Search Product" name="txtsearch" />
          <div class="search_data"></div>
          <input class="search-icon" id="subscribe" value="">
        </form>
      </div>
    </div>
</header>

<!-- 
<ul id="ui-id-1" tabindex="0" class="ui-menu ui-widget ui-widget-content ui-autocomplete ui-front" style="display: none; top: 78px; left: 738.963px; width: 337px;">
  <li class="search-item ui-menu-item"><a href="https://wellonapharma.com/product/finished/alphalan" id="ui-id-10" tabindex="-1" class="ui-menu-item-wrapper">Alphalan - finished</a></li></ul> -->
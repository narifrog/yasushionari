<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo('charset'); ?>">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="canonical" href="<?php bloginfo('url'); ?>">
  <meta name="theme-color" content="#F5F5F5">

  <!-- <link rel="apple-touch-icon" sizes="180x180" href="<?php echo IMG_PATH ?>common/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="<?php echo IMG_PATH ?>common/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="<?php echo IMG_PATH ?>common/favicon-16x16.png"> -->
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#F5F5F5">
  <meta name="msapplication-TileColor" content="#F5F5F5">
  <title><?php bloginfo( 'name' ); ?></title>
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Jost:wght@100..900&family=Noto+Sans+JP:wght@100..900&display=swap" rel="stylesheet">
  <link rel ="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <!-- Adobe Font -->
  <script>
    (function(d) {
      var config = {
        kitId: 'qxi2wsv',
        scriptTimeout: 3000,
        async: true
      },
      h=d.documentElement,t=setTimeout(function(){h.className=h.className.replace(/\bwf-loading\b/g,"")+" wf-inactive";},config.scriptTimeout),tk=d.createElement("script"),f=false,s=d.getElementsByTagName("script")[0],a;h.className+=" wf-loading";tk.src='https://use.typekit.net/'+config.kitId+'.js';tk.async=true;tk.onload=tk.onreadystatechange=function(){a=this.readyState;if(f||a&&a!="complete"&&a!="loaded")return;f=true;clearTimeout(t);try{Typekit.load(config)}catch(e){}};s.parentNode.insertBefore(tk,s)
    })(document);
  </script>
  <link rel="stylesheet" href="https://use.typekit.net/twv7nly.css">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  

<div id="wrapper">
  <header class="header" id="header">
    <div class="inner">
      <h1 class="header__logo" data-aos="fade" data-aos-duration="1000" data-aos-easing="easeOutCubic">
        <a class="header__ttl" href="<?php echo home_url(); ?>">ONARI YASUSHI</a>
      </h1>

      <nav class="nav" data-aos="fade" data-aos-duration="1000" data-aos-easing="easeOutCubic">
        <div class="inner">
          <ul class="nav__list">
            <li class="nav__item"><a class="nav__link" href="<?php echo home_url('#work'); ?>">WORK</a></li>
            <li class="nav__item"><a class="nav__link" href="<?php echo home_url('#service'); ?>">SERVICE</a></li>
            <li class="nav__item"><a class="nav__link" href="<?php echo home_url('#about'); ?>">ABOUT</a></li>
          </ul>
        </div>
      </nav>
    </div>
  </header>

  <main id="main" class="main">
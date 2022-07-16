<!DOCTYPE html>
<html lang="id">
    <head>
        <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Home</title>


<link href="assets/img/favicon.ico" rel="shortcut icon" type="image/x-icon">



<link rel="stylesheet" href="gojek.css">
        
    </head>

    <body class="font-body font-normal text-dark p-0 m-0" >
        
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W3VB57"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        

        
        


<!-- navigation-menu -->
<header class="c-header c-header--alternate font-maisonDemi font-medium fixed top-0 z-50 w-full py-4 sm:py-5 lg:py-10 xl:py-8 transition duration-300 delay-100 ease-in-out"
  data-module="navigation"
  x-data="{...dropdownHeader(), ...dropdownLang()}"
  x-bind:class="{'c-header--active': isDropdownHeader}">
  <div class="container mx-auto flex justify-between items-center">
    <!-- logo -->
    <span>
      <a href="index.php">
        <img src="assets/img/Paljaya-logo.png" width="300px" height="70px" viewBox="0 0 168 40" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
      </a>
    </span> <!-- end of logo -->
    <!-- burger menu -->
    <div class="o-burger relative w-4 h-4 z-10 xl:hidden">
      <span class="o-burger__item o-burger__item--top absolute left-0 w-full transform transition duration-100 ease-out top-0 bg-black rounded-r4"></span>
      <span class="o-burger__item o-burger__item--middle absolute left-0 w-full transform transition duration-100 ease-out bg-black rounded-r4"></span>
      <span class="o-burger__item o-burger__item--bottom absolute left-0 w-full transform transition duration-100 ease-out bottom-0 bg-black rounded-r4"></span>
    </div> <!-- end of burger menu -->
    <!-- menu item -->
    
  </div>
</header> <!-- end of navigation-menu-->


<script>
  function dropdownLang() {
    return {
      isDropdownLangOpen: false
    }
  }

  function dropdownHeader() {
    return {
      isDropdownHeader: false
    }
  }
</script>

        

        
        



        

        <main>
            



<section class="c-hero-intro h-screen w-full relative onlyMobile:transition-height onlyMobile:duration-300 onlyMobile:delay-300" data-theme="dark" data-module="sal" data-cy="c-hero-intro">
    <div class="w-full h-full overflow-hidden relative">
            <div class="relative z-10 w-full h-full transform transition-opacity duration-500 c-hero-intro__video-thumbnail" data-module="hero-intro">
                <div class="u-lazy">


                    <div class="u-lazy__placeholder-grayed"></div>
                </div>
            </div>
            <iframe title="Gojek - The Flow" class="absolute w-140p h-140p -top-20p -left-20p transform scale-300 md:scale-200 lg:scale-100 onlyTabletLgPortrait:scale-300 xl:scale-100 c-hero-intro__video-background js-hero-intro__video lazy" width="560" height="315" 
            data-src="https://www.youtube.com/embed/VOUFt7D0Pn8?enablejsapi=1&version=3&controls=0&rel=0&autoplay=1&loop=1&mute=1&playlist=VJH5FJ5kaJA&playsinline=1" frameborder="0" allow="autoplay; encrypted-media;" allowfullscreen data-player-status=""></iframe>
        
    </div>

    <div class="absolute top-0 z-20 w-full h-full c-hero-intro__background-overlay">
        <div class="container mx-auto h-full relative">
            <div class="relative md:absolute bottom-0 h-full md:h-auto w-full md:w-3/4 flex items-end">
                <div class="mb-35 xl:mb-30 w-full" data-sal="slide-up" data-sal-duration="850" data-sal-delay="500" data-sal-once="true">
                    <h1 class="font-maisonExtendedExtraBold 
                        font-extrabold 
                        tracking-normal xl:tracking-title
                        text-size_18x md:text-size_24x xl:text-size_36x 
                        leading-height_52x md:leading-height_64x xl:leading-tight
                        text-white">Sistem </br>Monitoring </br>Anggaran </br> </h1>
                        <div class="mt-8 sm:mt-8 xl:mt-10">
                            <a href="login.php"  data-gtm="2021_homepage_marketing_gojekxpubgm_knowmore" >
                                <button class="btn btn-solid btn-solid--light">Login disini</button>
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</section>






        

        <!-- modern browsers -->
        <script type="module" src="https://d1j87w3j7cc3a6.cloudfront.net/prime/static/prime/js/main.js" defer></script>
        <!-- old stuff -->
        <script nomodule src="https://d1j87w3j7cc3a6.cloudfront.net/prime/static/prime/js/nomodule/main.js" defer></script>

        

        

        <!-- Deferred styles -->
        <noscript id="deferred-styles">
            <link rel="stylesheet" type="text/css" href="https://d1j87w3j7cc3a6.cloudfront.net/prime/static/prime/css/styles.css" />
        </noscript>
        <script>
            const loadDeferredStyles = function() {
                let addStylesNode = document.getElementById('deferred-styles');
                let replacement = document.createElement('div');
                replacement.innerHTML = addStylesNode.textContent;
                document.body.appendChild(replacement);
                addStylesNode.parentElement.removeChild(addStylesNode);
            }

            let raf = requestAnimationFrame || mozRequestAnimationFrame || webkitRequestAnimationFrame || msRequestAnimationFrame;
            if (raf) {
                raf(function() {
                    window.setTimeout(loadDeferredStyles, 0);
                });
            } else { 
                window.addEventListener('load', loadDeferredStyles);
            }
        </script>
    </body>
</html>
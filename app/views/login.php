
<?php
session_start();
require_once('../controller/usersController.php');
if(isset($_POST['submit'])){
  $loginUser = new UsersController();
  $loginUser->auth();
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <!-- font awsome library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lustrio Hotel</title>
</head>
<body class="bg">
<!-- navbra -->
<nav class=" flex fixed  bg-black justify-center items-center text-center   pr-20 w-full sticky top-0 ">
      <!-- Left Navigation -->
      <div class="hidden sm:flex">
      <a href="home.php" class="mx-2 text-white hover:bg-gray-700 hover:text-white px-3 py-4 rounded-md text-sm font-medium" >Reception</a>
  
  <a href="aboutus.php" class="mx-2  text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-4 rounded-md text-sm font-medium">About Us</a>
  <a href="reservation.php" class="mx-2  text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-4 rounded-md text-sm font-medium">Reservation</a>
        <!-- <a class="mx-2">LINK ONE</a>
        <a class="mx-2">LINK TWO</a> -->
      </div>
      <!-- Logo -->
      
      <div class="mx-12  ">   <img class="hidden h-16  w-auto lg:block cursor-pointer " src="img/logo.png" alt="Your Company"></div>
      <!-- Right Navigation -->
      <div class="hidden sm:flex">
      <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['ClientName'] === 'admin'): ?>
        <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./dashboard.php">Welcome,<?php echo $_SESSION['ClientName']; ?>!</a>
        <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./logout.php">Log Out</a>
        <?php elseif(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['ClientName'] !== 'admin'): ?>
          <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./profil.php">Welcome,<?php echo $_SESSION['ClientName']; ?>!</a>
        <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./logout.php">Log Out</a>
        <?php else: ?>
          <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./register.php">Sign Up</a>
          <a class="mx-2 hover:bg-gray-700 text-white hover:text-white px-3 py-4" href="./login.php">Sign In</a>
        <?php endif; ?>
      </div>

      <div class="absolute y-0 right-1 top-1 sm:hidden">
          <!-- Mobile menu button-->

          <div class="block lg:hidden ">
                <button
                    id="nav"
                    class="flex items-center px-3 py-2 border-2 rounded text-white border-white hover:text-yellow-700 hover:border-yellow-700 mobile-menu-button">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
        </div>
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">

<div class="space-y-1 px-2 pt-10 pb-3">
  <!-- <a href="#"> -->
  <a href="home.php" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Reception</a>
 
  <a href="aboutus.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">About Us</a>

  <a href="reservation.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Reservation</a>

  <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['ClientName'] === 'admin'): ?>
  <a href="dashboard.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Welcome <?php echo $_SESSION['ClientName']; ?>!</a>

  <a href="logout.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Log Out</a>
  <?php elseif(isset($_SESSION['logged']) && $_SESSION['logged'] === true && $_SESSION['ClientName'] !== 'admin'): ?>
    <a href="profil.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Welcome <?php echo $_SESSION['ClientName']; ?>!</a>

<a href="logout.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Log Out</a>
  <?php else: ?>
    <a href="register.php" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Sign Up</a>

<a href="login" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Sign In</a>
    <?php endif; ?>
</div>
</div>
    </nav>


  <!--login-->
  <form class="flex items-center justify-center h-screen" action=""  method="post">
    <!-- Login Container -->
    <div class="min-w-fit flex-col border bg-blue-100 bg-opacity-90 px-6 py-14 shadow-md rounded-[4px] " >

      <div class="mb-8 flex justify-center">
       <div class="text-2xl text-black "> Login and live a wonderful Chrismas with us!</div>
      </div>
      <div class="flex flex-col text-sm rounded-md ">
        <input class="mb-5 rounded-[4px] border p-3 hover:outline-none focus:outline-none hover:border-yellow-500  " type="text" name="Email" placeholder="Email " />
        <input class="border rounded-[4px] p-3 hover:outline-none focus:outline-none hover:border-yellow-500" type="password" name="Password" placeholder="Password" />
      </div>
      <button class="mt-5 w-full border p-2 bg-gradient-to-r from-gray-800 bg-gray-500 text-white rounded-[4px] hover:bg-slate-400 scale-105 duration-300" value="submit" name="submit" type="submit">Sign in</button>
      <div class="mt-5 flex justify-between text-lg text-black ">
        <div class="mt-5 flex justify-between text-lg text-black bg-gradient-to-r from-blue-900  ">
        <a href="#">Forgot password?</a>
        </div>
        <div class="mt-5 flex justify-between text-lg text-black bg-gradient-to-r from-blue-900  ">
        <a href="#">Sign up</a>
    </div>
      </div>
      <div class="flex justify-center mt-5 text-sm">
        <p class="text-black">or you can sign with</p>
      </div>
      <div class="mt-5 flex justify-center gap-3    ">
        <img class="h-7 grayscale cursor-pointer hover:grayscale-0 scale-105 duration-300" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAFbUlEQVRoge1ZXWwUVRT+zszs2nZbiUARui2b1lCgJAiWFAMRIoEHFYOtqSL4wAMQGyDxwUQMmiAhSh+NbRFN1AeaQGpacZUHTIjRItLQpCApPw0GdttSUihIty3dnZnjw5T+7Nz52c4WH+j3NHvvd875zt479+cMMI1pPNmgdDjhSshDaqiMSX8ZjFIGLQIwD0D2CCUGoJvAV0FoJcinM5feaKH90L3G9pTA4Ka8Al1SdgF4F0AwRfNOAEcl0mqzGrs6J6thUgn0V87NheY/SIxtAPyTDT6COAPfsqp+8nS4+06qxiknEKsIbQHzlwBmpmrrgLsM3p3TFD2WipHrBHhnqS/W21tHwPbUtbkHA0eyc3P30NetCTd8Vwnw63lZA4r8A0CveJPnEoyTAU2tpHD3oBNVcvS1s9T3WMUDAOHVAVk5wZVLHN8vxwRivb11j1X8IxDWx9T+L5xpNoiVh7YCfDR9qlIHE2/OaYwet+q3TOBBeXCWBPkKgNlTosw9+nRVXWi1xFpOISL5M/z/4gFgpiz7PrXqFI7AYEUwX2f5Ohw2KXnZGiirXoO0uAzSrLkAAL2vB3p7C9TmMLSLzV6Ej0dcVpQFmQ3/RJI7FBFbZ3k3bMRLwSL4q6ohl5SZ+/KKIOUVQVm/GVp7C+I1H0DvuelFPAD4NVWtAvBRcodpBHg/pIEL828CyBd5kpe8iKf2fgMKPO0qsnalFQ/3vQkwp6jZhK6AEglRA7TxjaYRGLoQWgmwULwULJooPhFH4lQ91D9OQI9cNTgFxVDWlsO3YQv07usYrt6RDvEAEBxK5JcCnS22CRhHYvHi5K+qHhXPfT14eHAb9BuXJ3D0jjbEO9qg/noMfO82+EGfK3WBRmOaDVSELDk6SesA2CegM1aI5MvPvzQ25xNxofgJfm5a900WBJQmt5mWUQIVi4yV1RtHnxOn6m3FTxUYWJjcJlqF5omMpcVjK476+4/CAI+mgRX0rusY2rPOlj++TTCdTNpEG1m2oA0069nRZ4522Aq1Ao3sFR6Qk9wg3AemDPrE1Wj8P+zmJRZBlEAMgtsW370NChYBAKhgAbijzWQoCi4tfAGZnzcZPvp6UhInQL/Jv4B0S2SpXx5bvZS15a4jKmvGuHp7iw3TFUzaTAkw+JrIUm0Ojz77NmyBVFjiGE0qXALfhnfGfJwJW3IHKkKO04eAq6YYpgbCeZGxdrEZWvs544fPj4x939kmIRWWIOPj7wHFZ9hfOgvt7z9tBTqBYdYm2Afk01YO4nV7wbF/Dd7Mucis/gn+7QcgFS8HZQSAjCxIxcvh334AmYdOgJ6ZYwSO3Uf88F5P4gGAiE3arA5zNwAUiJzIJSuN81D2DFdBOXYfw4d2QPM6/5kjgWXRwuRqnnkEDEK9lR+t/RwefrgJ2qW/HGNql84aXO8vLyBRvagU6e1Cs3Q1lFUbIZWUgWYbmyTfuWVcaM6EPc/5cRiWFP25rIbOruQOyztxf/n8wwS8ly4FXkDENYHG6B5Rn+WdWFf0fQBSrlVOAe5qCc3yTmyZwIyGzj4GC7N+nGCgyq7oa1vYymmKHmPgSPpluQOBa3OaIg12HMfKXLYS2cVE4vPz1OKXrHvR951IjglQA7TsRGIrGCfTo8sVfg6o6lv0G1QnomMCAEDh7sHAnNw3GPjKuzaHWODawL1IuZvKtMFPEf0VBW8TUw3SXrWjXgbvcprzyXA1AuOR0xg9rkNbREx1AIZTtRdgmIhrNEVblKp4wOtHvsr8oK5KuwFshcXZyQZREI5Ksl4r2mHdIj2fWfdDGmrLX6GTtI6A0pHqQRATPrNSJ4GvMXCeiE9nLY22puMz6zSm8aTjPy9i6LxlaK5BAAAAAElFTkSuQmCC">
        <img class="h-7 grayscale cursor-pointer hover:grayscale-0 scale-105 duration-300 " src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAC40lEQVRoge3Yz4sXdRzH8Ye7pG4SsgcFpVo3kbR1PdWhLgWpl04evHmwv0FDBSMPpVR0j252kJaQWEIvIiEoopcoVsEfCf4IfyBIoZW47Xb4zPodvs5nPvPd78x6aJ7wOcx75vN6v94zn/nM5zO0tLS0tPTBogY0R7ARo1iWxR7hGqZwo4GcfTOGrwSTs4n2G77EhufitIv1mMSMtPHuNoMf8PqCu8YA9uNxRbNl7R/syzQXhGU4XoPx7vajzjvTqPkzDZifa6ebLGJAM3e+6Ek0Mpz2dyV6gjexGd9mx1VNPsFhvI+3MN11fl9VU1W/A+vxCxbnYlMYzx2PCdPjEM4KU+of2bnlWIu38Rd242Ku7wW8kTt+jE24XNFfkknP3sWzdYnjXIH+0brExxTP85fqSoArBfr/qvCxq/KyfKh4qI1gsLrHKIN4pSA+gJ016EeXB5/VIZ5xMJLjSr/Cr0aE/8Zwv+I5hjPNolwvl3VMDaHxSPwEHvTmsZQHONmjB6QLGI3Er6YczYPYcIl5QLqAlyLxO0k7vXM7El9e1ilVwHQk/mLSTu/E1kAxD0gXcD8SX5e00zuxfcG9sk6pAu5G4u9V6NsLg3g3cq60gBQrxXdb2/oR7mJ7JMcMVvQrfjEifhOr+xUX5vnfIzmmatD3eUR8Fj9LTHMJXsOvJfqH+tB+yqjOev0mtmIPHmaxP4W9wqoeNFfj46xvzPy0sN6qhaM6G5G9wuJui7BizI/XKXxSonMgu6bKX4yJuswTnsKjnPiOLL6rIPGWEp2tFYzPCk+3trs/x0e5BLd0Pjwf4BjO42ssKdEYUu3u76rbPGHYTOSSfDFPndiqc64d0cwvT7AUp3LJvhFWi4vxgmrTalkBPyl/grUwhO8Kks8IG/YUsQKOCDdoQVgkvBP5F3vW/Ap4KIz5xoZNGWvwvc534nqFPtd15vkJYdf33BnBp8J/nxTvZNfWPk22tLS0tPz/+A/3Y3+ksla8tgAAAABJRU5ErkJggg==">
        <img class="h-7 grayscale cursor-pointer hover:grayscale-0 scale-105 duration-300" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAABmJLR0QA/wD/AP+gvaeTAAAFEklEQVRoge2ZW2gcVRjH/2c22SQ1aZLNRXNraFATvKFs0QdfTPTFiKCIQUwFwZQYkqIY8cELrKLFF2+0G4yVgpBgm4q0oO2DJvpgVUICKohtUFuSzcZoLrK7uezOzPn7kLRddmZ2ZjJJfGg+WHZ2zjnf/P7nfOc7c84CO7Zj17aJTfEyRF/TSvxuAM0SCIJsAlFFsJAECCQoGQVwgeQ4wZFL04FRhIT0+mhPAm77dLlO12Q3yf0kawCAJEgAWPte+xAmZRFKDug5Ijx9oCyyrQJuHIpX+JN4k8DTJPwWgNng0+4jBfKY7lNfi3ZWz225gFsHEk9KicMQDGQHdASfXmeeFD3RnorjWyIg2M/c1cJEn5SiwwjiGf5qHaB/JrfyIDqFumkCgv3ctXLd0mckHtxS+Kvtz/jy5ePRzuplOzbFAXzuNsMDQKu2itMI/er3LGC1MNG3zfBrZVI8UF5S+oEdX9YQumUw0U6JAS/wCoiWej/urc5FfbGCkjwFKZ1QdSKWIn6MpvDxTyuW7SX5xEJvzQnXApo+iZUJRTkPsHyj8HdW+vBecyH2FvssO+lcJIXHPl+08E0AWEhRNMZfNE+xliGkKOKQF/i7Kn0Yenh3Vvh0yxJ2gRzK1y05zW7eMbBcu75IbQjeJ4jD9xfB73OWpR3MmY7St6N7HAtQKXvoYYVtbchDbZFtfkgTkBUeJP1S0bvM2uYY7oSokIl2L9mmuS7XFHQypqN3OI5f/lavkKuSdvBrzyCfwhBfRZvQswpo2hu/h0TtRuFJ4PYKY78AwAvDcXw3lbRtb7FC1+y+GAnGgNF0n2bj3OwFniTKC4xu/1qSOLdReF7+LVsy/ZoJ2Od1kSryGyfvZEwHPcADACWCtgIkebMXeJJQTJJPPCm9wRMgZGOmX0OwkqjyAr9+aTBJR9kmax1SVGX6NQmh9W3ghuEtFMArPACwKNOj2Qi4cvzD/oAh5s1C6L76PEw8e73h/snfVvDS14tO4E1H15jviATJgBN4ACjOE6aTNtNyFaAk3zjg0bjmGJ5kPLO92SSecQpPsy5xaRPzmlN4CGDGVgCICa8T1o39vqA6ggcACVywFUBwzFW28ACvSeDPRc0R/Pr1WKYP4yQGR4zA1pP6ua9iyLncDetlRx8qMWw0fp5V8f5o/EodAFjViKQmncKDCkZsBVyaDozuqVqYAllnB08CZ/9YNZR9xBKIDAWzSzpOnV92M2EzO29SlQ3jmbzGORASEpKDTuCtyqzMAzwADJodRZq+tOs5Ikwi5eWVejPhCSZTqhY282sqYPpAWQTksc2CB4x1HMOTkMRRvNU47VgAANDvf4XknFv47CHkHp7EvC50d3tiAIh0FC+Q4qBbeLvFzSU8CHYh1Gh56Jt14xrtqThOoP9/hA/rb9x0MptP2533TGVlN8FTTuEtRbiEB/ClrkSet+OzPzpoE7ovT7aDPOPi4Wb8zuHJLzRlVxtCzZp3AQCindXLswU3PELBD+3h3Wei9PYEw5ov8ihC9ifTgNnrtJV1CnUO6Aq8M/2tAhyRRPlGFrIs8P8Q7LaL+Uxzfvq0bgu9NSeSSTaR7AOQdLMWWC1SEjiiKckmt/CAmxFIs/jLtfMAusvenTqkaegB2E6iziX8FIABVdXDVouUE9ucv1lDVHYXRPaRsoUSwe+fqWoN5Iv80gKfIgTw74qUwxeXFztOz31DcowCI6psGN+Mv1l3bMeudfsPP8EkRZOLDr8AAAAASUVORK5CYII=">
        <a class="bg-gray-400 h-7 w-7 rounded-3xl text-center grayscale cursor-pointer hover:grayscale-0 scale-105 duration-300 " href="">...</a>
      </div>
    </div>
</form>

  </body>
  </html>
<nav class="bg-black  w-full sticky top-0 ">
    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
      <div class="relative flex h-16 items-center justify-between">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->

           
        </div>
        <div class="flex flex-1 items-center justify-center sm:items-stretch ">

          <div class="hidden sm:ml-6  sm:block">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="reception.php" class=" text-white px-3 py-10 rounded-md text-sm font-medium" aria-current="page">Reception</a>
  
              <a href="aboutus.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-10 rounded-md text-sm font-medium">About Us</a>
              
              <div class="flex flex-shrink-0 sm:justify-center py-4 px-4">
                <!-- <img class="block h-8 w-auto lg:hidden" src="img/logo.png" alt="Your Company"> -->
                <img class="hidden h-16 w-auto lg:block cursor-pointer " src="img/logo.png" alt="Your Company">
              </div>
              <?php if(!isset($_SESSION['Email'])){
      ?>
              <a href="login.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-10 rounded-md text-sm font-medium">Take a Reservation</a>
              <?php } else { ?>
                <a href="reservation.php" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-10 rounded-md text-sm font-medium">Take a Reservation</a>
                <?php }  ?>
            </div>
          </div>
        </div>


          <!-- Profile dropdown -->

          <div class="relative ml-3">
 
          <?php  
          if(!isset($_SESSION['Email'])){
            ?>
            <div>
            <a href="./login.php">
              <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"  aria-expanded="false" aria-haspopup="true" >
                <span class="sr-only">Open user menu</span>
               
                <!-- <img class="h-8 w-8 rounded-full" src="img/logo.png" alt=""> -->
              </button>
              <button><i class="fa-solid fa-user text-white"></i></button> </a>
            </div>
            
      
              

               <button class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"  aria-expanded="false" aria-haspopup="true" type="button"></button>
   
          

               <?php  
          }else{
  $exitUser = new usersController();
  $data = $exitUser->getOneUser();
  ?>
             <button style="color:white">  <a href="./profil.php"><?php echo $data['ClientName']; ?></a></button>

             <button style="color:white" type="button"><a href="./logout.php">Deconnexion</a></button>
                    
                   
                    <?php }?>



<!--^copied-->


                    <form class="container-fluid justify-content-start">
                <?php if(!isset($_SESSION['Email'])){
      ?>
      <button class="btn btn-outline-success me-2" style="color:white;" type="button"><a href="register.php">Sign up</a></button>
      <button class="btn btn-sm btn-outline-secondary" style="color:white;" type="button"><a href="login.php">Sign in</a></button>
            
      <?php
      
      } else { ?> 
    <?php $req = $db->query("SELECT * FROM `clients`");
                            while($data =  $req->fetch()):
                              if($data['Email']==$_SESSION['Email']){ ?>
                                <button class="btn btn-outline-success me-2" style="color:white;" type="button"><a href="profil.php"><?php echo $data['ClientName'] ?></a></button>
                    
                            <?php  }
    ?> <?php endwhile; ?> 
                    
                    <button class="btn btn-outline-success me-2" style="color:white;" type="button"><a href="logout.php">Déconnexion</a></button>
                    
                </a>
    <?php
      }
    ?>
                  </form>
                
          </div>




    
        </div>
      </div>
    </div>

    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden" id="mobile-menu">

      <div class="space-y-1 px-2 pt-2 pb-3">
        <!-- <a href="#"> -->
        <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>
       
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
  
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
  
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
      </div>
    </div>
  </nav>
  ///////////////////////
  <nav class="flex items-center justify-between flex-wrap bg-black py-4 lg:px-12 shadow border-solid border-t-2 bg-black  ">
        <div class="flex justify-between lg:w-auto w-full lg:border-b-0 pl-6 pr-2  pb-5 lg:pb-0">
            <div class="flex items-center flex-shrink-0  mr-16">
            <img class="hidden h-16 w-auto lg:block cursor-pointer " src="img/logo.png" alt="Your Company">
            </div>
            <div class="block lg:hidden  ">
                <button
                    id="nav"
                    class="flex items-center px-3 py-2 border-2 rounded text-blue-700 border-blue-700 hover:text-blue-700 hover:border-blue-700 mobile-menu-button">
                    <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title>
                        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"/>
                    </svg>
                </button>
            </div>
        </div>
    
        <div class="menu w-full lg:block flex-grow lg:flex lg:items-center lg:w-auto lg:px-3 px-8 mobile-menu hidden" >
        <div class="text-md font-bold text-indigo-100 lg:flex-grow">
    
                <a href="profil.php"
                   class="block mt-4 lg:inline-block  lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                   Create Tasks
                </a>
        
                    <a href="login.php"
                   class="block mt-4 lg:inline-block  lg:mt-0 hover:text-white px-4 py-2 rounded hover:bg-blue-700 mr-2">
                   Create Tasks
                </a>
  
            </div>
            <!-- This is an example component -->
            <?php if(isset($_SESSION['logged']) && $_SESSION['logged'] === true): ?>
            <div class="relative mx-auto text-gray-600 lg:block hidden">
            <div class="flex ">
   <!-- check if user is logged in -->

    <div class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Welcome, <?php echo $_SESSION['ClientName']; ?>!</div>
    <a href="logout.php" class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Logout</a>
<?php else: ?>
    <a href="register.php" class="block text-md px-4 py-2 rounded text-white ml-2 font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">Sign up</a>
    <a href="login.php" class=" block text-md px-4  ml-2 py-2 rounded text-white font-bold hover:text-white mt-4 hover:bg-blue-700 lg:mt-0">login</a>
<?php endif; ?>
            </div>
        </div>
    
    </nav>
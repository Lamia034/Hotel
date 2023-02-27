

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- tailwind  -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="<?php echo BaseUrl;?>assets/css/style.css" rel="stylesheet" type="text/css">
    <!-- font awsome library -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Pestana CR7</title>
</head>
<body class="bg-gradient-to-r from-cyan-300 to-blue-500 ">
<?php require_once VIEWS . 'header.php' ?>


  <div class="mx-auto w-full max-w-[550px]">
<form method="POST" action="<?php echo BaseUrl; ?>rooms/addRoom" enctype="multipart/form-data" >

  <h2 style="color:white;">ADD Product</h2>
    
  
   
 
    <label for="RoomNumber">Room Number</label> <br>
    <input type="number" name="RoomNumber"  placeholder="Room number"  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">   <br>
    <label for="RoomPrice">Room Price</label><br>
    <input type="number" name="RoomPrice" placeholder="Room Price"  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"><br>
    <label for="RoomType">Room Type</label><br>
    <input type="text" name="RoomType" placeholder="Room Type"  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"><br>
    <label for="SuiteType">Suite Type</label><br>
    <input type="text" name="SuiteType" placeholder="SuiteType"  class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"><br>
    <label for="RoomImg"> IMAGE</label><br>
    <input type="file" name="RoomImg" ><br>
    <button type="submit"  name="add" value="add" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none mt-2">Add Room</button>
    

  
   </form>
  </div>





<!--links-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php BaseUrl ?>assets/js/script.js"></script>


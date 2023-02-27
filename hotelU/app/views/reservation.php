

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


  <!-- start -->
<!-- component -->
<div class="flex items-center justify-center p-12">
  <!-- Author: FormBold Team -->
  <!-- Learn More: https://formbold.com -->
  <div class="mx-auto w-full max-w-[550px]">
    <form id="reservation-form" action="<?php echo BaseUrl ?>reservations/addReservation" method="POST">
      <div class="-mx-3 flex flex-wrap">
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
              for="ClientName"
              class="mb-3 block text-base font-medium text-[#07074D]">
              Full Name
            </label>
            <input
              type="text" name="ClientName" id="fName" placeholder="Full Name"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
            />
          </div>
        </div>





        <div  class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
          <label for="room-type"  class="mb-3 px-20 block text-base font-medium text-[#07074D]">Room Type:</label>
<select id="room-type" onchange="handleRoomTypeChange()" name="RoomType" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3.5 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
<option value="single" onclick="handleRoomTypeSelection()">Single</option>
    <option value="double" onclick="handleRoomTypeSelection()">Double</option>
    <option value="suite" onclick="handleRoomTypeSelection()">Suite</option>
</select>
    </div>
    </div>

      </div>


      <div id="suite-type-container" class="w-full px-3 sm:w-1/2" style="display: none;">
      <div class="mb-5">
    <label for="suite-type" class="mb-3 px-20 block text-base font-medium text-[#07074D]" >Suite Type:</label>
    <select id="suite-type" onchange="handleRoomTypeChange()" name="SuiteType" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3.5 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" >
    <option value="--">--</option>
      <option value="standard" onclick="handleRoomTypeSelection()">Standard</option>
      <option value="junior"onclick="handleRoomTypeSelection()">Junior</option>
      <option value="presidential" onclick="handleRoomTypeSelection()">Presidential</option>
      <option value="penthouse" onclick="handleRoomTypeSelection()">Penthouse</option>
      <option value="honeymoon" onclick="handleRoomTypeSelection()">Honeymoon</option>
      <option value="bridal" onclick="handleRoomTypeSelection()">Bridal</option>
    </select>
  </div>
    </div>




      <div class="mb-5">
        <label
        for="guest-count" class="mb-3 block text-base font-medium text-[#07074D]" >
          How many guest are you bringing?(don't fill it if you're alone)
        </label>
        <input
          type="number"
          name="GuestsNumber"
          id="guest-count"
          placeholder="5"
          min="0"
          onchange="handleGuestCountChange()"
          class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"/>
      </div>

<!--every single's informations-->
      <div class="mb-5">
      <div id="guest-info-container" style="display:none;">





      </div>

    </div>

<!--end every single's informations-->
      <div class="-mx-3 flex flex-wrap">
        <?php if(isset($_SESSION['error'])): ?>
	<p class="text-red-600"><?php echo $_SESSION['error']; ?></p>
<?php unset($_SESSION['error']); endif; ?>

        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
            for="Arrive"
              class="mb-3 block text-base font-medium text-[#07074D]"
            
            >
            Reservation Date:
            </label>
            <input type="date" name="Arrive" id="reservation-date"   min="<?= date('Y-m-d') ?>"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
          </div>
          
        </div>
        <div class="w-full px-3 sm:w-1/2">
          <div class="mb-5">
            <label
            for="Leave"
              class="mb-3 block text-base font-medium text-[#07074D]"
            >
            Leaving Date:
            </label>
            <input type="date" name="Leave" id="reservation-date"
              class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
          </div>
          
        </div>
        </div>


   
        <label for="price-input">Price:</label>
      <input value="3000" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-black outline-none focus:border-black focus:shadow-md" type="text" id="price-input" name="ReservationPrice"  readonly>
      <div>
        <button
          class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none" name="add" value="add">
          Submit
        </button>
      </div>
    </form>
  </div>
</div>





<?php require_once VIEWS . 'footer.php' ?>

<!--links-->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="<?php echo BaseUrl; ?>assets/js/script.js"></script>


//navbar 

const btn = document.querySelector('button.mobile-menu-button');
const menu = document.querySelector('.mobile-menu');
btn.addEventListener("click", ()=> {
menu.classList.toggle("hidden");
});


//animation
const options = {
    root: null,
    rootMargin: '0px',
    threshold: 0
  };
  
  const callback = (entries, observer) => {
    entries.forEach((entry, index) => {
      if (entry.isIntersecting) {
        if (index % 2 === 0) {
          entry.target.classList.add('fade-in-right');

        } else {
          entry.target.classList.add('fade-in-left');

        }
        observer.unobserve(entry.target);
      }else{
        entry.target.classList.remove('fade-in-right');
        entry.target.classList.remove('fade-in-left');
      }
    });
  };
  
  const observer = new IntersectionObserver(callback, options);
  
  document.querySelectorAll('.fade-in-scroll').forEach(element => {
    observer.observe(element);
  });
  
  

  

  //dynamic form


  function handleRoomTypeChange() {
    const priceInput = document.getElementById("price-input");
    const roomType = document.getElementById("room-type").value;
    const suiteTypeContainer = document.getElementById("suite-type-container");
    const guestCountInput = document.getElementById("guest-count");
  
    if (roomType === "suite") {
      suiteTypeContainer.style.display = "block";
      guestCountInput.max = 6;
    } else {
      suiteTypeContainer.style.display = "none";
      guestCountInput.max = roomType === "single" ? 1 : 2;
    }
  
    handleRoomTypePrice();
    handleGuestCountChange();
  }
  



  
  function handleRoomTypePrice() {
    const roomType = document.getElementById("room-type").value;
    const suiteType = document.getElementById("suite-type").value;
    const priceInput = document.getElementById("price-input");
    
    // const priceDisplay = document.getElementById("price-display");
    let price;
  
    if (roomType === "single") {
      price = 3000;
    } else if (roomType === "double") {
      price = 4000;
    } else if (roomType === "suite") {
      if (suiteType === "standard") {
        price = 10000;
      } else if (suiteType === "presidential") {
        price = 13000;
      } else if (suiteType === "penthouse") {
        price = 15000;
      } else if (suiteType === "honeymoon") {
        price = 17000;
      } else {
        price = 20000;
      }
    }
  
    priceInput.value = price;
    // console.log(roomType);

    // console.log(suiteType);
    priceInput.value = `${price} dh`;
  }
  

    function handleRoomTypeSelection() {
  // console.log('rr');
    handleRoomTypePrice();
  }



  function handleGuestCountChange() {
    const guestCount = document.getElementById("guest-count").value;
    const guestInfoContainer = document.getElementById("guest-info-container");
    guestInfoContainer.innerHTML = "";
    for (let i = 0; i < guestCount; i++) {
      const guestNumber = document.createElement("p");
      guestNumber.textContent = `Guest ${i+1}`;
      guestInfoContainer.appendChild(guestNumber);
      const guestNameInput = document.createElement("input");
      guestNameInput.placeholder = "ClientName";
      guestNameInput.name = "GuestName";
      guestInfoContainer.appendChild(guestNameInput);
      guestNameInput.classList.add("w-full", "rounded-md", "border", "border-gray-300", "bg-white", "py-3", "px-6", "text-base", "font-medium", "text-gray-700", "outline-none", "focus:border-indigo-500", "focus:shadow-md")

      const guestDOBInput = document.createElement("input");
      guestDOBInput.placeholder = "Date of Birth";
      guestDOBInput.name = "GuestDOB";
      guestDOBInput.type = "date";
      guestInfoContainer.appendChild(guestDOBInput);
      guestDOBInput.classList.add("w-full", "rounded-md", "border", "border-gray-300", "bg-white", "py-3", "px-6", "text-base", "font-medium", "text-gray-700", "outline-none", "focus:border-indigo-500", "focus:shadow-md")

    }
    guestInfoContainer.style.display = "block";
   
  }







  
  // function handleRoomTypeChange() {
  //   // console.log('rr');
  //   const priceInput = document.getElementById("price-input");
  //   const roomType = document.getElementById("room-type").value;
  //   const suiteTypeContainer = document.getElementById("suite-type-container");
  //   if (roomType === "suite") {
  //     suiteTypeContainer.style.display = "block";

  //     handleRoomTypePrice();
  
  //   } else {
  //     suiteTypeContainer.style.display = "none";
  //     handleRoomTypePrice();
     
  //   }
   
  // }








  /*
  
  function handleGuestCountChange() {
    const roomType = document.getElementById("room-type").value;
    const guestCount = document.getElementById("guest-count").value;
    const guestInfoContainer = document.getElementById("guest-info-container");
    guestInfoContainer.innerHTML = "";
    const guestLimit = (roomType === "single" || roomType === "double") ? 3 : Infinity;
    for (let i = 0; i < Math.min(guestCount, guestLimit); i++) {
      const guestNumber = document.createElement("p");
      guestNumber.textContent = `Guest ${i+1}`;
      guestInfoContainer.appendChild(guestNumber);
      const guestNameInput = document.createElement("input");
      guestNameInput.placeholder = "ClientName";
      guestInfoContainer.appendChild(guestNameInput);
      guestNameInput.classList.add("w-full", "rounded-md", "border", "border-gray-300", "bg-white", "py-3", "px-6", "text-base", "font-medium", "text-gray-700", "outline-none", "focus:border-indigo-500", "focus:shadow-md")
  
      const guestDOBInput = document.createElement("input");
      guestDOBInput.placeholder = "Date of Birth";
      guestDOBInput.type = "date";
      guestInfoContainer.appendChild(guestDOBInput);
      guestDOBInput.classList.add("w-full", "rounded-md", "border", "border-gray-300", "bg-white", "py-3",
*/


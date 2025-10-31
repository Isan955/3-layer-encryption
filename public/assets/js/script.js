var tombolMenu = document.getElementsByClassName('tombol-menu')[0];
var menu = document.getElementsByClassName('menu')[0];

tombolMenu.onclick = function() {
    menu.classList.toggle('active');
}

menu.onclick = function() {
    menu.classList.toggle('active');
}

let currentIndex = 0;
const serviceCards = document.getElementById("service-cards");
const totalCards = serviceCards.children.length;
const dots = document.getElementById("service-dots").children;

document.getElementById("nextBtn").addEventListener("click", function() {
  if (currentIndex + 3 < totalCards) {
    currentIndex += 3;
    serviceCards.style.transform = `translateX(-${currentIndex * 320}px)`; // Menyesuaikan dengan lebar card + gap
    updateDots();
  } else {
    currentIndex = 0;
    serviceCards.style.transform = `translateX(0)`; // Kembali ke awal
    updateDots();
  }
});

// Function to update dot navigation
function updateDots() {
  for (let i = 0; i < dots.length; i++) {
    dots[i].classList.remove("active");
  }
  const activeDotIndex = Math.floor(currentIndex / 3);
  dots[activeDotIndex].classList.add("active");
}

// Function to show service by clicking on dots
function showService(index) {
  currentIndex = index * 3;
  serviceCards.style.transform = `translateX(-${currentIndex * 320}px)`;
  updateDots();
}


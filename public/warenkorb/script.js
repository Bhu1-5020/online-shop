
function openCart() {
  document.getElementById("cartPanel")
    .classList.remove("translate-x-full");

  document.getElementById("cartOverlay")
    .classList.remove("hidden");
 
}

function closeCart() {
  document.getElementById("cartPanel")
    .classList.add("translate-x-full");

  document.getElementById("cartOverlay")
    .classList.add("hidden");
}

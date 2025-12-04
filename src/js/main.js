import {
  handleCategoryClicks,
  handleImageClicks,
  handleBuyBtn,
} from "./productList.js";
// console.log("Hello from main");
import { handleEmptyCart, handleCheckoutBtn } from "./cart.js";
export const handleDropdowns = () => {
  // htmx.on("htmx:afterSwap", (event) => {
  console.log("hello world");

  const triggers = document.querySelectorAll(".dropdown-btn");
  console.log(triggers);
  triggers.forEach((btn) => {
    btn.addEventListener("click", () => {
      const dd = btn.parentElement.parentElement.querySelector(".dropdown");
      console.log(dd);
      dd.classList.toggle("active");
    });
  });
  // });
};
const readCartCount = async () => {
  const cartCookie = await cookieStore.get("cart");
  let prev = [];

  if (cartCookie) {
    prev = JSON.parse(cartCookie.value);
  }

  document.querySelector("#cart-count").innerHTML = prev.length;
};
document.addEventListener("DOMContentLoaded", () => {
  handleCategoryClicks();
  handleImageClicks();
  handleDropdowns();

  handleBuyBtn();
  handleCheckoutBtn();
  handleEmptyCart();

  readCartCount();
});

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
document.addEventListener("DOMContentLoaded", () => {
  handleCategoryClicks();
  handleImageClicks();
  handleDropdowns();

  handleBuyBtn();
  handleCheckoutBtn();
  handleEmptyCart();
});

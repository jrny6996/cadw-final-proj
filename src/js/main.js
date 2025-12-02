import {
  handleCategoryClicks,
  handleImageClicks,
  handleBuyBtn,
} from "./productList.js";
// console.log("Hello from main");
import { handleEmptyCart, handleCheckoutBtn } from "./cart.js";
document.addEventListener("DOMContentLoaded", () => {
  handleCategoryClicks();
  handleImageClicks();

  handleBuyBtn();
  handleCheckoutBtn();
  handleEmptyCart();
});

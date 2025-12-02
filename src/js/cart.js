export const handleEmptyCart = () => {
  const emptyBtn = document.querySelector("#dump-cart");
  console.log(emptyBtn);

  if (!emptyBtn) return;

  emptyBtn.addEventListener("click", async () => {
    // alert("Emptying cart...");
    await cookieStore.set({
      name: "cart",
      value: JSON.stringify([]),
    });
    window.location.reload();
  });
};
export const handleCheckoutBtn = () => {
  const btn = document.querySelector("#checkout-btn");
  const shippingForm = document.querySelector("#shipping-form");
  // console.log(btn, shippingForm);
  //   console.log(shippingForm);
  btn?.addEventListener("click", () => {
    if (shippingForm.reportValidity()) shippingForm.submit();
    // alert("Found");
  });
};

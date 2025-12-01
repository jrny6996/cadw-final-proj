export const handleCategoryClicks = () => {
  const categorySelectElements = document.querySelectorAll(".category-select");
  // console.log(categorySelectElements);
  if (!categorySelectElements) return;
  categorySelectElements.forEach((categorySelect) => {
    const buttons = categorySelect.querySelectorAll("button");

    buttons.forEach((btn) =>
      btn.addEventListener("click", () => {
        buttons.forEach((b) => b.classList.remove("active"));
        btn.classList.add("active");
        console.log(btn);
      })
    );
  });
};


export const handleImageClicks = () => {

  htmx.on("htmx:afterSwap", (event) => {
    const pcl = document.querySelector("#product-category-list")

    if (!pcl) return
    console.log(pcl)
    pcl.querySelectorAll(".product-horizontal-list-card")?.forEach((card) => {
      console.log(card)
      const imgRow = card?.querySelector(".image-row")
      imgRow?.querySelectorAll('img')
        ?.forEach((img) => {

          img.addEventListener('click', () => {
            imgRow.querySelectorAll('img').forEach((naImg) => naImg.classList.remove("active"))
            img.classList.add("active")
            const src = img.src
            const featuredImg = img.closest(".product-horizontal-list-card").querySelector(".featured-image img")

            console.log(featuredImg)
            featuredImg.src = src

          })

        });

    })
  });


}

export const handleBuyBtn = () => {
  htmx.on("htmx:afterSwap", (event) => {
    const buyBtns = document.querySelectorAll(".buy-btn")
    // console.log(buyBtns)
    buyBtns.forEach((btn) => {
      btn.addEventListener('click', async () => {

        const prodId = btn.dataset.productId;

        const cartCookie = await cookieStore.get('cart');
        let prev = [];

        if (cartCookie) {
          prev = JSON.parse(cartCookie.value); 
        }

        prev.push(prodId);  

        await cookieStore.set({
          name: "cart",
          value: JSON.stringify(prev),
        });

        document.querySelector("#product-popover")?.hidePopover()

      })
    })
  })

}
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

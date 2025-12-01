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
        window.location.reload()
    });
};

<footer class="bg-black py-8 text-center text-white ">
    <div class="container mx-auto">
        &copy; <?php echo date("Y"); ?> O'PEP. All rights reserved.
    </div>

</footer>

<script>
    const openButton = document.querySelector(".open-cart-btn");
    const closeButton = document.querySelector(".close-cart-btn");
    const overlay = document.querySelector(".bg-opacity-75");
    const cartPanel = document.querySelector(".flex-col");
    const closeCart = document.querySelectorAll(".closeCart");
    const panier = document.querySelector('.panier');
    closeCart.forEach(element => {
        element.addEventListener('click', () => {

            panier.classList.add("hidden")
        })
    });






    openButton.addEventListener("click", function() {
        panier.classList.remove("hidden");
    });
</script>
</body>

</html>
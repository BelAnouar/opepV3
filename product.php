<?php
require_once "./partials/_sidbar.php";

require_once "./database/conn.php";
$plantes = getPlantes();



?>
<main class=' w-full'>
    <?php require_once "./partials/_headerDeshboard.php"; ?>



    <div class="grid lg:grid-cols-2 gap-2">
        <?php foreach ($plantes as $plante) { ?>
            <div class="group mx-2 mt-10 grid max-w-xl grid-cols-12 space-x-8 overflow-hidden rounded-lg border py-8 text-gray-700 shadow transition hover:shadow-lg sm:mx-auto">
                <div class="grid h-16 w-16 ml-4  place-items-center  ">
                    <img class="h-full rounded-lg " src="<?php echo $plante['image']; ?>" alt="">
                </div>

                <div class="col-span-11 flex flex-col pr-8 text-left sm:pl-4">
                    <h3 class="text-2xl font-semibold text-gray-600"> <?php echo $plante['nomPlante']; ?></h3>


                    <div class="mt-5 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2">
                        <div class="">
                            Price:
                            <span class="ml-2 mr-3 rounded-full bg-green-100 px-2 py-0.5 text-green-900 capitalize">
                                <?php echo $plante['price']; ?> $
                            </span>
                        </div>
                        <div class="">
                            Categorie:
                            <span class="categorie ml-2 mr-3 rounded-full bg-blue-100 px-2 py-0.5 text-blue-900 capitalize">
                                <?php $categorie = getCategorieByid($plante['categirie_id']);
                                foreach ($categorie as $cat) {

                                    echo $cat;
                                }; ?>
                            </span>
                        </div>
                    </div>
                    <div class="mt-3 flex flex-col space-y-3 text-sm font-medium text-gray-500 sm:flex-row sm:items-center sm:space-y-0 sm:space-x-2">


                        <button value="<?php echo $plante['idPlante'] ?>" class="btn-edit bg-transparent hover:bg-green-700 text-green-700 font-semibold hover:text-black py-2 px-3 border border-green-500 hover:border-transparent rounded">Edit</button>
                        <a onclick="return confirm('Are you sure you want to delete this record?');" href="delete.php?id=<?php echo $plante['idPlante'] ?>" class="bg-transparent hover:bg-rose-500 text-rose-700 font-semibold hover:text-black py-2 px-3 border border-rose-500 hover:border-transparent rounded">Delete</a>


                    </div>
                </div>
            </div>
        <?php } ?>
    </div>


    <?php include_once "./partials/modal.php"; ?>


</main>





</div>

<script>
    const btnEdit = document.querySelectorAll('.btn-edit');
    const modal = document.querySelector(".modal");
    const closemodal = document.querySelector(".closemodal");
    const modalImg = document.getElementById('modal-image');
    const modalPrice = document.getElementById('modal-price');
    const modalName = document.getElementById('modal-name');
    const modalCategorie = document.getElementById('modal-categorie');
    const modalUpdate = document.getElementById('modal-update');

    btnEdit.forEach(btn => {
        btn.addEventListener("click", function(event) {
            event.preventDefault();
            modal.classList.remove("hidden");
            const group = this.closest('.group');

            const imageSrc = group.querySelector('img').src;
            const price = group.querySelector('.text-green-900').textContent.trim();
            const name = group.querySelector('.text-gray-600').textContent.trim();
            const categorie = group.querySelector('.categorie').textContent.trim();


            console.log(categorie);
            // modalImg.value = imageSrc;
            modalPrice.value = price.substring(0, 2);
            modalName.value = name;
            // modalCategorie.value = categorie
            modalUpdate.value = this.value;
        });
    });

    closemodal.addEventListener("click", function() {
        modal.classList.add("hidden");
    });
</script>

</body>


</html>
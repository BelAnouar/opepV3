<?php
require_once "./partials/_sidbar.php";


require_once  "./../database/categories.php";


$categorie=new \App\database\Categories();
$categories = $categorie->getCategorie();

?>
<main class=' w-full'>
    <?php require_once "./partials/_headerDeshboard.php"; ?>

    <table class="border-collapse border border-slate-500 mx-auto w-44">
        <thead>
            <tr>
                <th class="border border-slate-600 ">Category</th>
                <th class="border border-slate-600 ">modifier</th>
            </tr>
        </thead>
        <tbody>

            <?php foreach ($categories as $categotie) { ?>
                <tr>

                    <td class="nomCategory border border-slate-700 "><?= $categotie["nomCateforie"] ?></td>
                    <td class="border border-slate-700 ">
                        <button type="submit" value="<?= $categotie["idCategorie"] ?>" name="" class="btn-edit mt-3 inline-flex w-full justify-center rounded-md bg-green-300 px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-green-50 sm:mt-0 sm:w-auto">Update</button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>


</main>



<?php include_once "./partials/modalCategorie.php"; ?>

</div>

<script>
    const btnEdit = document.querySelectorAll('.btn-edit');
    const modal = document.querySelector(".modal");
    const closemodal = document.querySelector(".closemodal");
    const cat = document.querySelector("#modal-cat");
    const idcat = document.querySelector("#update-cat");

    btnEdit.forEach(btn => {
        btn.addEventListener("click", function(event) {
            event.preventDefault();
            modal.classList.remove("hidden");
            const tr = this.closest('tr');
            const nomCategory = tr.querySelector('.nomCategory').textContent.trim()
            const idCategory = tr.querySelector('.btn-edit').value;
            cat.value = nomCategory
            idcat.value = idCategory


            console.log(tr);
        });
    });

    closemodal.addEventListener("click", function() {
        modal.classList.add("hidden");
    });
</script>

</body>

</html>
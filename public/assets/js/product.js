

const  formEditP=document.querySelector("#formEditP")

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



formEditP.addEventListener('submit', function (event) {
    event.preventDefault();

    const formDataE = new FormData(formEditP);
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('Edit successful!');
                console.log(xhr.responseText); // Log the response from the server
            } else {
                console.error('Error Edit');
            }
        }
    };

    xhr.open('POST', '/src/App/crud-data/edit.php', true);
    xhr.send(formDataE);
});
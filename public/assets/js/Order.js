const formCat = document.querySelector("#formCat");
const categorie = document.querySelector("#categorie");

formCat.addEventListener("submit", function (event) {
    event.preventDefault();

    const categoryValue = categorie.value.trim();

    if (categoryValue !== '') {
        const xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {

                    console.log('Category added successfully!');
                    categorie.value="";
                } else {

                    console.error('Error adding category.');
                }
            }
        };

        xhr.open('POST', '/src/App/crud-data/Categorie.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.send('categorie=' + encodeURIComponent(categoryValue));
    } else {
        console.error('Category field is empty!');
    }
});



const plantForm = document.getElementById('plantForm');

plantForm.addEventListener('submit', function (event) {
    event.preventDefault();

    const formData = new FormData(plantForm);
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText)
                console.log('Plant added successfully!');
            } else {
                // Handle error response here if needed
                console.error('Error adding plant.');
            }
        }
    };

    xhr.open('POST', '/src/App/crud-data/addplante.php', true);
    xhr.send(formData);
});
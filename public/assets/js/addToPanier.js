


const btnCategory=document.querySelectorAll(".btn-category");
const btnSearch=document.querySelector("#btn-seach")
const searchPlant=document.querySelector("#search-plant")

const cardPlant=document.querySelector(".card-plant");
const addToCard=document.querySelectorAll(".add-to-card")
const RemoveBtn=document.querySelectorAll(".Remove-btn")

const checkoutBtn=document.querySelector("#checkout-btn")
btnCategory.forEach(btn=>{
    btn.addEventListener("click",function (event){
        event.preventDefault();
        let category=event.target.value;
       
        filterByCategory(category);
    })
})

btnSearch.addEventListener("click",function (event) {
    event.preventDefault();
    filterByNamePlant(searchPlant.value)
})

function filterByCategory(category) {

    const xhr= new XMLHttpRequest();
    xhr.open("GET",`/src/App/filter-data/filter-dataPlant.php?category=${category}`);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            cardPlant.innerHTML=""
            cardPlant.innerHTML=xhr.response;

        }
    };

    xhr.send();
}

function filterByNamePlant(plant) {
    const xhr= new XMLHttpRequest();
    xhr.open("GET",`/src/App/filter-data/filter-dataPlant.php?search=${plant}`);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            cardPlant.innerHTML=""
            cardPlant.innerHTML=xhr.response;

        }
    };

    xhr.send();
}




function AddToCard(plantID){
    const xhr= new XMLHttpRequest();
    xhr.open("POST",`/src/App/crud-data/addToPannier.php?plant_id=${plantID}`);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhr.response)

        }
    };

    xhr.send();
}
addToCard.forEach(card=>{
    card.addEventListener("click",function (event){
        event.preventDefault();

        let plantID=event.target.value;

        AddToCard(plantID);

    })
})



RemoveBtn.forEach(remove=>{
    remove.addEventListener("click",function (event){
        event.preventDefault()
        let pannierID=event.target.value;

        const xhr= new XMLHttpRequest();
        xhr.open("POST",`/src/App/crud-data/addToPannier.php?pannier_id=${pannierID}`);
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(xhr.response)

            }
        };

        xhr.send();
    })
})

checkoutBtn.addEventListener("click",function (event){
    let idUser=event.target.value;
    const xhr= new XMLHttpRequest();
    xhr.open("POST",`/src/App/crud-data/checkout.php?user_id=${idUser}`);
    xhr.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            console.log(xhr.response)

        }
    };

    xhr.send();

})
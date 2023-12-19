const  FormTag=document.querySelector("#formTag")
const nameTag=document.querySelector("#tagname")
const Tags=document.querySelector("#tags")


const modifyFormTag=document.querySelector("#modify_formTag")
    function openPopup() {
    console.log("jfhdj")
    document.getElementById("popup").classList.remove("hidden");
}

    function closePopup() {
    document.getElementById("popup").classList.add("hidden");
    document.getElementById("popupEdit").classList.add("hidden");
}


FormTag.addEventListener("submit",function (event){
         event.preventDefault();
    const formDataT = new FormData(FormTag);
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log('add successful!');
                displayTags(); // Log the response from the server
            } else {
                console.error('Error Edit');
            }
        }
    };

    xhr.open('POST', '/src/App/crud-data/Tag.php', true);
    xhr.send(formDataT);

})



function  deleteTag(idTag){
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                Tags.innerHTML=""
                console.log('delete tags successful!');
                Tags.innerHTML=xhr.responseText; // Log the response from the server
            } else {
                console.error('Error delete');
            }
        }
    };

    xhr.open('GET', `/src/App/crud-data/Tag.php?tagId=${idTag}`, true);
    xhr.send();
}


function displayTags(){
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                Tags.innerHTML=""
                console.log('display tags successful!');
                Tags.innerHTML=xhr.responseText; // Log the response from the server
            } else {
                console.error('Error Edit');
            }
        }
    };

    xhr.open('GET', '/src/App/crud-data/Tag.php', true);
    xhr.send();

}


displayTags();


function showTagDetails(tag, id) {
    document.getElementById("popupEdit").classList.remove("hidden");
    let tagName = document.getElementById("tagname2");
    let tagId = document.querySelector("#tagId2");
    tagName.value = tag;
    tagId.value = id;

}


modifyFormTag.addEventListener("submit",function (event){
    event.preventDefault();
    const formDataMT = new FormData(modifyFormTag);
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {


                displayTags();// Log the response from the server
            } else {
                console.error('Error Edit');
            }
        }
    };

    xhr.open('POST', '/src/App/crud-data/Tag.php', true);
    xhr.send(formDataMT);

})
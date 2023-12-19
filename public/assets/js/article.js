const articleCards=document.querySelector("#cardArticles")

const searchBar=document.querySelector("#search-bar")

const tagName=document.querySelectorAll(".labtagName")


tagName.forEach(tag=>{
    tag.addEventListener("click",function () {

        let tagValue=this.textContent.trim();

          if (tagValue!="All"){
        const xhr = new XMLHttpRequest();

        xhr.onreadystatechange = function () {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    articleCards.innerHTML=""
                    console.log('delete tags successful!');
                    articleCards.innerHTML=xhr.responseText; // Log the response from the server
                } else {
                    console.error('Error delete');
                }
            }
        };

        xhr.open('GET', `/src/App/crud-data/Article.php?tag=${tagValue}`, true);
        xhr.send();
          }else {
              displayArticle();
          }
    })
})
searchBar.addEventListener("input",function () {

    var searchValue=this.value

    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                articleCards.innerHTML=""
                console.log('delete tags successful!');
                articleCards.innerHTML=xhr.responseText; // Log the response from the server
            } else {
                console.error('Error delete');
            }
        }
    };

    xhr.open('GET', `/src/App/crud-data/Article.php?search=${searchValue}`, true);
    xhr.send();

})
function displayArticle(){
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                articleCards.innerHTML=""
                console.log(xhr.responseText);
                articleCards.innerHTML=xhr.responseText; // Log the response from the server
            } else {
                console.error('Error ');
            }
        }
    };

    xhr.open('GET', '/src/App/crud-data/Article.php', true);
    xhr.send();

}

displayArticle()
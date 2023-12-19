const FormTheme = document.querySelector("#formTheme");
const namesTag = document.querySelectorAll(".namTags");

const themeName = document.querySelector("#themeName");
const themeDesc = document.querySelector("#themeDesc");
namesTag.forEach(item => {
    item.addEventListener('click', () => {
        const prTags = item.closest(".checkTags");
        const tags = prTags.querySelector("#tag");

        tags.checked ? tags.removeAttribute("checked") : tags.setAttribute("checked", "checked");
    });
});

FormTheme.addEventListener('submit', function (evt) {
    evt.preventDefault();

    const checkedCheckboxes = document.querySelectorAll(".TagTheme:checked");
    const arrayTags = Array.from(checkedCheckboxes).map(checkbox => checkbox.value);

    const themeValue = themeName.value;
    const DescValue=themeDesc.value

    // Create an XMLHttpRequest object
    const xhr = new XMLHttpRequest();


    const data = JSON.stringify({ arrayTags: arrayTags, themeValue: themeValue,DescValue:DescValue });

    xhr.open('POST', '/src/App/crud-data/Theme.php', true);
    xhr.setRequestHeader('Content-type', 'application/json');


    xhr.onload = function () {
        if (xhr.status === 200) {
            console.log(xhr.responseText)
            console.log('Data sent successfully');
        } else {

            console.error('Error sending data');
        }
    };


    xhr.send(data);
});



function openPopup() {
    console.log("jfhdj")
    document.getElementById("popup").classList.remove("hidden");
}

function closePopup() {
    document.getElementById("popup").classList.add("hidden");
    document.getElementById("popupEdit").classList.add("hidden");
}



function showThemeDetails(name, id) {
    document.getElementById("popupEditTag").classList.remove("hidden");
    let themeName = document.getElementById("themeName2");
    let themeId = document.getElementById("themeId");
    var themeTags = document.getElementById("tags" + id);
    var spans = themeTags.getElementsByTagName("span");
    var currentTags = [];
    var themeTags2 = document.querySelectorAll(".taglist");
    const allTags = [];

    for (var i = 0; i < spans.length; i++) {
        currentTags[i] = spans[i].getAttribute("value");
    }

    themeTags2.forEach((themeTags2) => {
        if (themeTags2) {
            allTags.push(themeTags2.value);
        }
    });

    for (var i = 0; i < currentTags.length; i++) {
        for (var j = allTags.length - 1; j >= 0; j--) {
            if (currentTags[i] === allTags[j]) {
                document.getElementById("tagedit" + j).checked = true;
                break;
            } else {
                document.getElementById("tagedit" + j).checked = false;
            }
        }
    }
    themeName.value = name;
    themeId.value = id;
}
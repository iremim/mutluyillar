"use strict";

const firstYearPics = [];

pics.forEach(pic => {
    firstYearPics.push(pic);
})

localStorage.setItem("fotolar", JSON.stringify(firstYearPics));
let pictures = JSON.parse(localStorage.getItem("fotolar"));

let shuffliedpictures = pictures.sort(() => Math.random() - .5);

let fotoPlace = document.querySelector("#fotoPlace");

function createPics(picture){
    let mainBox = document.createElement("div");
    mainBox.classList.add("mainBox");
    mainBox.setAttribute("id",picture.id);

    let imgBox = document.createElement("div");
    imgBox.classList.add("imgBox");

    let img = document.createElement("img");
    img.classList.add("img");
    img.setAttribute("src",picture.pic);
    
    let changeButton = document.createElement("i");
    changeButton.setAttribute("class","w3-jumbo w3-spin fa fa-refresh");    
    changeButton.classList.add("changeButton");

    let imgFlip = document.createElement("img");
    imgFlip.classList.add("imgFlip");
    imgFlip.setAttribute("src",picture.flip);
    imgFlip.classList.add("hide");

    let underText = document.createElement("p");
    underText.classList.add("underText");
    underText.innerText = picture.date;

    imgBox.append(changeButton,img, imgFlip);
    mainBox.append(imgBox,underText);
    fotoPlace.append(mainBox);

    changeButton.addEventListener("click", (event)=>{
        event.stopPropagation();
        img.classList.toggle("hide");
        imgFlip.classList.toggle("hide");
    });

    imgBox.addEventListener("click", (event)=>{

        document.querySelector("main").style.overflow = "hidden";
        fotoPlace.classList.add("biggerFotoPlace");

        let chosenID = event.target.parentElement.parentElement.id;

        let chosenParentsImgBox = event.target.parentElement;
        let chosenImg = chosenParentsImgBox.children[1];
        let chosensRefreshButton = chosenParentsImgBox.firstElementChild;
        let chosensUnderText = chosenParentsImgBox.nextElementSibling;
        let chosenParentsMainBox = chosenParentsImgBox.parentElement;

        
        chosenParentsMainBox.classList.add("big");
        chosenParentsImgBox.classList.add("bigger");

        let allBoxes = document.querySelectorAll(".mainBox");

        allBoxes.forEach(e => {
            if(e.id !== chosenID){
                // e.classList.add("hide");
                e.classList.add("opacity");

            }
        });

            imgBox.addEventListener("click", (e)=>{

            let allBoxes = document.querySelectorAll(".mainBox");

            allBoxes.forEach(e => {
                if(e.id !== chosenID){
                    e.classList.toggle("opacity");

                }
            });

            fotoPlace.classList.toggle("biggerFotoPlace");
            document.querySelector("main").style.overflow = "scroll";
            e.target.parentElement.classList.toggle("bigger");
            e.target.parentElement.parentElement.classList.toggle("big");

            //To keep scroll on the clicked imgBox
            imgBox.scrollIntoView();
        });
        
    })

}

function getPictures(){
    shuffliedpictures.forEach(pic => createPics(pic));
}

getPictures();
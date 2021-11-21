"use strict";

localStorage.setItem("fotolar", JSON.stringify(pics));
const pictures = JSON.parse(localStorage.getItem("fotolar"));

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
     
        // window.screenTop();

        let imgPosition = event.Y;
        
        window.scrollTo(0, 0);

        let chosenID = event.target.parentElement.parentElement.id;

        let chosenParentsImgBox = event.target.parentElement;
        let chosenImg = chosenParentsImgBox.children[1];
        let chosensRefreshButton = chosenParentsImgBox.firstElementChild;
        let chosensUnderText = chosenParentsImgBox.nextElementSibling;
        let chosenParentsMainBox = chosenParentsImgBox.parentElement;

        chosenParentsMainBox.classList.add("bigger");
        chosenParentsImgBox.classList.add("big");
        chosensUnderText.classList.add("moreFrontier");

        let allBoxes = document.querySelectorAll(".mainBox");

        allBoxes.forEach(e => {
            if(e.id !== chosenID){
                e.classList.add("hide");
            }
        });

        imgBox.addEventListener("click", (e)=>{

            let allBoxes = document.querySelectorAll(".mainBox");

            allBoxes.forEach(e => {
                if(e.id !== chosenID){
                    e.classList.toggle("hide");
                }
            });

            e.target.parentElement.classList.toggle("big");
            e.target.parentElement.parentElement.classList.toggle("bigger");
            e.target.parentElement.nextElementSibling.classList.toggle("moreFrontier");
            
        })
        
    })

}

function getPictures(){
    pictures.forEach(pic => createPics(pic));
}

getPictures();
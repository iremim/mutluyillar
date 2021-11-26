"use strict";

let fotoPlace = document.querySelector("#fotoPlace");

let deleteButtons = document.querySelectorAll(".deletePicButton");

deleteButtons.forEach(button => {
    button.addEventListener("click", (e)=>{
        e.stopPropagation();
    })
})


    let changeButtons = document.querySelectorAll(".changeButton");

    changeButtons.forEach(changeButton => {
        changeButton.addEventListener("click", (event)=>{
            event.stopPropagation();

            event.target.nextElementSibling.classList.toggle("hide");
            event.target.parentElement.lastElementChild.classList.toggle("hide");
        });
    })

    let imgBoxes = document.querySelectorAll(".imgBox");
    
        imgBoxes.forEach(imgBox => {
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
        
                allBoxes.forEach(event => {
                    if(event.id !== chosenID){
                        // e.classList.add("hide");
                        event.classList.add("opacity");
                    }
                });
        
                chosenParentsImgBox.addEventListener("click", (e)=>{
        
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
        
                });
            });
        
        });
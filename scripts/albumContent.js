"use strict";

let fotoPlace = document.querySelector("#fotoPlace");
    

    document.querySelector(".changeButton").addEventListener("click", (event)=>{
        document.querySelector(".img").classList.toggle("hide");
        document.querySelector(".imgFlip").classList.toggle("hide");
    });

    document.querySelector(".imgBox").addEventListener("click", (event)=>{
     
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

            document.querySelector(".imgBox").addEventListener("click", (e)=>{

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

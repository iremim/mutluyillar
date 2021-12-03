"use strict";

    let changeButtons = document.querySelectorAll(".changeButton");

    changeButtons.forEach(changeButton => {
        changeButton.addEventListener("click", (event)=>{
            event.stopPropagation();

            event.target.nextElementSibling.classList.toggle("hide");
            event.target.parentElement.lastElementChild.classList.toggle("hide");
        });
    })

    let allAddComments = document.querySelectorAll(".addComment");

    allAddComments.forEach(addComment => {
        addComment.addEventListener("click", (ev)=>{
            ev.stopPropagation();

            document.querySelector(".addComment").classList.add("hide");

            let newComment = ev.target.previousElementSibling;
            newComment.classList.remove("hide");

            let ekleInput = ev.target.previousElementSibling.firstElementChild;
            let ekleButton = ev.target.previousElementSibling.lastElementChild;

            let profilOwnerID = parseInt(ev.target.parentElement.parentElement.previousSibling.parentElement.previousElementSibling.previousElementSibling.id);

            let clickedImgID = parseInt(ev.target.parentElement.previousElementSibling.id);

            ekleButton.addEventListener("click", (e)=>{
                if(ekleInput.value !== ""){
                    let newComment = ekleInput.value;

                    window.location.href = "phpfiles/comments.php?picId="+clickedImgID+"&newComment="+newComment+"&comingFrom="+profilOwnerID;

                    ekleInput.value = "";

                }
            });
        });
    })

    let imgBoxes = document.querySelectorAll(".imgBox");
    
        imgBoxes.forEach(imgBox => {
            imgBox.addEventListener("click", (event)=>{
        
                let chosenID = event.target.parentElement.parentElement.id;
        
                let chosenParentsImgBox = event.target.parentElement;
                let chosenImg = chosenParentsImgBox.children[1];
                let chosensRefreshButton = chosenParentsImgBox.firstElementChild;
                let chosensUnderText = chosenParentsImgBox.nextElementSibling;
                let chosenParentsMainBox = chosenParentsImgBox.parentElement;

                let commentFieldOfChosenImgBox = chosenParentsMainBox.nextElementSibling;


                chosenParentsMainBox.classList.add("big");
                chosenParentsImgBox.classList.add("bigger");

                commentFieldOfChosenImgBox.classList.remove("hide");

                let allBoxes = document.querySelectorAll(".mainBox");
        
                allBoxes.forEach(event => {
                    if(event.id !== chosenID){
                        // e.classList.add("hide");
                        // event.classList.add("opacity");
                        event.classList.add("hide");
                    }
                });

                chosenParentsImgBox.addEventListener("click", (e)=>{
        
                    let allBoxes = document.querySelectorAll(".mainBox");
        
                    allBoxes.forEach(e => {
                        if(e.id !== chosenID){
                            // e.classList.toggle("opacity");
                            e.classList.toggle("hide");
        
                        }
                    });

                    // document.querySelector("main").style.overflow = "scroll";
                    e.target.parentElement.classList.toggle("bigger");
                    e.target.parentElement.parentElement.classList.toggle("big");

                    e.target.parentElement.parentElement.nextElementSibling.classList.toggle("hide");
    
                    //To keep scroll on the clicked imgBox
                    imgBox.scrollIntoView();
                });
            });
        
        });
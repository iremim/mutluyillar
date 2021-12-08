"use strict";

const allUsers = [];

async function getUsers(){
    const response = await fetch("phpfiles/users.php");
    const users = await response.json();
    return users;
}
getUsers().then(data => {
    allUsers.push(data);
});

    let changeButtons = document.querySelectorAll(".changeButton");

    changeButtons.forEach(changeButton => {
        changeButton.addEventListener("click", (event)=>{
            event.stopPropagation();

            event.target.nextElementSibling.classList.toggle("hide");
            event.target.parentElement.lastElementChild.classList.toggle("hide");
        });
    })

    let deleteButtons = document.querySelectorAll(".deleteComment");

    deleteButtons.forEach(deleteButton => {
        deleteButton.addEventListener("click", (e)=>{
            let comment = e.target.parentElement;
           
            let commentOwnerId = JSON.stringify(e.target.attributes[0].value);
            let picId = JSON.stringify(e.target.parentElement.parentElement.previousElementSibling.id);
            let commentId = JSON.stringify(e.target.previousElementSibling.id);

            fetch(new Request("phpfiles/updateComment.php", {
                method:'DELETE',
                headers:{"Content-type":"application/json;"},
                body: `{"picId":${picId}, "commentId":${commentId}, "commentOwnerId":${commentOwnerId}}`,
            }))
            .then(r=> r.json())
            .then(d=>{
                comment.remove();
            }); 
        })
    })

    if(document.querySelector(".addedComment")){
        setTimeout(()=>{
            document.querySelector(".addedComment").classList.add("hide");
        },1000);
    }

//     let allAddComments = document.querySelectorAll(".addComment");

//     allAddComments.forEach(addComment => {
//         addComment.addEventListener("click", (ev)=>{
//             ev.stopPropagation();

//             addComment.classList.add("hide");
            
//             let inloggeduserId = ev.target.parentElement.id;

//             let newCommentBox = document.createElement("div");
//             newCommentBox.classList.add("newComment");
//             newCommentBox.setAttribute("id",inloggeduserId);

//             newCommentBox.innerHTML = `
//                 <input type='text' name='newComment' placeholder='Yeni yorum..'>
//                 <button>Ekle</button>
//             `;

//             document.querySelector(".commentInputs").append(newCommentBox);

            
//             let ekleInput = ev.target.nextElementSibling.firstElementChild;

//             let ekleButton = ev.target.nextElementSibling.lastElementChild;

//             let profilOwnerID = parseInt(ev.target.parentElement.parentElement.previousElementSibling.parentElement.parentElement.previousElementSibling.previousElementSibling.id);

//             let clickedImgID = parseInt(ev.target.parentElement.parentElement.previousElementSibling.id);

//             addComment.remove();

//             ekleButton.addEventListener("click", (e)=>{
//                 if(ekleInput.value !== ""){
//                     let newComment = JSON.stringify(ekleInput.value);
//                     // window.location.href = "phpfiles/comments.php?picId="+clickedImgID+"&newComment="+newComment+"&comingFrom="+profilOwnerID;
//                     ekleInput.value = "";

//                     let commentOwnerId = parseInt(e.target.parentElement.parentElement.id);
//                     let commentedUser = [];
// console.log(commentOwnerId);
//                     allUsers[0].forEach(user=> {
//                         if(user.id == commentOwnerId){
//                             commentedUser.push(user);
//                         }

//                     })

//                     fetch(new Request("phpfiles/updateComment.php", {
//                         method:'POST',
//                         headers:{"Content-type":"application/json;"},
//                         body: `{"picId":${clickedImgID}, "newComment":${newComment}, "commentOwnerId":${commentOwnerId}}`,
//                     }))
//                     .then(r=> r.json())
//                     .then(d=>{
//                         console.log(d);
//                         let newCommentBox = document.createElement("div");
//                         newCommentBox.classList.add("comments");
//                         newCommentBox.innerHTML = `
//                         <a href=profil.php?id="${commentOwnerId}"> <img src='${commentedUser[0].avatar}'></a>
//                         <div id='${d.commentId}' class='commentText'>${d.comment}</div>
//                         <a href='phpfiles/comments.php?picId=${clickedImgID}&delete=${d.commentId}&comingFrom=${profilOwnerID}' class='deleteComment'>X</a>
//                         `;
    
//                         e.target.parentElement.remove();
//                         document.querySelector(".commentInputs").prepend(newCommentBox);
//                     });

//                 }
//             });
//         });
//     })

    let imgBoxes = document.querySelectorAll(".imgBox");
    
        imgBoxes.forEach(imgBox => {
            imgBox.addEventListener("click", (event)=>{
           let chosenImgsCommentInput = event.target.parentElement.parentElement.nextElementSibling.firstElementChild;
                
            let commentInputDiv = event.target.parentElement.parentElement.nextElementSibling.lastElementChild;

                if(commentInputDiv.children.length < 2){
                    let addComment = document.createElement("div");
                    addComment.classList.add("addComment");
                    addComment.innerText = "Yorum Ekle";
                    commentInputDiv.append(addComment);
                }
            
            let chosenImgsCommentPlace = event.target.parentElement.parentElement.nextElementSibling.lastElementChild.firstElementChild;

            let chosenImgsAddCommentBox = event.target.parentElement.parentElement.nextElementSibling.lastElementChild.lastElementChild;  

            chosenImgsAddCommentBox.addEventListener("click",(ev)=>{

            chosenImgsAddCommentBox.classList.add("hide");
            
            let inloggeduserId = ev.target.parentElement.id;

            if(commentInputDiv.children.length < 3){

                let newCommentBox = document.createElement("div");
                newCommentBox.classList.add("newComment");
                newCommentBox.setAttribute("id",inloggeduserId);
                let ekleButton = document.createElement("button");
                ekleButton.innerText = "Ekle";
    
                newCommentBox.innerHTML = `
                    <input type='text' name='newComment' placeholder='Yeni yorum..'>
                `;
    
                newCommentBox.append(ekleButton);
    
                ev.target.parentElement.append(newCommentBox);
            }

            let ekleInput = ev.target.nextElementSibling.firstElementChild;

            let ekleButton = ev.target.nextElementSibling.lastElementChild;

            let profilOwnerID = parseInt(ev.target.parentElement.parentElement.previousElementSibling.parentElement.parentElement.previousElementSibling.previousElementSibling.id);

            let clickedImgID = parseInt(ev.target.parentElement.parentElement.previousElementSibling.id);

            ekleButton.addEventListener("click", (e)=>{
                if(ekleInput.value !== ""){
                    let newComment = JSON.stringify(ekleInput.value);
                    // window.location.href = "phpfiles/comments.php?picId="+clickedImgID+"&newComment="+newComment+"&comingFrom="+profilOwnerID;
                    ekleInput.value = "";

                    let commentOwnerId = parseInt(e.target.parentElement.parentElement.id);
                    let commentedUser = [];

                    allUsers[0].forEach(user=> {
                        if(user.id == commentOwnerId){
                            commentedUser.push(user);
                        }

                    })

                    fetch(new Request("phpfiles/updateComment.php", {
                        method:'POST',
                        headers:{"Content-type":"application/json;"},
                        body: `{"picId":${clickedImgID}, "newComment":${newComment}, "commentOwnerId":${commentOwnerId}}`,
                    }))
                    .then(r=> r.json())
                    .then(d=>{
                        let newCommentBox = document.createElement("div");
                        newCommentBox.classList.add("comments");
                        newCommentBox.innerHTML = `
                        <a href=profil.php?id="${commentOwnerId}"> <img src='${commentedUser[0].avatar}'></a>
                        <div id='${d.commentId}' class='commentText'>${d.comment}</div>
                        `;

                        let newAddedCommentButton = document.createElement("a");
                        newAddedCommentButton.classList.add("deleteComment");
                        newAddedCommentButton.setAttribute("value", commentOwnerId);
                        newAddedCommentButton.innerText = "X";
                        newCommentBox.append(newAddedCommentButton);

                        e.target.parentElement.remove();
                        chosenImgsCommentPlace.append(newCommentBox);


                        newAddedCommentButton.addEventListener("click", (e)=>{
                           
                            fetch(new Request("phpfiles/updateComment.php", {
                                method:'DELETE',
                                headers:{"Content-type":"application/json;"},
                                body: `{"picId":${JSON.stringify(clickedImgID)}, "commentId":${JSON.stringify(d.commentId)}, "commentOwnerId":${JSON.stringify(commentOwnerId)}}`,
                            }))
                            .then(r=> r.json())
                            .then(d=>{
                                newCommentBox.remove();
                            }); 
                        })

                    });
                    chosenImgsAddCommentBox.classList.remove("hide");
                }
            });
                })

                document.querySelector(".user").classList.add("smallest");
                document.querySelector(".favText").classList.add("hide");
                document.querySelector(".titleBox").classList.add("longerTitle");
                document.querySelector(".userFavorites").classList.add("rotated");
                

                let chosenID = event.target.parentElement.parentElement.id;
        
                let chosenParentsImgBox = event.target.parentElement;
                let chosenImg = chosenParentsImgBox.children[1];
                let chosensRefreshButton = chosenParentsImgBox.firstElementChild;
                let chosensUnderText = chosenParentsImgBox.nextElementSibling;
                let chosenParentsMainBox = chosenParentsImgBox.parentElement;

                let commentFieldOfChosenImgBox = chosenParentsMainBox.nextElementSibling;

                commentFieldOfChosenImgBox.classList.add("commentFieldRotated");

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

                    document.querySelector(".user").classList.toggle("smallest");
                    document.querySelector(".favText").classList.toggle("hide");
                    document.querySelector(".titleBox").classList.toggle("longerTitle");
                    document.querySelector(".userFavorites").classList.toggle("rotated");

                    commentFieldOfChosenImgBox.classList.toggle("commentFieldRotated");

                    //To keep scroll on the clicked imgBox
                    imgBox.scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
                });

            });
        
        });
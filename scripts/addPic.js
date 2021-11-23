// "use strict!";

// let inputPlace = document.getElementById("inputPlace");

// function createFotoInputs() {
//     let fotoForm = document.createElement("div");
//     fotoForm.classList.add("fotoForm");

//     let newFoto = document.createElement("input");
//     newFoto.setAttribute("id","newFoto");
//     newFoto.setAttribute("type","file");

//     let newFotoFlip = document.createElement("input");
//     newFotoFlip.setAttribute("id","newFotoFlip");
//     newFotoFlip.setAttribute("type","file");
//     newFotoFlip.classList.add("hide");

//     let addButton = document.createElement("button");
//     addButton.setAttribute("id","addButton");
//     addButton.classList.add("disabled");
//     addButton.innerText = "Ekle";

//     let imageBox = document.createElement("div");
//     imageBox.classList.add("imageBox");
//     imageBox.classList.add("hide");

//     let uploadedImg = document.createElement("img");
//     uploadedImg.classList.add("uploadedImg");

//     imageBox.append(uploadedImg);

//     let uploadedImgFlip = document.createElement("img");
//     uploadedImgFlip.classList.add("uploadedImg");

//     let imageBoxFlip = document.createElement("div");
//     imageBoxFlip.classList.add("imageBox");
//     imageBoxFlip.classList.add("hide");

//     imageBoxFlip.append(uploadedImgFlip);

//     fotoForm.append(newFoto,imageBox,newFotoFlip,imageBoxFlip,addButton);
//     inputPlace.append(fotoForm);
    
//     newFoto.addEventListener("input", ()=>{
//         let file = newFoto.files[0];
//         console.log(newFoto);

//         newFotoFlip.classList.remove("hide");
//         imageBox.classList.remove("hide");
//         uploadedImg.setAttribute("src", newFoto.baseURI);
//     })

//     newFotoFlip.addEventListener("input", ()=>{
//         addButton.classList.remove("disabled");

//         imageBoxFlip.classList.remove("hide");
//         uploadedImgFlip.setAttribute("src", newFotoFlip.baseURI);
//     })

//     addButton.addEventListener("click", (e)=>{
//         if(newFoto && newFotoFlip){
//             var file = newFoto.files[0];
//             console.log(file);
//         }
        
//     })
// }

// createFotoInputs();


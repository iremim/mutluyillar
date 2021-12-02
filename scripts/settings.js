"use strict";

let updateBox = document.getElementById("updateBoxes");
let username = document.querySelector("#usernamep");
let description = document.querySelector("#description");

let userBox = document.getElementById("userInfo");

let closeButton = document.createElement("div");
closeButton.innerText = "X";
closeButton.classList.add("closeBut");

{/* <div class="closeBut">X</div> */}

document.getElementById("changeAvatar").addEventListener("click", ()=>{
    updateBox.classList.add("show");
    userBox.classList.add("opacity");

    closeButton.addEventListener("click", ()=>{
        updateBox.classList.remove("show");
        userBox.classList.remove("opacity");
    });

    updateBox.innerHTML = `
        <form id="avatarForm" action="phpfiles/updateUser.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="img">
            <button>Ekle</button>
        </form>
    `;
    updateBox.append(closeButton);
});

username.addEventListener("click", ()=>{
    updateBox.classList.add("show");
    userBox.classList.add("opacity");

    closeButton.addEventListener("click", ()=>{
        updateBox.classList.remove("show");
        userBox.classList.remove("opacity");
    });

    updateBox.innerHTML = `
        <form id="userForm" action="phpfiles/updateUser.php" method="POST">
            <input type="text" name="newName" placeholder="Yeni - Kullanici adi">
            <input type="password" name="newPassword" placeholder="Yeni - Sifre">
            <button>Degistir</button>
        </form>
    `;
    updateBox.append(closeButton);
});

description.addEventListener("click", ()=>{
    updateBox.classList.add("show");
    userBox.classList.add("opacity");

    closeButton.addEventListener("click", ()=>{
        updateBox.classList.remove("show");
        userBox.classList.remove("opacity");
    });

    updateBox.innerHTML = `
        <form id="descForm" action="phpfiles/updateUser.php" method="POST">
            <input type="text" name="description" placeholder="Yeni - Biografi">
            <button>Guncelle</button>
        </form>
    `;
    updateBox.append(closeButton);
});
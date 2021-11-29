"use strict";

localStorage.setItem("sorular", JSON.stringify(quests));
let questions = JSON.parse(localStorage.getItem("sorular"));

let playground = document.querySelector("#playGround");
let start = document.querySelector("#start");

createQuizContainer();

let quizContainer = document.querySelector(".container");
let answersField = document.getElementById("answersButtons");
let questionField = document.querySelector(".question");
let finishButton = document.getElementById("finish");
let nextButton = document.getElementById("right");
let selectedOpt = document.querySelector(".selectedOpt");

let shuffliedQuestions, currentQuestionIndex=1;

let totalPoan = 0;

quizContainer.style.display ="none";

start.addEventListener("click", ()=>{
    quizContainer.style.display ="flex";
    document.getElementById("firstDiv").style.display ="none";
    document.getElementById("secondDiv").style.display ="none";

    startTheGame();
});


function startTheGame() {
    document.querySelector(".container").classList.remove("hide");
    //Sorterar questions arrayen slumpmässig
    shuffliedQuestions = questions.sort(() => Math.random() - .5);
    currentQuestionIndex = 0;
    
    setNextQuestion();
}

function setNextQuestion(questions = shuffliedQuestions[currentQuestionIndex]){
    
    let questionField = document.querySelector(".question");
    let answersField = document.getElementById("answersButtons");
    let pictureContainer = document.getElementById("pictureContainer");

    playground.classList.remove("playArea");
    playground.classList.add("playG");

    clearTheAnswerfield();
    
    //Tömmer (tar bort) elementen som ligger i answer fältet 
    function clearTheAnswerfield(){
    document.querySelector(".navigateButtons").classList.add("opacity");

    //Tömmer fältet tills den är tom.
     while(answersField.firstChild){
         answersField.removeChild(answersField.firstChild);
     }
    }

    showQuestion(questions);

    //Tar emot questions arrayen och sätter frågor och svar 
    function showQuestion(question){

    pictureContainer.innerHTML = `
        <img src="${question.img}">
    `;

    questionField.innerText = question.question;
    questionField.setAttribute("id",`${question.id}`);

    question.answers.forEach(answers => {
     
        let radio = document.createElement("input");
        radio.setAttribute("type","radio");
        radio.setAttribute("value",`${answers.value}`)
        radio.setAttribute("name",`question${question.id}`);
        radio.setAttribute("id",`${answers.value}`)
        radio.classList.add("hide");

        let button = document.createElement("label");
        button.classList.add("answer");
        button.innerText = answers.option;
        button.setAttribute("value", `${answers.value}`);
        button.setAttribute("for",`${answers.value}`)
 
        button.addEventListener("click", (el) =>{
           
            let allOptions = document.querySelectorAll(".answer");
            allOptions.forEach(e => {
                e.classList.remove("selectedOpt");
            });
       
            el.target.classList.add("selectedOpt");

            document.querySelector(".navigateButtons").classList.remove("opacity");
        });
        answersField.append(radio,button);
    });   
}
}
nextButton.addEventListener("click", ()=>{
    currentQuestionIndex++;

    let chosenAnswers = document.querySelectorAll(".selectedOpt");
    totalPoan += parseInt(chosenAnswers[0].attributes[1].value);

    if(currentQuestionIndex === 10){
        if(totalPoan<75){
            nextButton.style.display ="none";
            
            pictureContainer.innerHTML =`
                <img src="qPics/kaybettin.png">
            `;
        
            questionField.innerHTML =`
                <h2 style="color:red;">Uzgunum balim, Kazanamadin!</h2>
            `;

            answersField.style.display ="flex";
            answersField.style.justifyContent ="center";
            answersField.innerHTML = `
            <div style="width:80%; text-align:justify;">
            <p style="margin: 0;">Toplam poanin <span style="text-weight:bold; color:red">${totalPoan}</span>. 
            Neyse bugun dogum gunun oldugu icin
            yine de dile benden ne dilersen <i class='far fa-kiss-wink-heart' style='font-size:20px;color:red'></i></p>

            <div id="resultDiv" style="display: flex;justify-content: space-between; margin-top:20px;">
                <a href="fotoGram.php" style="text-decoration: none;color: red;display: flex;flex-direction: column; align-items:center;justify-content: center;">
                <i class='fas fa-file-image' style='color:black; font-size:36px'></i><p style="font-weight: bold;margin: 0;margin-top: 7px;">Albumler</p></a>
                <div id="startAgain" onclick="newGameStarter()" style="display: flex;justify-content: center;flex-direction: column;align-items: center;"><i style='font-size:24px;color:black' class='fas fa-gamepad'></i>
                    <p style="color:red; font-weight: bold;margin: 0;margin-top: 7px;">Yeni Oyun!</p></div>
                </div>
            </div>
            `;  
        }else{
            nextButton.style.display ="none";
    
            pictureContainer.innerHTML =`
            <img src="qPics/tebrikler.jpeg">
            `;
    
            document.querySelector(".question").innerHTML = `
            <h2 style="color:green;">Tebrik ederim balim, Kazandin!</h2>`;
    
            answersField.style.display ="flex";
            answersField.style.justifyContent ="center";
            answersField.innerHTML = `
            <div style="width:80%; text-align:justify;">
            <p style="margin: 0;">Toplam poanin <span style="text-weight:bold; color:green">${totalPoan}</span>. Kazandigin icin 
            dile benden ne dilersen <i class='far fa-kiss-wink-heart' style='font-size:20px;color:green'></i></p>

            <div id="resultDiv" style="display: flex;justify-content: space-between; margin-top:20px;">
                <a href="fotoGram.php" style="text-decoration: none;color: green;display: flex;flex-direction: column; align-items:center;justify-content: center;">
                <i class='fas fa-file-image' style='color:black; font-size:36px'></i><p style="font-weight: bold;margin: 0;margin-top: 7px;">Albumler</p></a>
                <div id="startAgain" onclick="newGameStarter()" style="display: flex;justify-content: center;flex-direction: column;align-items: center;"><i style='font-size:36px;color:black' class='fas fa-gamepad'></i>
                    <p style="color:green; font-weight: bold;margin: 0;margin-top: 7px;">Yeni Oyun!</p></div>
                </div>
            </div>
        `; 
        }
    }else{
        setNextQuestion();
    }
   
});

function newGameStarter(){
    totalPoan = 0;
    nextButton.style.display ="flex";
    answersField.style.display ="grid";
    startTheGame();
}

//Skapar quiz container - Frågor och Svar fältet
function createQuizContainer(){

    // Skapar quiz container
    let quizcontainer = document.createElement("div");
    quizcontainer.classList.add("container");

    let pictureContainer = document.createElement("div");
    pictureContainer.setAttribute("id","pictureContainer");

    //Skapar frågor container
    let questionsContainer = document.createElement("div");
    questionsContainer.classList.add("questionsContainer");

    //Skapar frågor div
    let question = document.createElement("div");
    question.classList.add("question");

    //Skapar svar fältet 
    let answersButtons = document.createElement("div");
    answersButtons.setAttribute("id","answersButtons")
   
    //Skapar navigation fältet 
    let navigateButtons = document.createElement("div");
    navigateButtons.classList.add("navigateButtons","opacity");

    //Skapar nästa pillen
    let rightArrow = document.createElement("button");
    rightArrow.setAttribute("id", "right");
    rightArrow.innerHTML = `&#x2192;`;

    navigateButtons.append(rightArrow);
    questionsContainer.append(question,answersButtons,navigateButtons);

    quizcontainer.append(pictureContainer,questionsContainer);
    document.querySelector("#playGround").append(quizcontainer);
};

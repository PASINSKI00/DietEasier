const weightInput = document.querySelector('#weight');
const genderInput = document.querySelector('#gender');
const ageInput = document.querySelector('#age');
const activityWorkInput = document.querySelector('#activity-work');
const activityPostWorkInput = document.querySelector('#activity-post-work');
const additionalCaloriesInput = document.querySelector('#additional-calories');
const proteinRatioInput = document.querySelector('#protein-ratio');
const carbsRatioInput = document.querySelector('#carbs-ratio');
const fatsRatioInput = document.querySelector('#fats-ratio');

const caloriesOutput = document.querySelector('.calories');
const proteinOutput = document.querySelector('.protein');
const carbsOutput = document.querySelector('.carbs');
const fatsOutput = document.querySelector('.fats');
const fiberOutput = document.querySelector('.fiber');
let activeButton = 1;
let workActivityButton = 1;
let postWorkActivityButton = 1;
let genderButton = 1;

document.body.onload = function (){
    getInformation();
};

document.querySelector('#update-button').onclick = updateInformation;

function getInformation(){
    fetch('/getInformation')
        .then((response) => {return response.json()})
        .then((information) => {
            weightInput.value = information['weight'];

            if(information['gender'] === 'male') genderButton = 1; else genderButton = 2;

            ageInput.value = information['age'];

            if(information['activity_work'] === 'lightly active') workActivityButton = 1;
            if(information['activity_work'] === 'moderately active') workActivityButton = 2;
            if(information['activity_work'] === 'very active') workActivityButton = 3;
            if(information['activity_post_work'] === 'lightly active') postWorkActivityButton = 1;
            if(information['activity_post_work'] === 'moderately active') postWorkActivityButton = 2;
            if(information['activity_post_work'] === 'very active') postWorkActivityButton = 3;

            additionalCaloriesInput.value = information['additional_calories'];
            proteinRatioInput.value = information['protein_ratio'];
            carbsRatioInput.value = information['carbs_ratio'];
            fatsRatioInput.value = information['fat_ratio'];
            if(information['diet_type'] === 'cut'){
                activeButton = 1;
            }
            if(information['diet_type'] === 'maintain'){
                activeButton = 3;
            }
            if(information['diet_type'] === 'bulk'){
                activeButton = 2;
            }
            caloriesOutput.innerHTML = information['tdee']+' kcal';
            proteinOutput.innerHTML = (information['protein_ratio']/100*information['tdee']/4).toFixed(1)+' g';
            carbsOutput.innerHTML = (information['carbs_ratio']/100*information['tdee']/4).toFixed(1)+' g';
            fatsOutput.innerHTML = (information['fat_ratio']/100*information['tdee']/9).toFixed(1)+' g';
            fiberOutput.innerHTML = (information['tdee']/1000*19).toFixed(1)+' g';
        }).then(function (){
            goalButtonsActive(activeButton);
            workActivityActive(workActivityButton);
            postWorkActivityActive(postWorkActivityButton);
            genderActive(genderButton);
        });
}

function updateInformation(){
    if((parseInt(proteinRatioInput.value) + parseInt(carbsRatioInput.value) + parseInt(fatsRatioInput.value)) !== 100){
        alert("Ratios need to add up to 100")
        return;
    }

    const data = {
        weight: weightInput.value,
        id_gender: genderButton,
        age: ageInput.value,
        id_activity_work: workActivityButton,
        id_activity_post_work: postWorkActivityButton,
        additional_calories: additionalCaloriesInput.value,
        id_diet_type: activeButton,
        protein_ratio: proteinRatioInput.value,
        carbs_ratio: carbsRatioInput.value,
        fat_ratio: fatsRatioInput.value
    };

    fetch('/updateInformation', {
        method: 'POST',
        headers: {'Content-type': 'application/json'},
        body: JSON.stringify(data)
    })
    .then(() => {
        getInformation();
    })
}

function goalButtonsActive(number){
    document.querySelectorAll('.goals-button').forEach(button => {button.classList.remove('goals-button-active');});
    document.querySelector('.goal'+number).classList.add('goals-button-active');

    activeButton = number;
}

function workActivityActive(number){
    document.querySelectorAll('.work').forEach(button => {button.classList.remove('activity-level-button-active');});
    document.querySelector('.work'+number).classList.add('activity-level-button-active');

    workActivityButton = number;
}

function postWorkActivityActive(number){
    document.querySelectorAll('.post-work').forEach(button => {button.classList.remove('activity-level-button-active');});
    document.querySelector('.post-work'+number).classList.add('activity-level-button-active');

    postWorkActivityButton = number;
}

function genderActive(number){
    document.querySelectorAll('.gender').forEach(button => {button.classList.remove('activity-level-button-active');});
    document.querySelector('.gender'+number).classList.add('activity-level-button-active');

    genderButton = number;
}


const weightInput = document.querySelector('#weight');
const genderInput = document.querySelector('#gender');
const ageInput = document.querySelector('#age');
const activityWorkInput = document.querySelector('#activity-work');
const activityPostWorkInput = document.querySelector('#activity-post-work');
const additionalCalories = document.querySelector('#additional-calories');

const caloriesOutput = document.querySelector('.calories');
const proteinOutput = document.querySelector('.protein');
const carbsOutput = document.querySelector('.carbs');
const fatsOutput = document.querySelector('.fats');
const fiberOutput = document.querySelector('.fiber');
let activeButton = 1;

document.body.onload = function (){
    getInformation();
};

document.querySelector('#update-button').onclick = updateInformation;

function getInformation(){
    fetch('/getInformation')
        .then((response) => {return response.json()})
        .then((information) => {
            weightInput.value = information['weight'];
            genderInput.value = information['gender'];
            ageInput.value = information['age'];
            activityWorkInput.value = information['activity_work'];
            activityPostWorkInput.value = information['activity_post_work'];
            additionalCalories.value = information['additional_calories'];
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
        });
}

function updateInformation(){
    let activityPostWork;
    let activityWork;
    let gender;

    if(genderInput.value === 'male')
        gender=1;
    else
        gender= 2;

    if(activityWorkInput.value === 'lightly active') activityWork = 1;
    if(activityWorkInput.value === 'moderately active') activityWork = 2;
    if(activityWorkInput.value === 'very active') activityWork = 3;

    if(activityPostWorkInput.value === 'lightly active') activityPostWork = 1;
    if(activityPostWorkInput.value === 'moderately active') activityPostWork = 2;
    if(activityPostWorkInput.value === 'very active') activityPostWork = 3;

    const data = {
        weight: weightInput.value,
        id_gender: gender,
        age: ageInput.value,
        id_activity_work: activityWork,
        id_activity_post_work: activityPostWork,
        additional_calories: additionalCalories.value,
        id_diet_type: activeButton
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
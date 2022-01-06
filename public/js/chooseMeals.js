const addBtn = document.querySelector('#add-day');
addBtn.onclick = addDay;
const chosenMeals = document.querySelector('.chosen-meals');

let currentlyActiveButton = 1;
let numberOfDays = 0;
let mapDaysToArrays = new Map();

document.body.onload = function (){
        addDay();
        getAllCategories();
    };

function addDay(){
    mapDaysToArrays.set(++numberOfDays, new Array());

    document.querySelector('#day-numbers').insertAdjacentHTML(
        "beforeend",
        "<button class=\"day-btn btn-"+numberOfDays+"\" onclick=\"activeButton("+numberOfDays+")\">"+numberOfDays+"</button>"
    );

    currentlyActiveButton = numberOfDays;
    activeButton(currentlyActiveButton);
}

function activeButton(i){
    for(let btn of document.querySelectorAll('.day-btn')){
        btn.classList.remove("btn-active");
    }

    currentlyActiveButton = i;
    document.querySelector('.btn-'+i).classList.add("btn-active");
    displayMeals();
}

function addMealToDay(id){
    mapDaysToArrays.get(currentlyActiveButton).push(id);

    displayMeal(id);
}

async function getMealInfo(id){
    const response = await fetch('/getMealTitleAndImage/'+id);
    return await response.json();
}

async function displayMeal(mealId){
    let meal;

    meal = await getMealInfo(mealId);

    chosenMeals.insertAdjacentHTML(
        "beforeend",
        "<div class=\"chosen-meal\">\n" +
        "    <div class=\"chosen-meal-img-or-i\"><img src=\"public/uploads/" + meal['image'] + "\" alt=\"pancakes\"></div>\n" +
        "    <div class=\"chosen-meal-content\">" + meal['title'] + "</div>\n" +
        "</div>"
    );
}

async function displayMeals(){
    let meal;

    chosenMeals.innerHTML = "";

    for (let mealId of mapDaysToArrays.get(currentlyActiveButton)) {

        meal = await getMealInfo(mealId);

        chosenMeals.insertAdjacentHTML(
            "beforeend",
            "<div class=\"chosen-meal\">\n" +
            "    <div class=\"chosen-meal-img-or-i\"><img src=\"public/uploads/" + meal['image'] + "\" alt=\"pancakes\"></div>\n" +
            "    <div class=\"chosen-meal-content\">" + meal['title'] + "</div>\n" +
            "</div>"
        );
    }
}

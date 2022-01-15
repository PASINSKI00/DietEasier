const addBtn = document.querySelector('#add-day');
addBtn.onclick = addDay;
const chosenMeals = document.querySelector('.chosen-meals');

let currentlyActiveButton = 1;
let numberOfDays = 0;
let mapDaysToArrays = new Map();

document.body.onload = function (){
        addDay();
        getAllCategories();
        getLastUnconfirmedOrder();
    };

window.onbeforeunload = updateOrder;

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

async function addMealToDay(id){
    mapDaysToArrays.get(currentlyActiveButton).push(id);

    await displayMeal(id);
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

function getLastUnconfirmedOrder(){
    fetch('/getLastUnconfirmedOrder')
        .then(response => { return response.json() })
        .then(async data => {
            console.log(data);
            for(let i=2; i<=data[data.length-1]['day']; i++){
                addDay();
            }

            data.forEach(function (arr) {
                    console.log(arr);
                    mapDaysToArrays.get(arr['day']).push(arr['id_meal'])
                });

            await displayMeals();
        });
}

function updateOrder(){
    fetch('/updateOrder', {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify(Array.from(mapDaysToArrays.entries()))
    })
        .then(response => {
            return response.json();
        });
}

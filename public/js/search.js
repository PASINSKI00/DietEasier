const searchInput = document.querySelector('#search-meal');
const mealContainer = document.querySelector('#meals');
const sortByList = document.querySelector('.sort-by-list');
const categoriesList = document.querySelector('.categories-list');

searchInput.addEventListener('keyup', function (event){
    if(event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            return response.json();
        }).then(function (meals) {
            mealContainer.innerHTML = "";
            loadMeals(meals);
        }) ;
    }
});

function displayAllMeals(){
    const data = {search: ""};

    fetch("/search", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    }).then(function (response) {
        return response.json();
    }).then(function (meals) {
        mealContainer.innerHTML = "";
        loadMeals(meals);
    }) ;
}

function loadMeals(meals) {
    meals.forEach(async meal => {
        await createMeal(meal);
    });
}

async function createMeal(meal) {
    const template = document.querySelector("#meal-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${meal.image}`;

    const title = clone.querySelector(".meal-title");
    title.innerHTML = meal.title;

    const ingredients = clone.querySelector(".meal-ingridients");
    const mealIngredients = await getIngredientsOfAMeal(meal.id_meal);
    let i=0;
    let text = "";
    for (let ingredient of mealIngredients) {
        if (i++ !== 0)
            text = ", ";
        text += ingredient.name;
        ingredients.insertAdjacentHTML("beforeend", text);
        text = "";
    };

    const href = clone.querySelector(".meal-information");
    href.href = "/meal/"+meal.id_meal;

    //TODO FINISH INSERTING VALUES

    const button = clone.querySelector(".meal-add-button");
    button.setAttribute("onclick", "addMealToDay("+meal.id_meal+")");
    mealContainer.appendChild(clone);
}

async function getIngredientsOfAMeal(mealId){
    const ingredients = await fetch('/getIngredientsOfAMeal/'+mealId);
    return ingredients.json();
}

async function getAllCategories(){
    const response = await fetch('/getAllCategories');
    const categories = await response.json();

    for(let category of categories){
        loadCategory(category);
    }
}

function loadCategory(category){
    categoriesList.insertAdjacentHTML("beforeend", "<button class=\"enlarge category-button-"+category.id_category+" btn\" onclick=\"actionCategory("+category.id_category+")\">"+category.name+"</button>");
}

function actionCategory(id){
    if(document.querySelector('.category-button-'+id).classList.contains('active-category'))
    {
        removeCategory(id);
        return;
    }
    addCategory(id);
}

let categories = new Set();

function addCategory(id){
    document.querySelector('.category-button-'+id).classList.add('active-category');
    categories.add(id);
    executeCategory();
}

function removeCategory(id){
    document.querySelector('.category-button-'+id).classList.remove('active-category');
    categories.delete(id);

    if(categories.size === 0)
        displayAllMeals()
    else
        executeCategory();
}

async function executeCategory(){
    const categoryData = Array.from(categories);

    fetch("/searchCategory", {
        method: "POST",
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(categoryData)
    })
    .then(function (response){return response.json()})
    .then(function (meals) {
    mealContainer.innerHTML = "";
    loadMeals(meals);
    });
}
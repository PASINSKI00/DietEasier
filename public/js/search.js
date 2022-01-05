const search = document.querySelector('#search-meal');
const mealContainer = document.querySelector('#meals');

search.addEventListener('keyup', function (event){
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

function loadMeals(meals) {
    meals.forEach(async meal => {
        console.log(meal);
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
    console.log(mealIngredients);
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
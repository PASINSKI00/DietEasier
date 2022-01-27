function getLastUnconfirmedOrder(){
    fetch('/getLastUnconfirmedOrder')
        .then(response => { return response.json() })
        .then(async data => {
            for(let i=2; i<=data[data.length-1]['day']; i++){
                addDay();
            }

            data.forEach(function (arr) {
                mapDaysToArrays.get(arr['day']).push(arr['id_meal'])
            });

            await displayMeals();
        });
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
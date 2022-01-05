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
    meals.forEach(meal => {
        console.log(meal);
        createMeal(meal);
    });
}

function createMeal(meal) {
    const template = document.querySelector("#meal-template");

    const clone = template.content.cloneNode(true);

    const image = clone.querySelector("img");
    image.src = `/public/uploads/${meal.image}`;

    const title = clone.querySelector(".meal-title");
    title.innerHTML = meal.title;

    //TODO FINISH INSERTING VALUES

    mealContainer.appendChild(clone);
}
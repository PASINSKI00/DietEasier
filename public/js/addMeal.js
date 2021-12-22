const ingredientsForm = document.querySelector("#ingredients-form");
const ingredientsFormAdd = document.querySelector("#ingredients-form-add");
const ingredientsDatalist = document.querySelector('datalist#ingredients')
const categoriesForm = document.querySelector("#categories-form");
const categoriesFormAdd = document.querySelector("#categories-form-add");
const categoriesDatalist = document.querySelector('datalist#categories')

const inputIngredients = "<div class=\"ingredients-form-inputs\">\n" +"<input list=\"ingredients\" name=\"ingredient\" id=\"ingredient\" placeholder=\"Choose Ingredient\">\n" +"<input type=\"number\" name=\"ingredient-weight\" id=\"ingredient-weight\" placeholder=\"Weight\">\n" +"</div>";
const inputCategories = "<input list=\"categories\" name=\"ingredient\" id=\"ingredient\" placeholder=\"Choose Category\">";

ingredientsFormAdd.onclick = createInputIngredients;
categoriesFormAdd.onclick = createInputCategories;

document.body.onload = function() {getAllIngredients(); getAllCategories();};

function createInputIngredients() {
    ingredientsForm.insertAdjacentHTML("beforeend", inputIngredients);
}

function createInputCategories() {
    categoriesForm.insertAdjacentHTML("beforeend", inputCategories);
}

function getAllIngredients() {
    fetch("/getAllIngredients")
        .then(function (res){
            return res.json();
        })
        .then(function (ingredients){
            ingredientsDatalist.innerHTML = "";
            loadIngredients(ingredients);
        });
}

function loadIngredients(ingredients){
    ingredients.forEach(ingredient => {
        console.log(ingredient.name)
        ingredientsDatalist.insertAdjacentHTML("beforeend", "<option value=\""+ingredient.name+"\"></option>");
    });
}

function getAllCategories() {
    fetch("/getAllCategories")
        .then(function (res){
            return res.json();
        })
        .then(function (categories){
            categoriesDatalist.innerHTML = "";
            loadCategories(categories);
        });
}

function loadCategories(categories){
    categories.forEach(category => {
        console.log(category.name)
        categoriesDatalist.insertAdjacentHTML("beforeend", "<option value=\""+category.name+"\"></option>");
    });
}


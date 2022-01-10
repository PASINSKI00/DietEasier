const ingredientsForm = document.querySelector("#ingredients-form");
const ingredientsFormAdd = document.querySelector("#ingredients-form-add");
const ingredientsDatalist = document.querySelector('datalist#ingredients')
const categoriesForm = document.querySelector("#categories-form");
const categoriesFormAdd = document.querySelector("#categories-form-add");
const categoriesDatalist = document.querySelector('datalist#categories')
const messagesOutput = document.querySelector('.messages');

const inputCategories = "<input list=\"categories\" name=\"category\" placeholder=\"Choose Category\">";

let ingredientNumber = 0;
let allIngredients = {};
let allCategories = {};

document.body.onload = function() {
    getAllIngredients();
    getAllCategories();
    createInputIngredients();
    createInputCategories();
};

ingredientsFormAdd.onclick = createInputIngredients;
categoriesFormAdd.onclick = createInputCategories;
document.querySelector('#submit-button').onclick = postMeal;

function postMeal(){
    const formData = new FormData();
    formData.append('title',document.querySelector('input[name=\'name\']').value);
    formData.append('time_to_prep',document.querySelector('input[name=\'time\']').value);
    formData.append('recipe',document.querySelector('textarea[name=\'recipe\']').value);
    formData.append('description',document.querySelector('textarea[name=\'description\']').value);

    const image = document.querySelector('input[type=\'file\']').files[0];

    formData.append('image',image, image.name);

    let i = 1;
    document.querySelectorAll('input[name=\'ingredient\']').forEach(inputIngredient => {
        allIngredients.forEach(ingredient => {
            if(ingredient['name'] === inputIngredient.value){
                formData.append('ingredients_ids[]', ingredient['id_ingredient']);
                formData.append('ingredients_weights[]', (document.querySelector('input[name=\'weight'+ i++ +'\']').value/100).toFixed(2));
            }
        });
    });

    document.querySelectorAll('input[name=\'category\']').forEach(inputCategory => {
        allCategories.forEach(category => {
            if(category['name'] === inputCategory.value){
                formData.append('categories_ids[]', category['id_category']);
            }
        });
    });

    fetch('/postMeal',{
        method: 'POST',
        body: formData
    }).then(response => {
        if(response.status === 200){
            messagesOutput.textContent = "Meal has been successfully added";
            window.setTimeout(function (){
                window.location.href = "/home";
            }, 3000);
        }
        else{
            messagesOutput.textContent = "Something went wrong"
        }
    });
}

function createInputIngredients() {
    ingredientNumber++;
    ingredientsForm.insertAdjacentHTML("beforeend",
        "<div class=\"ingredients-form-inputs\">\n"
            +"<input list=\"ingredients\" name=\"ingredient\" placeholder=\"Choose Ingredient\">\n"
            +"<input type=\"number\" name=\"weight"+ingredientNumber+"\" placeholder=\"Weight [g]\">\n"
        +"</div>");
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
            allIngredients = ingredients;
            ingredientsDatalist.innerHTML = "";
            loadIngredients(ingredients);
        });
}

function loadIngredients(ingredients){
    ingredients.forEach(ingredient => {
        ingredientsDatalist.insertAdjacentHTML("beforeend", "<option value=\""+ingredient.name+"\"></option>");
    });
}

function getAllCategories() {
    fetch("/getAllCategories")
        .then(function (res){
            return res.json();
        })
        .then(function (categories){
            allCategories = categories;
            categoriesDatalist.innerHTML = "";
            loadCategories(categories);
        });
}

function loadCategories(categories){
    categories.forEach(category => {
        categoriesDatalist.insertAdjacentHTML("beforeend", "<option value=\""+category.name+"\"></option>");
    });
}


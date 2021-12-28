const registerForm = document.querySelector("#register-form");
const nameInput = registerForm.querySelector('#register-form>input[name=\"name\"]');
const emailInput = registerForm.querySelector('#register-form>input[name="email"]');
const passwordInput = registerForm.querySelector('#register-form>input[name="password"]');
const confirmedPasswordInput = registerForm.querySelector('input[name="confirmedPassword"]');
const messages = document.querySelector('.signup .messages');

function isEmail(email) {
    return /\S+@\S+\.\S+/.test(email);
}

function arePasswordsTheSame(password, confirmedPassword){
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add('no-valid') : element.classList.remove('no-valid');
}
function validateEmail () {
    setTimeout(function () {
        markValidation(emailInput, isEmail(emailInput.value));
    }, 1000);
}


function validatePassword() {
    setTimeout(function () {
        const condition = arePasswordsTheSame(
            confirmedPasswordInput.value,
            confirmedPasswordInput.previousElementSibling.value
        );

        markValidation(confirmedPasswordInput, condition)
    }, 1000);
}

emailInput.addEventListener('keyup', validateEmail);
confirmedPasswordInput.addEventListener('keyup', validatePassword);

registerForm.addEventListener('submit', function (e) {
    e.preventDefault();

    if( typeof  nameInput === 'undefined' ||
        typeof  emailInput === 'undefined' ||
        typeof  passwordInput === 'undefined' ||
        typeof  confirmedPasswordInput === 'undefined' ||
        !isEmail(emailInput.value) ||
        !arePasswordsTheSame(passwordInput.value, confirmedPasswordInput.value)
    ){
        messages.innerHTML = "Please fill all of the boxes with correct data";
        return false;
    }

    const data = {
        "name": this.name.value,
        "email": this.email.value,
        "password": this.password.value,
    }
    register(data);
});

function register(data){

    fetch("/register",
        {
            method: "POST",
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(data)
        })
        .then(function (response) {
            if(response.status == 200){
                messages.style.color = "green";
                messages.innerHTML = "Welcome to the team! <br> You'll be redirected";
                window.setTimeout(function (){
                    window.location.href = "/information";
                }, 3000);
            }
            else {
                messages.innerHTML = "Something went wrong...";
            }
        });
}


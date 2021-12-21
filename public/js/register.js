const registerForm = document.querySelector("#register-form");
const emailInput = registerForm.querySelector('input[name="email"]');
const confirmedPasswordInput = registerForm.querySelector('input[name="confirmedPassword"]');

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

emailInput.addEventListener('keyup', validateEmail);

function validatePassword() {
    setTimeout(function () {
        const condition = arePasswordsTheSame(
            confirmedPasswordInput.value,
            confirmedPasswordInput.previousElementSibling.value
        );

        markValidation(confirmedPasswordInput, condition)
    }, 1000);
}

confirmedPasswordInput.addEventListener('keyup', validatePassword);


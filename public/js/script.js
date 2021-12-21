function openLogin() {
    document.getElementById("log-in").style.display = "flex";    
    document.getElementById("overlay").style.display = "block";
    document.getElementById("log-in").style.opacity = '1'; 

}

function openSignUp() {
    document.getElementById("sign-up").style.display = "flex";    
    document.getElementById("overlay").style.display = "block";   
}

function hideLogins() {
    document.getElementById("log-in").style.display = "none";    
    document.getElementById("sign-up").style.display = "none";    
    document.getElementById("overlay").style.display = "none";   
}


const form = document.getElementById('registerForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');


const passwordError = document.getElementById('password-error'); 

function validate(e) {
    e.preventDefault();

    passwordError.textContent = ''; 
    
    if (emailInput.value === "") {
        alert("Please enter your email."); 
        emailInput.focus();
        return;
    }


    if (passwordInput.value === "") {
        passwordError.textContent = "Please enter your password."; 
        passwordInput.focus();
        return;
    }

   
    if (!emailValid(emailInput.value)) {
        alert("Please enter a valid email address."); 
        emailInput.focus();
        return;
    }

    
    if (!passwordValid(passwordInput.value)) {
        
        passwordError.textContent = "Password must be 8+ chars, with 1 uppercase letter and 1 number.";
        passwordInput.focus();
        return;
    }

    
    alert("Validation Successful!");
    
}


function emailValid(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

const passwordValid = (password) => {
    const passwordRegex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
    return passwordRegex.test(password);
}


form.addEventListener('submit', validate);
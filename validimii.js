const form = document.getElementById('registerForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

const passwordError = document.getElementById('password-error');

function validate(e) {
    e.preventDefault();

    passwordError.textContent = '';

    if (emailInput.value.trim() === "") {
        alert("Please enter your email.");
        emailInput.focus();
        return;
    }

    if (passwordInput.value.trim() === "") {
        passwordError.textContent = "Please enter your password.";
        passwordInput.focus();
        return;
    }

    if (!emailRegex.test(emailInput.value)) {
        alert("Please enter a valid email address.");
        emailInput.focus();
        return;
    }

    const passwordRegex = /^(?=.*\d)(?=.*[A-Z]).{8,}$/;
    if (!passwordRegex.test(passwordInput.value)) {
        passwordError.textContent =
            "Password must be at least 8 characters, include 1 uppercase letter and 1 number.";
        passwordInput.focus();
        return;
    }

    form.submit();
}

form.addEventListener('submit', validate);
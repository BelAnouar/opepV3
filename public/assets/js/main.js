const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');
const registerBtn = document.getElementById('registerBtn');

const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
const passwordPattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;

emailInput.addEventListener('input', function() {
    if (!emailPattern.test(this.value)) {
        emailError.textContent = 'Please enter a valid email address';
        registerBtn.disabled = true;
    } else {
        emailError.textContent = '';
        validateInputs();
    }
});

passwordInput.addEventListener('input', function() {
    if (!passwordPattern.test(this.value)) {
        passwordError.textContent = 'Password must contain at least 8 characters, including one uppercase letter, one lowercase letter, one number, and one special character';
        registerBtn.disabled = true;
    } else {
        passwordError.textContent = '';
        validateInputs();
    }
});

function validateInputs() {
    if (emailPattern.test(emailInput.value) && passwordPattern.test(passwordInput.value)) {
        registerBtn.disabled = false;
    }}
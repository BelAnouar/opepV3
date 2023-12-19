const firstNameInput = document.getElementById('firstName');
const lastNameInput = document.getElementById('lastName');
const firstNameError = document.getElementById('firstNameError');
const lastNameError = document.getElementById('lastNameError');



const namePattern = /^[A-Za-z]+$/;

firstNameInput.addEventListener('input', function() {
    if (!namePattern.test(this.value)) {
        firstNameError.textContent = 'Please enter a valid first name';
        registerBtn.disabled = true;
    } else {
        firstNameError.textContent = '';
        validateInputs();
    }
});

lastNameInput.addEventListener('input', function() {
    if (!namePattern.test(this.value)) {
        lastNameError.textContent = 'Please enter a valid last name';
        registerBtn.disabled = true;
    } else {
        lastNameError.textContent = '';
        validateInputs();
    }
});

// Validate all inputs to enable/disable the Register button

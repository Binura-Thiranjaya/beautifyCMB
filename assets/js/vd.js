
const mobileInput = document.getElementById("mobile");
const mobileRegex = /^[0]\d{9}$/;

mobileInput.addEventListener("input", function() {
    const mobileValue = mobileInput.value;
    if (mobileRegex.test(mobileValue)) {
        mobileInput.setCustomValidity("");
        document.querySelector(".mobile-message").innerHTML = "";
    } else {
    if (mobileValue.length > 0 && mobileValue.charAt(0) !== '0') {
        mobileInput.setCustomValidity("Mobile number should start with a 0.");
        document.querySelector(".mobile-message").innerHTML = "Mobile number should start with a 0.";
    } else {
        mobileInput.setCustomValidity("Please enter a valid Sri Lankan mobile number.");
        document.querySelector(".mobile-message").innerHTML = "Please enter a valid Sri Lankan mobile number.";
    }
    }
});


const zipInput = document.getElementById("zip");
const zipRegex = /[0-9]{5}/;

zipInput.addEventListener("input", function() {
    const zipValue = zipInput.value;
    if (zipRegex.test(zipValue)) {
    zipInput.setCustomValidity("");
    } else {
    zipInput.setCustomValidity("Please enter a valid zip code.");
    }
});

const passwordInput = document.getElementById("password");
const confirmPasswordInput = document.getElementById("confirm-password");

const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/;

passwordInput.addEventListener("input", function() {
    const passwordValue = passwordInput.value;
    if (passwordRegex.test(passwordValue)) {
    passwordInput.setCustomValidity("");
    document.querySelector(".password-message").innerHTML = "";
    } else {
    passwordInput.setCustomValidity("Please enter a strong password with at least 8 characters, including letters and numbers. No Special Characters ara allowed !");
    document.querySelector(".password-message").innerHTML = "Please enter a strong password with at least 8 characters, including letters and numbers. No Special Characters ara allowed !";
    }
});

confirmPasswordInput.addEventListener("input", function() {
    const confirmPasswordValue = confirmPasswordInput.value;
    if (confirmPasswordValue === passwordInput.value) {
    confirmPasswordInput.setCustomValidity("");
    document.querySelector(".confirm-password-message").innerHTML = "";
    } else {
    confirmPasswordInput.setCustomValidity("Passwords do not match.");
    document.querySelector(".confirm-password-message").innerHTML = "Passwords do not match.";
    }
});

const passwordInput2 = document.getElementById("password");
const passwordInput3 = document.getElementById("confirm-password");
const passwordToggleBtn = document.getElementById("show-hide-password-btn");

passwordToggleBtn.addEventListener("click", function() {
    const type = passwordInput.getAttribute("type") === "password" ? "text" : "password";
    passwordInput2.setAttribute("type", type);
    passwordInput3.setAttribute("type", type);
    passwordToggleBtn.textContent = type === "password" ? " Show Password" : " Hide Password";
});
function togglePasswordVisibility() {
    const passwordInput = document.getElementById("password");
    const passwordToggle = document.querySelector(".password-toggle");
    if (passwordInput.type === "password") {
        passwordInput.type = "text";
    } else {
        passwordInput.type = "password";
    }
}

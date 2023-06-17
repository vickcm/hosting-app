function togglePasswordVisibility() {
    var passwordInput = document.getElementById('password');
    var passwordToggleOpenIcon = document.querySelector('.password-toggle-open-icon');
    var passwordToggleSlashIcon = document.querySelector('.password-toggle-slash-icon');

    if (passwordInput.type === 'password') {
        passwordInput.type = 'text';
        passwordToggleOpenIcon.style.display = 'none';
        passwordToggleSlashIcon.style.display = 'block';
    } else {
        passwordInput.type = 'password';
        passwordToggleOpenIcon.style.display = 'block';
        passwordToggleSlashIcon.style.display = 'none';
    }
}

// Ocultar el ícono de la contraseña visible al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    var passwordToggleOpenIcon = document.querySelector('.password-toggle-open-icon');
    passwordToggleOpenIcon.style.display = 'none';
});
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const passwordToggleOpenIcon = document.querySelector('.password-toggle-open-icon');
    const passwordToggleSlashIcon = document.querySelector('.password-toggle-slash-icon');

    const isPasswordVisible = passwordInput.type === 'text';

    passwordInput.type = isPasswordVisible ? 'password' : 'text';
    passwordToggleOpenIcon.style.display = isPasswordVisible ? 'none' : 'block';
    passwordToggleSlashIcon.style.display = isPasswordVisible ? 'block' : 'none';
}

// Ocultar el ícono de la contraseña visible al cargar la página
document.addEventListener('DOMContentLoaded', function() {
    const passwordToggleOpenIcons = document.querySelectorAll('.password-toggle-open-icon');
    for (let i = 0; i < passwordToggleOpenIcons.length; i++) {
        passwordToggleOpenIcons[i].style.display = 'none';
    }
});
 


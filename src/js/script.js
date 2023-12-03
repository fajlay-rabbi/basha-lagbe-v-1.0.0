let avatar = document.getElementById('avatar-container');
let avatarDropdown = document.getElementById('avatar-dropdown');

avatar.addEventListener('click', function() {
    avatarDropdown.classList.toggle('show');
});
document.addEventListener('DOMContentLoaded', function() {
    const toggleButton = document.getElementById('toggle-btn');
    const menuDropdown = document.getElementById('menu-dropdown');

    toggleButton.addEventListener('click', function() {
        // Toggle the visibility of the dropdown menu
        menuDropdown.style.display = menuDropdown.style.display === 'none' || menuDropdown.style.display === '' ? 'block' : 'none';
    });

    // Optionally, hide the menu when clicking outside of it
    window.addEventListener('click', function(event) {
        if (!menuDropdown.contains(event.target) && !toggleButton.contains(event.target)) {
            menuDropdown.style.display = 'none';
        }
    });
});

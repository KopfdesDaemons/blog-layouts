function lime_blog_toggle_menu() {
    var menu = document.querySelector('#lime_blog_header');
    menu.classList.toggle('lime_blog_header_menu_open');
}

window.addEventListener("DOMContentLoaded", function() {

// header mobile submenu toggle
const header_submenu_toggle = document.querySelectorAll('.lime_blog_submenu_toggle');

for (const toggle of header_submenu_toggle) {
    toggle.addEventListener('click', toggleSubMenu);
    toggle.addEventListener('keydown', (event) => {
        if (event.key === 'Enter') {
            toggleSubMenu(event);
        }
    });
}

function toggleSubMenu(event) {
    event.stopPropagation();

    const toggleButton = event.target;
    const listItemContainer = toggleButton.parentElement;
    const listItem = listItemContainer.parentElement;
    const submenu = listItemContainer.parentElement.querySelector('.sub-menu');

    // close all open menus
    const allOpenMenus = document.querySelectorAll('.lime_blog_submenu_open');
    const parentListItem = listItem.parentElement.parentElement;
    const isInOpenSubmenu = parentListItem.classList.contains('lime_blog_submenu_open');
    
    if (!isInOpenSubmenu) {
        for (const menu of allOpenMenus) {
            if (menu === submenu.parentElement) continue;
            menu.classList.remove('lime_blog_submenu_open');
        }
    }

    listItem.classList.toggle('lime_blog_submenu_open');
}

}, false);
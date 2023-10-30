function clean_space_toggle_menu() {
    var menu = document.querySelector('#clean_space_header');
    menu.classList.toggle('clean_space_header_menu_open');
}

window.addEventListener("DOMContentLoaded", function() {

    // header mobile submenu toggle
    const header_submenu_toggle = document.querySelectorAll('.clean_space_submenu_toggle');
    for(const toggle of header_submenu_toggle){
        toggle.addEventListener('click', (event) => {
            event.stopPropagation();

            const toggleButton = event.target;
            const listItemContainer = toggleButton.parentElement;
            const listItem = listItemContainer.parentElement;
            const submenu = listItemContainer.parentElement.querySelector('.sub-menu');

            
            // close all open menus
            const allOpenMenus = document.querySelectorAll('.clean_space_submenu_open');
            const parentListItem = listItem.parentElement.parentElement;
            const isInOpenSubmenu = parentListItem.classList.contains('clean_space_submenu_open');
            if (!isInOpenSubmenu){
                for (const menu of allOpenMenus) {
                    if (menu === submenu.parentElement) continue;
                    menu.classList.remove('clean_space_submenu_open');
                }
            }
            listItem.classList.toggle('clean_space_submenu_open');
        })
    }
}, false);
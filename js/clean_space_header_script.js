function clean_space_toggle_menu() {
    var menu = document.querySelector('#clean_space_header');
    menu.classList.toggle('clean_space_header_menu_open');
}

window.addEventListener("DOMContentLoaded", function() {

    // header mobile submenu toggle
    const header_submenu_toggle = document.querySelectorAll('.menu-item-has-children');
    for(const toggle of header_submenu_toggle){
        toggle.addEventListener('click', (event) => {
            event.stopPropagation();
            const toggleBtnParentMenu = event.target.querySelector('.sub-menu');

            // close all open menus
            const allOpenMenus = document.querySelectorAll('.clean_space_submenu_open');
            const isInSubmenu = toggleBtnParentMenu.parentElement.parentElement.classList.contains('clean_space_submenu_open');
            if (!isInSubmenu){
                for (const menu of allOpenMenus) {
                    if (menu === toggleBtnParentMenu) continue;
                    menu.classList.remove('clean_space_submenu_open');
                }
            }
            console.log(toggleBtnParentMenu);
            toggleBtnParentMenu.classList.toggle('clean_space_submenu_open');
        })
    }
}, false);
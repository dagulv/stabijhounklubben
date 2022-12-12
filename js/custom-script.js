let hamburger = document.querySelector(".hamburger");
let mobile_nav = document.querySelector(".nav-menu");
// let sub_menus = document.querySelectorAll(".sub-menu");
let drops = document.querySelectorAll(".drop");
let search = document.querySelector(".search-submit");
let search_field = document.querySelector(".search-field");
let mobile_dropdown = document.querySelectorAll(".dropdown-icon");

/* Hamburger toggle */
hamburger.addEventListener("click", () => {
    hamburger.classList.toggle("is-active");
    mobile_nav.classList.toggle("nav-active");
});


/* Dropdowns sub-menu mobile */

function subMenuPopUp(element) {
    let sub_menu = element.parentElement.parentElement.querySelector('.sub-menu');
    sub_menu.classList.toggle("display-block");
    
}

//Dropdown reposition
let dropdown_items = document.querySelectorAll(".menu-item");
const getTotalWidth = (children) => {    
    let totalWidth = 0;
    for(let i = 0; i < children.length; i++) {
        totalWidth += children[i].offsetWidth;
    }
    return totalWidth;
}
dropdown_items.forEach(item => {
    let children = item.querySelectorAll('li.menu-item-has-children > .sub-menu');
    let menuWidth = getTotalWidth(children);
    let startPosition = item.getBoundingClientRect().right;
    let windowW = window.innerWidth;
    if (menuWidth + startPosition >= windowW) {
        children.forEach(subMenu => {subMenu.classList.add('reverse-dropdown')});
    }
});

// login dialog popup
// No scroll on dialog popup

let buttonPopUplogin = document.querySelectorAll(".btnPopUpLogin");
let dialogPopUpLogin = document.getElementById("dialogPopUpLogin");
let buttonPopUploginClose = document.querySelector(".btnDialogPopUpLoginClose");
if (buttonPopUplogin) {
    buttonPopUplogin.forEach(btn => {
        btn.addEventListener('click', () => {
            dialogPopUpLogin.showModal();
            // document.querySelector("body").style.overflow = 'hidden';
        });
    });
    if (dialogPopUpLogin) {
        dialogPopUpLogin.addEventListener('click', (e) => {
            if (e.target === dialogPopUpLogin || e.target === buttonPopUploginClose) {
                dialogPopUpLogin.close();
                // document.querySelector("body").style.overflow = 'visible';
            }
        });
    }
}





//Form validation
const inputs = document.querySelectorAll('input');
inputs.forEach( input => {
    input.addEventListener('invalid', e => {
        input.classList.add('invalidStyle');
    }, false);
});


// Toggle search
let search_button = document.querySelector('.open-search');
let search_form = document.querySelector('.search-form');
let icon_search = document.querySelector('.search-icon');
let icon_close = document.querySelector('.search-close')
search_button.addEventListener('click', e => {
    search_form.classList.toggle('toggle-search-form');
    icon_search.classList.toggle('toggle-opacity');
    icon_close.classList.toggle('toggle-opacity');
});

// dialog toggle login/register
let login_dialog_toggle = document.querySelectorAll(".dialogToggle-login");
let pass_dialog_toggle = document.querySelector(".dialogToggle-pass");
let login_dialog_form = document.querySelector(".form-container-login");
let pass_dialog_form = document.querySelector(".form-container-pass");
login_dialog_toggle.forEach((e) => {e.addEventListener('click', () => {
    login_dialog_form.classList.add('login-form-active');
    pass_dialog_form.classList.remove('login-form-active');
})});
if (pass_dialog_toggle) {
    pass_dialog_toggle.addEventListener('click', () => {
        login_dialog_form.classList.remove('login-form-active');
        pass_dialog_form.classList.add('login-form-active');
    });
}
/*Header image full width */
let header_wrapper = document.querySelector(".tall-header");
if (header_wrapper) {
    let header_image = header_wrapper.querySelector("img");
    if (header_image) {
        header_wrapper.style.height = header_image.naturalHeight/(header_image.naturalWidth/screen.width) + 'px';
    }
}

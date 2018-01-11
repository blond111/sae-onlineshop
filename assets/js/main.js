// $(".js-qty-minus").click(function() {
//     var e = parseInt($(this).parent().find("input.qty-text").val());
//     e >= 1 && ($(this).parent().find("input.qty-text").val(e - 1), $(this).unbind("click"))})

// $(".js-qty-plus").click(function() {
//     var e = parseInt($(this).parent().find("input.qty-text").val());
//     e <= 999 && ($(this).parent().find("input.qty-text").val(e + 1), $(this).unbind("click"))})

var dropdown = document.getElementsByClassName('dropdown')[0]

function toggle () {
  dropdown.classList.toggle('open')
}

if (dropdown !== undefined) dropdown.addEventListener('click', toggle) // Wenn es überhaupt ein Dropdown auf der Seite gibt...


var burger = document.getElementsByClassName('navbar-toggle')[0]
var burgerMenu = document.getElementsByClassName('navbar-collapse')[0]

function burgerToggle () {
  burgerMenu.classList.toggle('in')
}

if (burger !== undefined) burger.addEventListener('click', burgerToggle)


var cartButton = document.getElementsByClassName('mycart-container')[0]
var cartClose = document.getElementsByClassName('close-cart', 'cart-window-all')[0]
var cartCloseWindow = document.getElementsByClassName('cart-window-all')[0]
var cartInfo = document.getElementById('cart_info')

function toggleCart (e) {
  cartInfo.classList.toggle('cart_info--open')
  cartButton.classList.toggle('mycart-container--hidden')
  e.preventDefault()
}

if (cartButton !== undefined) cartButton.addEventListener('click', toggleCart)
if (cartClose !== undefined) cartClose.addEventListener('click', toggleCart)
if (cartCloseWindow !== undefined) cartCloseWindow.addEventListener('click', toggleCart)


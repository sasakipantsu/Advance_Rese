/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************************!*\
  !*** ./resources/js/mobile-menu-button.js ***!
  \********************************************/
// grab everything we need
var btn = document.querySelector(".mobile-menu-button");
var sidebar = document.querySelector(".sidebar"); // add our event listener for the click

btn.addEventListener("click", function () {
  sidebar.classList.toggle("-translate-x-full");
});
/******/ })()
;
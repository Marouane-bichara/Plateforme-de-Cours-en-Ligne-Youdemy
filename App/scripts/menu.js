
const hamburger = document.getElementById('hamburger');
const mobileMenu = document.getElementById('mobile-menu');
const closeMenu = document.getElementById('close-menu');

hamburger.addEventListener('click', () => {
  mobileMenu.classList.add('open');
  mobileMenu.classList.remove('closed');
});

closeMenu.addEventListener('click', () => {
  mobileMenu.classList.add('closed');
  mobileMenu.classList.remove('open');
});
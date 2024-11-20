const burger = document.getElementById('burger')
const navbar = document.getElementById('navbar-default')
burger.addEventListener('click', function() {
 navbar.classList.toggle('hidden')
 const isExpanded = navbar.classList.contains('hidden') ? 'false' : 'true';
 burger.setAttribute('aria-expanded', isExpanded);
})
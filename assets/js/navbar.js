document.addEventListener('DOMContentLoaded', function () {
    var toggle = document.getElementById('hamburger-toggle');
    var links = document.getElementById('navbar-links');

    if (!toggle || !links) return;

    toggle.addEventListener('click', function () {
        var isActive = links.classList.toggle('active');
        toggle.classList.toggle('active');
        toggle.setAttribute('aria-expanded', isActive ? 'true' : 'false');
    });
});
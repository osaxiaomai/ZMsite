/**
 * Mega Menu Interaction
 * Uses CSS opacity/visibility for smooth transitions instead of display toggling
 */
document.addEventListener('DOMContentLoaded', () => {
    const productsNav = document.getElementById('nav-products');
    const megaMenu = document.getElementById('mega-menu-products');

    if (!productsNav || !megaMenu) return;

    let timeout;

    productsNav.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
        megaMenu.style.opacity = '1';
        megaMenu.style.visibility = 'visible';
        megaMenu.style.transform = 'translateY(0)';
    });

    productsNav.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            megaMenu.style.opacity = '0';
            megaMenu.style.visibility = 'hidden';
            megaMenu.style.transform = 'translateY(8px)';
        }, 120);
    });

    megaMenu.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
        megaMenu.style.opacity = '1';
        megaMenu.style.visibility = 'visible';
        megaMenu.style.transform = 'translateY(0)';
    });

    megaMenu.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            megaMenu.style.opacity = '0';
            megaMenu.style.visibility = 'hidden';
            megaMenu.style.transform = 'translateY(8px)';
        }, 120);
    });
});

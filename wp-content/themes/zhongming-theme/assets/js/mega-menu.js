/**
 * Mega Menu Interaction
 */
document.addEventListener('DOMContentLoaded', () => {
    const productsNav = document.getElementById('nav-products');
    const megaMenu = document.getElementById('mega-menu-products');

    if (!productsNav || !megaMenu) return;

    let timeout;

    productsNav.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
        megaMenu.style.display = 'grid';
    });

    productsNav.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            megaMenu.style.display = 'none';
        }, 100);
    });

    megaMenu.addEventListener('mouseenter', () => {
        clearTimeout(timeout);
        megaMenu.style.display = 'grid';
    });

    megaMenu.addEventListener('mouseleave', () => {
        timeout = setTimeout(() => {
            megaMenu.style.display = 'none';
        }, 100);
    });
});

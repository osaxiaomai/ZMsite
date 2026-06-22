/**
 * Zhongming Theme Main JS
 */
document.addEventListener('DOMContentLoaded', () => {
    // 1. Sticky Header Shadow
    const header = document.querySelector('.site-header');
    window.addEventListener('scroll', () => {
        if (window.scrollY > 20) {
            header.style.boxShadow = '0 2px 10px rgba(0,0,0,0.1)';
        } else {
            header.style.boxShadow = 'none';
        }
    });

    // 2. Case Gallery Tab Switching
    const tabBtns = document.querySelectorAll('.tab-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const targetTab = btn.getAttribute('data-tab');
            
            // Update active state
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');

            // Filter items with a clean fade-out / fade-in transition
            galleryItems.forEach(item => {
                const itemCat = item.getAttribute('data-category');
                
                item.style.transition = 'opacity 0.2s ease, transform 0.2s ease';
                item.style.opacity = '0';
                item.style.transform = 'scale(0.95)';
                
                setTimeout(() => {
                    if (targetTab === 'all' || itemCat === targetTab) {
                        item.style.display = 'block';
                        // Force a reflow to trigger transition
                        item.offsetHeight;
                        item.style.opacity = '1';
                        item.style.transform = 'scale(1)';
                    } else {
                        item.style.display = 'none';
                    }
                }, 200);
            });
        });
    });

    // 3. Top Bar Close
    const closeBar = document.querySelector('.top-bar .close-btn');
    if (closeBar) {
        closeBar.addEventListener('click', () => {
            document.querySelector('.top-bar').style.display = 'none';
        });
    }

    // 4. Mobile Menu Drawer Logic
    const mobileMenuTriggerBtn = document.getElementById('mobileMenuTriggerBtn');
    const mobileSearchTriggerBtn = document.getElementById('mobileSearchTriggerBtn');
    const drawerCloseBtn = document.getElementById('drawerCloseBtn');
    const mobileMenuOverlay = document.getElementById('mobileMenuOverlay');
    const mobileMenuDrawer = document.getElementById('mobileMenuDrawer');
    const body = document.body;

    function openMobileMenu(focusSearch = false) {
        mobileMenuOverlay.classList.add('active');
        mobileMenuDrawer.classList.add('active');
        body.classList.add('drawer-open');
        
        if (focusSearch) {
            const searchInput = mobileMenuDrawer.querySelector('.drawer-search input');
            if (searchInput) {
                setTimeout(() => searchInput.focus(), 300);
            }
        }
    }

    function closeMobileMenu() {
        mobileMenuOverlay.classList.remove('active');
        mobileMenuDrawer.classList.remove('active');
        body.classList.remove('drawer-open');
    }

    if (mobileMenuTriggerBtn) {
        mobileMenuTriggerBtn.addEventListener('click', () => openMobileMenu(false));
    }

    if (mobileSearchTriggerBtn) {
        mobileSearchTriggerBtn.addEventListener('click', () => openMobileMenu(true));
    }

    if (drawerCloseBtn) {
        drawerCloseBtn.addEventListener('click', closeMobileMenu);
    }

    if (mobileMenuOverlay) {
        mobileMenuOverlay.addEventListener('click', closeMobileMenu);
    }

    // 5. Drawer Accordion Submenu Toggles with Height Slide Transition
    const submenuTriggers = document.querySelectorAll('.drawer-has-submenu');
    
    submenuTriggers.forEach(trigger => {
        const toggleBtn = trigger.querySelector('.submenu-toggle-btn');
        const submenu = trigger.querySelector('.drawer-submenu');
        
        if (toggleBtn && submenu) {
            toggleBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                const isOpen = trigger.classList.contains('active');
                
                if (isOpen) {
                    trigger.classList.remove('active');
                    submenu.style.maxHeight = null;
                } else {
                    trigger.classList.add('active');
                    submenu.style.maxHeight = submenu.scrollHeight + 'px';
                }
            });
        }
    });

    // 6. Floating Back to Top Button
    const backToTopBtn = document.getElementById('backToTopBtn');
    if (backToTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('visible');
            } else {
                backToTopBtn.classList.remove('visible');
            }
        });

        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // 7. Custom Language Switcher Toggle (for mobile/tablet tap compatibility)
    const langContainer = document.querySelector('.lang-switch-container');
    const langBtn = document.querySelector('.lang-switch-btn');

    if (langBtn && langContainer) {
        langBtn.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            langContainer.classList.toggle('active');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', () => {
            langContainer.classList.remove('active');
        });
    }
});

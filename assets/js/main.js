// NeoDark Theme JS

document.addEventListener('DOMContentLoaded', () => {

    const FOCUSABLE_SELECTOR = 'a[href], button:not([disabled]), input:not([disabled]), select:not([disabled]), textarea:not([disabled]), [tabindex]:not([tabindex="-1"])';

    /**
     * Traps keyboard focus inside `panel` while active: Tab/Shift+Tab wrap
     * at the panel's first/last focusable elements instead of escaping to
     * the rest of the page, and Escape triggers `close`.
     */
    function createFocusTrap(panel, close) {
        function getFocusable() {
            return Array.prototype.slice
                .call(panel.querySelectorAll(FOCUSABLE_SELECTOR))
                .filter((el) => el.offsetParent !== null);
        }

        function handleKeydown(e) {
            if (e.key === 'Escape') {
                e.preventDefault();
                close();
                return;
            }

            if (e.key !== 'Tab') {
                return;
            }

            const focusable = getFocusable();
            if (!focusable.length) {
                return;
            }

            const first = focusable[0];
            const last = focusable[focusable.length - 1];

            if (e.shiftKey && document.activeElement === first) {
                e.preventDefault();
                last.focus();
            } else if (!e.shiftKey && document.activeElement === last) {
                e.preventDefault();
                first.focus();
            }
        }

        return {
            activate() {
                panel.addEventListener('keydown', handleKeydown);
            },
            deactivate() {
                panel.removeEventListener('keydown', handleKeydown);
            },
            focusFirst() {
                const focusable = getFocusable();
                if (focusable.length) {
                    focusable[0].focus();
                }
            },
        };
    }

    // ---- Mobile menu toggle ----
    const mobileToggle = document.querySelector('.nd-mobile-toggle');
    const mobileMenu = document.getElementById('nd-mobile-menu');

    if (mobileToggle && mobileMenu) {
        const mobileMenuClose = mobileMenu.querySelector('.nd-mobile-menu-close');
        const mobileTrap = createFocusTrap(mobileMenu, closeMobileMenu);

        function openMobileMenu() {
            mobileMenu.classList.add('active');
            mobileMenu.setAttribute('aria-hidden', 'false');
            mobileToggle.setAttribute('aria-expanded', 'true');
            mobileTrap.activate();
            window.setTimeout(() => mobileTrap.focusFirst(), 50);
        }

        function closeMobileMenu() {
            mobileMenu.classList.remove('active');
            mobileMenu.setAttribute('aria-hidden', 'true');
            mobileToggle.setAttribute('aria-expanded', 'false');
            mobileTrap.deactivate();
            mobileToggle.focus();
        }

        mobileToggle.addEventListener('click', () => {
            if (mobileMenu.classList.contains('active')) {
                closeMobileMenu();
            } else {
                openMobileMenu();
            }
        });

        if (mobileMenuClose) {
            mobileMenuClose.addEventListener('click', closeMobileMenu);
        }

        // ---- Submenus inside the mobile menu ----
        // wp_nav_menu prints children as a nested <ul>, and nothing here used to touch them, so
        // a menu with submenus arrived fully unfolded. Each parent now gets its own toggle and
        // its children stay put away until that toggle is pressed. Hidden children drop out of
        // the focus trap on their own, because it only counts what is actually on screen.
        mobileMenu.querySelectorAll('.menu-item-has-children').forEach((item, index) => {
            const submenu = item.querySelector(':scope > .sub-menu');

            if (!submenu) {
                return;
            }

            const link = item.querySelector(':scope > a');
            const name = link ? link.textContent.trim() : '';

            submenu.id = submenu.id || 'nd-submenu-' + (index + 1);
            submenu.hidden = true;

            const toggle = document.createElement('button');
            toggle.type = 'button';
            toggle.className = 'nd-submenu-toggle';
            toggle.setAttribute('aria-expanded', 'false');
            toggle.setAttribute('aria-controls', submenu.id);
            toggle.setAttribute('aria-label', name);
            toggle.innerHTML = '<span aria-hidden="true">&#9662;</span>';

            toggle.addEventListener('click', () => {
                const open = toggle.getAttribute('aria-expanded') === 'true';

                toggle.setAttribute('aria-expanded', open ? 'false' : 'true');
                submenu.hidden = open;
                item.classList.toggle('nd-submenu-open', !open);
            });

            item.insertBefore(toggle, submenu);
        });
    }

    // ---- Search overlay ----
    const searchBtn = document.querySelector('.nd-search-btn');
    const searchOverlay = document.getElementById('nd-search-overlay');
    const searchInput = searchOverlay ? searchOverlay.querySelector('.nd-search-input') : null;

    if (searchBtn && searchOverlay) {
        const searchClose = searchOverlay.querySelector('.nd-search-overlay-close');
        const searchTrap = createFocusTrap(searchOverlay, closeSearch);

        function openSearch() {
            searchOverlay.classList.add('active');
            searchOverlay.setAttribute('aria-hidden', 'false');
            searchBtn.setAttribute('aria-expanded', 'true');
            searchTrap.activate();
            if (searchInput) {
                window.setTimeout(() => searchInput.focus(), 50);
            }
        }

        function closeSearch() {
            searchOverlay.classList.remove('active');
            searchOverlay.setAttribute('aria-hidden', 'true');
            searchBtn.setAttribute('aria-expanded', 'false');
            searchTrap.deactivate();
            searchBtn.focus();
        }

        searchBtn.addEventListener('click', () => {
            if (searchOverlay.classList.contains('active')) {
                closeSearch();
            } else {
                openSearch();
            }
        });

        if (searchClose) {
            searchClose.addEventListener('click', closeSearch);
        }

        searchOverlay.addEventListener('click', (e) => {
            if (e.target === searchOverlay) {
                closeSearch();
            }
        });
    }

});

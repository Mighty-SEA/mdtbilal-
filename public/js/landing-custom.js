// Menu Toggle
const menuToggle = document.getElementById('menu-toggle');
const closeMenu = document.getElementById('close-menu');
const mobileMenu = document.getElementById('mobile-menu');
const menuIcon = document.getElementById('menu-icon');
const navbar = document.getElementById('navbar');
const navbarPlaceholder = document.getElementById('navbar-placeholder');

function openMenu() {
    mobileMenu.classList.remove('hidden', '-translate-y-2', 'opacity-0');
    mobileMenu.classList.add('translate-y-0', 'opacity-100');
    document.body.classList.add('overflow-hidden');
}

function closeMenuFunc() {
    mobileMenu.classList.add('-translate-y-2', 'opacity-0');
    setTimeout(() => {
        mobileMenu.classList.add('hidden');
        document.body.classList.remove('overflow-hidden');
    }, 300);
}

menuToggle.addEventListener('click', function() {
    openMenu();
});

closeMenu.addEventListener('click', function() {
    closeMenuFunc();
});

// Close menu ketika klik di luar
document.addEventListener('click', function(event) {
    if (!mobileMenu.contains(event.target) && !menuToggle.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
        closeMenuFunc();
    }
});

// Klik link pada mobile menu
document.querySelectorAll('.mobile-nav-link').forEach(link => {
    link.addEventListener('click', function() {
        closeMenuFunc();
    });
});

// Fungsi untuk mengatur tinggi placeholder sesuai tinggi navbar
function updateNavbarPlaceholderHeight() {
    if (navbar.classList.contains('fixed')) {
        navbarPlaceholder.style.height = navbar.offsetHeight + 'px';
    } else {
        navbarPlaceholder.style.height = '0px';
    }
}

// Navbar Scroll Effect
window.addEventListener('scroll', function() {
    const heroSection = document.getElementById('beranda');
    const heroHeight = heroSection.offsetHeight;
    
    if (window.scrollY >= heroHeight) {
        navbar.classList.remove('absolute', 'navbar-transparent', 'bg-transparent');
        navbar.classList.add('fixed', 'top-0', 'shadow-md', 'bg-green-600');
    } else {
        navbar.classList.add('absolute', 'navbar-transparent', 'bg-transparent');
        navbar.classList.remove('fixed', 'top-0', 'shadow-md', 'bg-green-600');
    }
    updateNavbarPlaceholderHeight();
});

// Update placeholder height ketika resize window
window.addEventListener('resize', updateNavbarPlaceholderHeight);

// Trigger scroll event once on page load to set initial navbar state
window.addEventListener('load', function() {
    window.dispatchEvent(new Event('scroll'));
});

// Smooth scroll untuk link anchor
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        
        const offset = 80; // Offset untuk fixed header
        const targetId = this.getAttribute('href');
        const targetElement = document.querySelector(targetId);
        
        if (targetElement) {
            const targetPosition = targetElement.getBoundingClientRect().top + window.pageYOffset - offset;
            
            window.scrollTo({
                top: targetPosition,
                behavior: 'smooth'
            });
        }
        
        // Close mobile menu if it's open
        if (!mobileMenu.classList.contains('hidden')) {
            closeMenuFunc();
        }
    });
}); 
// Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menu-toggle');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    
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
    
    if (menuToggle) {
        menuToggle.addEventListener('click', function() {
            openMenu();
        });
    }
    
    if (closeMenu) {
        closeMenu.addEventListener('click', function() {
            closeMenuFunc();
        });
    }
    
    // Close menu ketika klik di luar
    document.addEventListener('click', function(event) {
        if (mobileMenu && !mobileMenu.contains(event.target) && menuToggle && !menuToggle.contains(event.target) && !mobileMenu.classList.contains('hidden')) {
            closeMenuFunc();
        }
    });
    
    // Klik link pada mobile menu
    document.querySelectorAll('.mobile-nav-link').forEach(link => {
        link.addEventListener('click', function() {
            closeMenuFunc();
        });
    });

    // Validasi form tambahan
    const form = document.querySelector('form');
    if (form) {
        const nikInput = document.getElementById('nik');
        const kkInput = document.getElementById('kk');
        const nisnInput = document.getElementById('nisn');
        
        // Hanya izinkan input angka untuk field tertentu
        [nikInput, kkInput, nisnInput].forEach(input => {
            if (input) {
                input.addEventListener('keypress', function(e) {
                    if (!/[0-9]/.test(e.key)) {
                        e.preventDefault();
                    }
                });
                
                // Hapus karakter non-angka
                input.addEventListener('input', function() {
                    this.value = this.value.replace(/[^0-9]/g, '');
                });
            }
        });
        
        // Validasi form sebelum submit
        form.addEventListener('submit', function(e) {
            let isValid = true;
            
            // Validasi NIK harus 16 digit
            if (nikInput && nikInput.value.length !== 16) {
                alert('NIK harus 16 digit angka');
                nikInput.focus();
                isValid = false;
            }
            
            // Validasi KK harus 16 digit
            if (kkInput && kkInput.value.length !== 16) {
                alert('Nomor KK harus 16 digit angka');
                kkInput.focus();
                isValid = false;
            }
            
            // Validasi NISN jika diisi harus 10 digit
            if (nisnInput && nisnInput.value && nisnInput.value.length !== 10) {
                alert('NISN harus 10 digit angka');
                nisnInput.focus();
                isValid = false;
            }
            
            if (!isValid) {
                e.preventDefault();
            }
            
            // Mencegah double submit
            if (isValid) {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline-block mr-1 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" /></svg> Memproses...';
                }
            }
        });
        
        // Hapus data form ketika halaman ditutup
        window.addEventListener('beforeunload', function() {
            // Hapus data sensitif dari form
            form.reset();
            
            // Hapus data dari localStorage jika ada
            localStorage.removeItem('form_data');
            sessionStorage.clear();
        });
    }
}); 
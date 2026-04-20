document.addEventListener('DOMContentLoaded', () => {
    // --- 1. DARK MODE LOGIC ---
    const darkBtn = document.getElementById('darkBtn');
    
    // Check for saved user preference
    if (localStorage.getItem('theme') === 'dark') {
        document.body.classList.add('dark-theme');
        if(darkBtn) darkBtn.textContent = "Mode Clair";
    }

    if (darkBtn) {
        darkBtn.addEventListener('click', () => {
            document.body.classList.toggle('dark-theme');
            
            if (document.body.classList.contains('dark-theme')) {
                darkBtn.textContent = "Mode Clair";
                localStorage.setItem('theme', 'dark');
            } else {
                darkBtn.textContent = "Mode Sombre";
                localStorage.setItem('theme', 'light');
            }
        });
    }

    // --- 2. AJAX SEARCH ---
    const searchInput = document.getElementById('searchPerfume');
    const container = document.querySelector('.product-grid');

    if (searchInput && container) {
        searchInput.addEventListener('keyup', () => {
            let query = searchInput.value.trim();

            // FIXED: If query is empty, fetch all perfumes. 
            // If query is > 0, fetch filtered perfumes.
            fetch("back/recherche.php?q=" + encodeURIComponent(query))
                .then(res => res.text())
                .then(data => {
                    container.innerHTML = data;
                })
                .catch(err => console.error("Search error:", err));
        });
    }

    // --- 3. FORM VALIDATION ---
    const signupForm = document.getElementById('formReg');
    if (signupForm) {
        signupForm.addEventListener('submit', (e) => {
            let nomInput = document.querySelector('input[name="nom_complet"]');
            let passInput = document.querySelector('input[name="pass"]');

            if (nomInput && nomInput.value.length < 3) {
                alert("Nom trop court!");
                e.preventDefault();
            } else if (passInput && passInput.value.length < 6) {
                alert("Mot de passe : minimum 6 caractères!");
                e.preventDefault();
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', () => {
    const darkBtn = document.getElementById('darkBtn');
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
    const searchInput = document.getElementById('searchPerfume');
    const container = document.querySelector('.product-grid');
    if (searchInput && container) {
        searchInput.addEventListener('keyup', () => {
            let query = searchInput.value.trim();
            fetch("./back/recherche.php?q=" + encodeURIComponent(query))
                .then(res => {
                    if (!res.ok) throw new Error('File not found');
                    return res.text();
                })
                .then(data => {
                    container.innerHTML = data;
                })
                .catch(err => {
                    console.error("Search error:", err);
                    container.innerHTML = "<p style='grid-column: 1/-1; text-align: center; color: red;'>Erreur de chargement des résultats.</p>";
                });
        });
    }
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
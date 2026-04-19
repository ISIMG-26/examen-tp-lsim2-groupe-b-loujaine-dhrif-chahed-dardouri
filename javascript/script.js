document.addEventListener('DOMContentLoaded', function() {
    const signupForm = document.getElementById('formReg');
    if (signupForm) {
        signupForm.addEventListener('submit', function(e) {
            let email = document.getElementById('email').value;
            let pass= document.querySelector('input[name="pass"]').value;
            let nom= document.querySelector('input[name="nom_complet"]').value;
            if (nom.length < 3) {
                alert('Le nom doit comporter au moins 3 caractères!');
                e.preventDefault();
                return
            }
            let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                alert('Veuillez entrer une adresse e-mail valide!');
                e.preventDefault();
                return
            }
            if (pass.length < 6) {
                alert('Le mot de passe doit comporter au moins 6 caractères!');
                e.preventDefault();
                return;
            }

        });
    }
    const cards = document.querySelectorAll('.card');
    cards.forEach(card => {
        card.addEventListener("mouseover", () => {
            card.style.transform = "scale(1.05)";
            card.style.transition = "transform 0.3s ease";
        });
        card.addEventListener("mouseout", () => {
            card.style.transform = "scale(1)";
        });
});
});
const searchInput = document.getElementById('searchPerfume');
const container = documentquerySelector('.product-grid');
if (searchInput && container) {
    searchInput.addEventListener('keyup', function() {
        let query = searchInput.value;
        if (query.length > 1) {
            fetch("../back/recherche.php?q=" + query)
            .then(response => response.text())
            .then(data => {
                container.innerHTML = data;
            })
            .catch(error => console.error('Erreur AJAX', error));
        }});
}
const darkBtn = document.getElementById('darkBtn');
    if (darkBtn) {
        darkBtn.addEventListener('click', function() {
            document.body.classList.toggle('dark-theme');
            if (document.body.classList.contains('dark-theme')) {
                darkBtn.innerText = "Mode Clair";
            } else {
                darkBtn.innerText = "Mode Sombre";
            }
        });
    }
const cn = document.getElementById('cn');
const form = document.getElementById('form');
const paragraph = document.getElementById('echecmssg');
const envoi = document.getElementById('submit');
const input = document.getElementById('input');

// Cacher l'input au départ
    input.style.visibility = 'hidden';
cn.addEventListener('click', function() {
    form.style.visibility = 'visible'; 
});

envoi.addEventListener('click', function(e) {
    e.preventDefault();
    const response = document.getElementById('response').value.trim();
    
    if (response !== '' && response === 'oui') {
        input.style.visibility = 'visible';
        paragraph.innerHTML ="";
        // Appel AJAX pour vérifier le matricule
        
    } else {
        paragraph.innerHTML = "Vous ne pouvez pas vous inscrire.";
    }
});
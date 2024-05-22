
function showForm() {
    document.querySelector('.formWrapper .card').classList.toggle('show');
}
document.addEventListener("DOMContentLoaded", function() {
    const statutZoo = document.getElementById("statut-zoo");
    const maintenant = new Date();
    const heure = maintenant.getHours();

    if (heure >= 10 && heure < 19) {
        statutZoo.textContent = "Le zoo est actuellement ouvert.";
        statutZoo.classList.add("open");
    } else {
        statutZoo.textContent = "Le zoo est actuellement fermé.";
        statutZoo.classList.add("closed");
    }
});
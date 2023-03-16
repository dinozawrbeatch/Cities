const modalWindow = document.getElementById('questionModal');
const selectedCity = document.getElementById('selected_city');
const chooseCityBtn = document.getElementById('choose_city');
const form_id = document.getElementById('form_id');

chooseCityBtn.addEventListener('click', () => {
    form_id.setAttribute('action',`/cities/reviews/${selectedCity.value}`);
});

function showModal(modalName) {
    let modal = new bootstrap.Modal(`#${modalName}`);
    modal.show();
}

window.onload = () => {
    if (modalWindow) {
        showModal('questionModal');
    } else {
        showModal('citySelector');
    }
}






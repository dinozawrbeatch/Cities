const modalWindow = document.getElementById('questionModal');

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






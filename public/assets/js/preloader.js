const preloader = document.getElementById('preloader');

function setPreloader() {
    preloader.classList.remove('visually-hidden');
}

document.getElementById('deleteBtn').addEventListener('click', (e) => {
    setPreloader();
});

document.getElementById('updateBtn').addEventListener('click', (e) => {
    setPreloader();
});

document.getElementById('sendReviewBtn').addEventListener('click', (e) => {
    setPreloader();
});

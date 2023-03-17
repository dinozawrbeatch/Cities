let preloader = document.getElementById('preloader');
preloader.classList.remove('visually-hidden');
window.onload =  () => {
    preloader.classList.add('visually-hidden');
}


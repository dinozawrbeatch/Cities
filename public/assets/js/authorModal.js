const authorLinks = document.querySelectorAll('.author-link');

authorLinks.forEach((link) => {
    link.addEventListener('click', (e) => {
        e.preventDefault();
        const userName = link.textContent.trim();

        fetch(`/cities/reviews/users/${userName}`)
            .then(response => response.text())
            .then(data => {
                document.getElementById('author-info').innerHTML = data;
            })
            .catch(error => {
                console.error('Error:', error);
            });
    });
});

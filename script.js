const searchInput = document.getElementById('searchInput');
const searchForm = document.querySelector('.search-box');
const mobileSearch = document.getElementById('mobileSearch');
const movieCards = Array.from(document.querySelectorAll('.movie-card'));
const genreButtons = Array.from(document.querySelectorAll('.genre-chip'));
const emptyState = document.getElementById('emptyState');

let activeGenre = 'all';

function filterMovies() {
    const query = searchInput.value.trim().toLocaleLowerCase('id');
    let visibleMovies = 0;

    movieCards.forEach((card) => {
        const title = card.querySelector('.movie-title').textContent.toLocaleLowerCase('id');
        const genre = card.dataset.genre.toLocaleLowerCase('id');
        const matchesQuery = title.includes(query) || genre.includes(query);
        const matchesGenre = activeGenre === 'all' || card.dataset.genre === activeGenre;
        const isVisible = matchesQuery && matchesGenre;

        card.hidden = !isVisible;
        if (isVisible) {
            visibleMovies += 1;
        }
    });

    emptyState.hidden = visibleMovies !== 0;
}

searchInput.addEventListener('input', filterMovies);
searchForm.addEventListener('submit', (event) => event.preventDefault());
mobileSearch.addEventListener('click', () => searchInput.focus());

genreButtons.forEach((button) => {
    button.addEventListener('click', () => {
        activeGenre = button.dataset.genre;
        genreButtons.forEach((genreButton) => {
            const isActive = genreButton === button;
            genreButton.classList.toggle('active', isActive);
            genreButton.setAttribute('aria-pressed', String(isActive));
        });
        filterMovies();
    });
});

document.addEventListener('keydown', (event) => {
    const isTyping = ['INPUT', 'TEXTAREA'].includes(document.activeElement.tagName);
    if (event.key === '/' && !isTyping && !event.ctrlKey && !event.metaKey && !event.altKey) {
        event.preventDefault();
        searchInput.focus();
    }
});

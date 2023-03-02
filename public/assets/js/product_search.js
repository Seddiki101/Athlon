const searchForm = document.querySelector('#search-form');
const searchInput = searchForm.querySelector('input[name="q"]');
const searchResults = document.querySelector('#search-results');

searchForm.addEventListener('submit', (event) => {
    event.preventDefault();

    const query = searchInput.value.trim();

    if (query.length < 2) {
        return;
    }

    fetch(`/products/search?q=${encodeURIComponent(query)}`)
        .then(response => response.json())
        .then(data => {
            searchResults.innerHTML = '';

            if (data.length === 0) {
                searchResults.innerHTML = '<li>No results found</li>';
                return;
            }

            for (const produit of data) {
                const li = document.createElement('li');
                li.innerHTML = `
                    <h3>${produit.name}</h3>
                    <p>${produit.description}</p>
                `;
                searchResults.appendChild(li);
            }
        })
        .catch(error => console.error(error));
});

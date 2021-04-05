function close_search(){
    document.getElementById('hits').classList.add('d-none')
}
function start_search(){
    document.getElementById('hits').classList.remove('d-none')
}
const algoliaClient = algoliasearch(
    '{{ config("scout.algolia.id") }}',
    'a3306e7956f83141adc475124b8a185e'
);

const searchClient = {
    search(requests) {
        if (requests.every(({ params }) => !params.query)) {
            return Promise.resolve({
                results: requests.map(() => ({
                    hits: [],
                    nbHits: 0,
                    nbPages: 0,
                })),
            });
        }

        return algoliaClient.search(requests);
    },
};

const search = instantsearch({
    indexName: 'products',
    searchClient,
    searchFunction(helper) {
        const container = document.querySelector('#hits');
        container.style.display = helper.state.query === '' ? 'none' : '';

        helper.search();
    }
});

search.addWidgets([
    {
        init(opts) {
            const helper = opts.helper;
            const input = document.querySelector('#search_input');
            input.addEventListener('input', ({currentTarget}) => {
                helper.setQuery(currentTarget.value) // update the parameters
                    .search(); // launch the query
            });
        }
    },
    {
        render(options) {
            const results = options.results;
            // read the hits from the results and transform them into HTML.
            document.querySelector('#hits').innerHTML = results.hits
                .map(
                    hit => `<a href='{{ url('/product') }}/${hit.slug}'>
                                                <div>
                                                    <img src='{{ asset('storage') }}/${hit.main_image}'/>
                                                </div>
                                                <div>
                                                <p>${hit.title}</p>
                                                <p>প্রোডাক্ট কোড: ${hit.product_code}}</p>
                                                </div>
                                            </a>`
                )
                .join('');
        },
    }
]);
search.start();

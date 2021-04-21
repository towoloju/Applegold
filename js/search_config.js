/**
 * @typedef {Object} InstantSearchOptions
 * @property {URL} searchUrl the url which the search bar would query
 * @property {string} queryParam  name of query parameter to be used in each request
 * @property {Function} responseParser takes the response from the instant search an returns the array of results
 * @property {Function} templateFunction takes an instant search result and produces the HTML for it
 */



class InstantSearch {
        /**
         * Initializes the instant search bar, retrieves and creates elements
         * 
         * @param {HTMLElement} instantSearch the container element for the instant search
         * @param {InstantSearchOptions} options a list of options for configuration
         * 
         */
        constructor(instantSearch, options){
            this.options = options;

            this.elements = {
                main: instantSearch,
                input: instantSearch.querySelector(".search-input"),
                resultsContainer: document.createElement("div")

            };

            this.elements.resultsContainer.classList.add("search-result-container");
            this.elements.main.appendChild(this.elements.resultsContainer);

            this.addListeners();
        }
/**Adds event listners when users start typing on the search bar */
        addListeners(){
            let delay;

            this.elements.input.addEventListener("input", () =>{
                clearTimeout(delay)
                const query = this.elements.input.value;
 
                delay = setTimeout( () => {

                    if (query.length < 3){
                        this.populateResults([]);
                        return;
                    }
                    this.performSearch(query).then(results => {
                        this.populateResults(results)
                    });

                 

                }, 500);
            });
        }

        /**
         * Update the HTML to display the results under the search bar
         * @param {object[]} results
         */
        populateResults(results){
            console.log("here are the results");
            console.log(results);
        }


        /**
         * Makes a request at the search URL and retrieves the result
         * 
         * @param {string} query search query
         * @returns {Promise<Object[]>} returns a promise array of objects
         */

        performSearch(query){
            const url = new URL(this.options.searchUrl.toString());

            url.searchParams.set(this.options.queryParam, query);

            this.setLoading(true);

            return fetch(url, {
                method: "get"
            }).then(response => {
                return response.json();
            }).then(respondData => {
                console.log(responseData);
            });
          
        }

          /**
         * Makes a request at the search URL and retrieves the result
         * 
         * @param {boolean} bool true to show the loading indicator, false to hide
         */
        setLoading(bool){
            this.elements.main.classList.toggle("search-loading", bool);
        }
}

export default InstantSearch;
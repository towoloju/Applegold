//SEARCH BAR
import InstantSearch from "./search_config.js";

const searchUsers = document.querySelector('#search');
const instantSearchUsers = new InstantSearch(searchUsers, {
    
    searchUrl: new URL("http://localhost/test/search.php", window.location.origin),
    queryParam: "q",
    responseParser: () => {},
    templateFunction: () => {}
    

});

console.log(instantSearchUsers);


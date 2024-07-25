document.addEventListener('DOMContentLoaded', function() {
    const themeSwitch = document.getElementById('themeSwitch');

    themeSwitch.addEventListener('change', function() {
        if (this.checked) {
            document.body.classList.add('dark-mode');
        } else {
            document.body.classList.remove('dark-mode');
        }
    });
});

function searchDictionary() {
    var searchTerm = document.getElementById("searchInput").value;
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var response = JSON.parse(this.responseText);
            if (response.length > 0) {
                var output = "";
                var foundWords = {};
                for (var i = 0; i < response.length; i++) {
                    var entry = response[i];
                    if (!foundWords[entry.word]) {
                        output += "Word: " + entry.word + "<br>";
                        output += "Word Type: " + entry.wordtype + "<br>";
                        output += "Definition: " + entry.definition+ "<br><br>";
                        foundWords[entry.word] = true;
                    }
                }
                document.getElementById("results").innerHTML = output;
            } else {
                document.getElementById("results").innerHTML = "No results found for '" + searchTerm + "'";
            }
        }
    };
    xhttp.open("GET", "fetch_data.php?searchTerm=" + searchTerm, true);
    xhttp.send();
}


function displayResults(data) {
    // Get the results container
    const resultsContainer = document.getElementById('results');
    // Clear previous results
    resultsContainer.innerHTML = '';

    // Check if data is empty
    if (data.length === 0) {
        resultsContainer.innerHTML = '<p>No results found.</p>';
        return;
    }

    // Create HTML for each result
    const html = data.map(entry => {
        return `
            <div>
                <p><strong>Word:</strong> ${entry.word}</p>
                <p><strong>Word Type:</strong> ${entry.wordtype}</p>
                <p><strong>Definition:</strong> ${entry.definition}</p>
            </div>
        `;
    }).join('');

    // Append HTML to results container
    resultsContainer.innerHTML = html;
}

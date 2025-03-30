fetch('http://localhost/api.php')
    .then(response => response.json())
    .then(data => {
        console.log(data);
        // Code to display articles on the webpage
    })
    .catch(error => console.error('Error fetching articles:', error));
<?php
     include("website_connect.php");
     include("navigation_bar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>London Library Finder</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            max-width: 800px; 
            margin: 0 auto; 
            padding: 20px; 
        }
        #libraryResults { 
            margin-top: 20px; 
            max-height: 300px; 
            overflow-y: auto; 
        }
        .library-item { 
            border-bottom: 1px solid #eee; 
            padding: 10px 0; 
        }
    </style>
</head>
<body>
    <h1>London Libraries Near You</h1>
    
    <!-- Your existing embedded map can stay here -->
    <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317716.364741452!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon!5e0!3m2!1sen!2suk!4v1721674778102!5m2!1sen!2suk" 
        width="600" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>

    <button onclick="findLondonLibraries()">Find Nearby Libraries</button>
    <div id="libraryResults"></div>

    <script>
        async function findLondonLibraries() {
            // Fixed coordinates for London
            const lat = 51.52864165;
            const lon = -0.10159865;

            // RapidAPI configuration
            const options = {
                method: 'GET',
                headers: {
                    'X-RapidAPI-Key': 'YO939a1bac9fmsh92ed54d4afc9d08p1965b6jsnd9f0d612b6ae', // Replace with your RapidAPI key
                    'X-RapidAPI-Host': 'local-business-data.p.rapidapi.com'
                }
            };

            try {
                // Search for libraries
                const libraryResponse = await fetch(
                    `https://local-business-data.p.rapidapi.com/search?query=library&lat=${lat}&lng=${lon}&zoom=12&limit=15`, 
                    options
                );

                const libraryData = await libraryResponse.json();

                // Display results
                const resultsDiv = document.getElementById('libraryResults');
                resultsDiv.innerHTML = '<h2>Libraries in London:</h2>';

                if (!libraryData.data || libraryData.data.length === 0) {
                    resultsDiv.innerHTML += '<p>No libraries found.</p>';
                    return;
                }

                // Create library list
                libraryData.data.forEach(library => {
                    const libraryItem = document.createElement('div');
                    libraryItem.className = 'library-item';
                    libraryItem.innerHTML = `
                        <strong>${library.name || 'Unnamed Library'}</strong><br>
                        Address: ${library.address || 'Address not available'}<br>
                        Distance: ${library.distance ? library.distance + ' meters' : 'Distance not provided'}
                    `;
                    resultsDiv.appendChild(libraryItem);
                });

            } catch (error) {
                console.error('Error:', error);
                document.getElementById('libraryResults').innerHTML = 
                    `<p>Error: ${error.message}. Please try again.</p>`;
            }
        }
    </script>
</body>
</html>
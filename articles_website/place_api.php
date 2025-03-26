<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nearby Library Finder</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        #libraryResults { margin-top: 20px; }
        .library-item { 
            border-bottom: 1px solid #eee; 
            padding: 10px 0; 
        }
    </style>
</head>
<body>
    <h1>Nearby Library Finder</h1>
    <input id="locationInput" type="text" placeholder="Enter city or address">
    <button onclick="findNearestLibraries()">Find Libraries</button>
    <div id="libraryResults"></div>

    <script>
        async function findNearestLibraries() {
            // Get location input
            const location = document.getElementById('locationInput').value;
            
            // First, get coordinates using geocoding
            try {
                const geocodeResponse = await fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(location)}`);
                const geocodeData = await geocodeResponse.json();

                if (!geocodeData || geocodeData.length === 0) {
                    throw new Error('Location not found');
                }

                const { lat, lon } = geocodeData[0];

                // RapidAPI configuration
                const options = {
                    method: 'GET',
                    headers: {
                        'X-RapidAPI-Key': '939a1bac9fmsh92ed54d4afc9d08p1965b6jsnd9f0d612b6ae', // Replace with your RapidAPI key
                        'X-RapidAPI-Host': 'local-business-data.p.rapidapi.com'
                    }
                };

                // Search for libraries
                const libraryResponse = await fetch(
                    `https://local-business-data.p.rapidapi.com/search?query=library&lat=${lat}&lng=${lon}&zoom=12&limit=10`, 
                    options
                );

                const libraryData = await libraryResponse.json();

                // Display results
                const resultsDiv = document.getElementById('libraryResults');
                resultsDiv.innerHTML = '<h2>Nearby Libraries:</h2>';

                if (!libraryData.data || libraryData.data.length === 0) {
                    resultsDiv.innerHTML += '<p>No libraries found in this area.</p>';
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
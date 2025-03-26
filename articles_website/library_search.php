<?php
// library_finder.php
class LibraryFinder {
    private $apiKey;
    private $apiHost;

    public function __construct($apiKey, $apiHost) {
        $this->apiKey = $apiKey;
        $this->apiHost = $apiHost;
    }

    public function findLibraries() {
        // London coordinates
        $lat = 51.5074;
        $lon = -0.1278;

        // Prepare API request
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://local-business-data.p.rapidapi.com/search?query=library&lat={$lat}&lng={$lon}&zoom=10&limit=50",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: {$this->apiHost}",
                "X-RapidAPI-Key: {$this->apiKey}"
            ],
        ]);

        // Execute request
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        // Enhanced error handling
        if ($err) {
            return json_encode(['error' => 'cURL Error: ' . $err]);
        }

        if ($httpCode !== 200) {
            return json_encode(['error' => "HTTP Error: $httpCode", 'response' => $response]);
        }

        // Validate JSON response
        $decodedResponse = json_decode($response, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return json_encode(['error' => 'Invalid JSON response', 'raw_response' => $response]);
        }

        // Return processed response
        return $response;
    }
}

// Check if it's an AJAX request
if (isset($_GET['action']) && $_GET['action'] == 'find_libraries') {
    // IMPORTANT: Replace with your actual RapidAPI key
    $apiKey = getenv('RAPIDAPI_KEY') ?: 'YOUR_ACTUAL_RAPIDAPI_KEY';
    $apiHost = 'local-business-data.p.rapidapi.com';

    // Create library finder
    $libraryFinder = new LibraryFinder($apiKey, $apiHost);
    
    // Output libraries as JSON
    header('Content-Type: application/json');
    echo $libraryFinder->findLibraries();
    exit;
}

// Rest of the HTML remains the same
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>London Libraries Map</title>
    <style>
        #libraryList {
            max-height: 300px;
            overflow-y: auto;
            margin-top: 10px;
        }
        .library-item {
            padding: 5px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }
        .library-item:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <!-- Your existing embedded map -->
    <iframe 
        id="londonMap"
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317716.364741452!2d-0.10159865000000001!3d51.52864165!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondon!5e0!3m2!1sen!2suk!4v1721674778102!5m2!1sen!2suk" 
        width="600" 
        height="450" 
        style="border:0;" 
        allowfullscreen="" 
        loading="lazy">
    </iframe>

    <button id="findLibrariesBtn">Show Libraries on Map</button>
    <div id="libraryList"></div>

    <script>
        document.getElementById('findLibrariesBtn').addEventListener('click', function() {
            // Fetch libraries from PHP backend
            fetch('library_finder.php?action=find_libraries')
                .then(response => response.json())
                .then(data => {
                    // Clear previous list
                    const libraryList = document.getElementById('libraryList');
                    libraryList.innerHTML = '<h3>London Libraries:</h3>';

                    // Check for errors
                    if (data.error) {
                        libraryList.innerHTML = `<p>Error: ${data.error}</p>`;
                        return;
                    }

                    // Process libraries
                    if (data.data && data.data.length > 0) {
                        data.data.forEach(library => {
                            // Create library item in list
                            const libraryItem = document.createElement('div');
                            libraryItem.className = 'library-item';
                            libraryItem.innerHTML = `
                                <strong>${library.name || 'Unnamed Library'}</strong><br>
                                ${library.address || 'Address not available'}
                            `;
                            
                            // Optional: Add click to highlight on map
                            libraryItem.addEventListener('click', () => {
                                // Note: This is a placeholder. Actual map highlighting 
                                // would require Google Maps JavaScript API
                                alert(`Locate ${library.name} on map`);
                            });

                            libraryList.appendChild(libraryItem);
                        });
                    } else {
                        libraryList.innerHTML += '<p>No libraries found.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('libraryList').innerHTML = 
                        `<p>Error fetching libraries: ${error.message}</p>`;
                });
        });
    </script>
</body>
</html>
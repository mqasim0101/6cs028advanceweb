<?php 
//include("templates/navbar");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 20px;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .header {
            text-align: center;
            color: white;
            margin-bottom: 30px;
        }
        
        .weather-controls {
            background: white;
            border-radius: 15px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
        
        .search-container {
            display: flex;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .search-input {
            flex: 1;
            padding: 12px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
        }
        
        .search-btn, .location-btn {
            padding: 12px 20px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            transition: background 0.3s;
        }
        
        .search-btn:hover, .location-btn:hover {
            background: #5a67d8;
        }
        
        .layer-controls {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }
        
        .layer-btn {
            padding: 8px 16px;
            background: #f7fafc;
            border: 2px solid #e2e8f0;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .layer-btn.active {
            background: #667eea;
            color: white;
            border-color: #667eea;
        }
        
        .weather-content {
            display: grid;
            grid-template-columns: 1fr 300px;
            gap: 20px;
        }
        
        .map-container {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
        
        #weatherMap {
            height: 500px;
            width: 100%;
        }
        
        .weather-info {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 8px 32px rgba(0,0,0,0.1);
        }
        
        .current-weather {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .weather-icon {
            font-size: 48px;
            margin: 10px 0;
        }
        
        .temperature {
            font-size: 2.5em;
            font-weight: bold;
            color: #2d3748;
        }
        
        .weather-description {
            font-size: 1.1em;
            color: #4a5568;
            text-transform: capitalize;
        }
        
        .weather-details {
            margin-top: 20px;
        }
        
        .detail-item {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid #e2e8f0;
        }
        
        .loading {
            text-align: center;
            padding: 20px;
            color: #4a5568;
        }
        
        .error {
            background: #fed7d7;
            color: #c53030;
            padding: 10px;
            border-radius: 8px;
            margin: 10px 0;
        }
        
        @media (max-width: 768px) {
            .weather-content {
                grid-template-columns: 1fr;
            }
            
            .search-container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>🌤️ Weather Dashboard</h1>
            <p>Interactive Weather Maps & Current Conditions</p>
        </div>
        
        <div class="weather-controls">
            <div class="search-container">
                <input type="text" id="cityInput" class="search-input" placeholder="Enter city name..." value="<?= $default_city ?>">
                <button class="search-btn" onclick="searchWeather()">Search</button>
                <button class="location-btn" onclick="getCurrentLocation()">📍 My Location</button>
            </div>
            
            <div class="layer-controls">
                <button class="layer-btn active" data-layer="none">Base Map</button>
                <button class="layer-btn" data-layer="clouds_new">☁️ Clouds</button>
                <button class="layer-btn" data-layer="precipitation_new">🌧️ Precipitation</button>
                <button class="layer-btn" data-layer="pressure_new">🌀 Pressure</button>
                <button class="layer-btn" data-layer="wind_new">💨 Wind</button>
                <button class="layer-btn" data-layer="temp_new">🌡️ Temperature</button>
            </div>
        </div>
        
        <div class="weather-content">
            <div class="map-container">
                <div id="weatherMap"></div>
            </div>
            
            <div class="weather-info">
                <div id="weatherDisplay">
                    <div class="loading">Loading weather data...</div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Leaflet JavaScript -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    
    <script>
        let map;
        let currentWeatherLayer = null;
        let weatherMarker = null;
        let apiKey = '';
        
        // Initialize map
        function initMap() {
            map = L.map('weatherMap').setView([51.505, -0.09], 6);
            
            // Add base tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);
            
            // Load default city weather
            searchWeather();
        }
        
        // Search weather by city name
        async function searchWeather() {
            const city = document.getElementById('cityInput').value.trim();
            if (!city) {
                showError('Please enter a city name');
                return;
            }
            
            showLoading();
            console.log('Searching weather for:', city);
            
            try {
                const formData = new FormData();
                formData.append('city', city);
                
                const response = await fetch('<?= base_url('weather/data') ?>', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                });
                
                console.log('Response status:', response.status);
                
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                
                const data = await response.json();
                console.log('Weather data received:', data);
                
                if (data.error) {
                    showError(`Error: ${data.error}${data.details ? ' - ' + data.details : ''}`);
                    return;
                }
                
                // Validate required data
                if (!data.coord || !data.main || !data.weather) {
                    showError('Invalid weather data received from server');
                    console.error('Invalid data structure:', data);
                    return;
                }
                
                displayWeatherData(data);
                updateMapLocation(data.coord.lat, data.coord.lon, data.name);
                
            } catch (error) {
                console.error('Fetch error:', error);
                showError('Failed to fetch weather data: ' + error.message);
            }
        }
        
        // Get current location weather
        function getCurrentLocation() {
            if (!navigator.geolocation) {
                showError('Geolocation is not supported by this browser');
                return;
            }
            
            showLoading();
            console.log('Getting current location...');
            
            navigator.geolocation.getCurrentPosition(
                async (position) => {
                    const { latitude, longitude } = position.coords;
                    console.log('Location obtained:', latitude, longitude);
                    
                    try {
                        const formData = new FormData();
                        formData.append('lat', latitude);
                        formData.append('lon', longitude);
                        
                        const response = await fetch('<?= base_url('weather/location') ?>', {
                            method: 'POST',
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest'
                            },
                            body: formData
                        });
                        
                        if (!response.ok) {
                            throw new Error(`HTTP error! status: ${response.status}`);
                        }
                        
                        const data = await response.json();
                        console.log('Location weather data:', data);
                        
                        if (data.error) {
                            showError(`Error: ${data.error}${data.details ? ' - ' + data.details : ''}`);
                            return;
                        }
                        
                        document.getElementById('cityInput').value = data.name;
                        displayWeatherData(data);
                        updateMapLocation(latitude, longitude, data.name);
                        
                    } catch (error) {
                        console.error('Location weather error:', error);
                        showError('Failed to fetch weather data: ' + error.message);
                    }
                },
                (error) => {
                    console.error('Geolocation error:', error);
                    let errorMsg = 'Unable to retrieve your location';
                    switch(error.code) {
                        case error.PERMISSION_DENIED:
                            errorMsg = 'Location access denied by user';
                            break;
                        case error.POSITION_UNAVAILABLE:
                            errorMsg = 'Location information unavailable';
                            break;
                        case error.TIMEOUT:
                            errorMsg = 'Location request timed out';
                            break;
                    }
                    showError(errorMsg);
                },
                {
                    timeout: 10000,
                    enableHighAccuracy: true
                }
            );
        }
        
        // Display weather data
        function displayWeatherData(data) {
            console.log('Displaying weather data:', data);
            const weatherDisplay = document.getElementById('weatherDisplay');
            
            try {
                // Validate data structure
                if (!data.weather || !data.weather[0] || !data.main || !data.coord) {
                    throw new Error('Invalid weather data structure');
                }
                
                const iconCode = data.weather[0].icon;
                const iconUrl = `https://openweathermap.org/img/wn/${iconCode}@2x.png`;
                
                weatherDisplay.innerHTML = `
                    <div class="current-weather">
                        <h2>${data.name || 'Unknown Location'}${data.sys && data.sys.country ? ', ' + data.sys.country : ''}</h2>
                        <img src="${iconUrl}" alt="${data.weather[0].description}" class="weather-icon" 
                             onerror="this.style.display='none'">
                        <div class="temperature">${Math.round(data.main.temp)}°C</div>
                        <div class="weather-description">${data.weather[0].description}</div>
                    </div>
                    
                    <div class="weather-details">
                        <div class="detail-item">
                            <span>Feels like:</span>
                            <span>${Math.round(data.main.feels_like || data.main.temp)}°C</span>
                        </div>
                        <div class="detail-item">
                            <span>Humidity:</span>
                            <span>${data.main.humidity || 'N/A'}%</span>
                        </div>
                        <div class="detail-item">
                            <span>Pressure:</span>
                            <span>${data.main.pressure || 'N/A'} hPa</span>
                        </div>
                        <div class="detail-item">
                            <span>Wind Speed:</span>
                            <span>${data.wind && data.wind.speed ? data.wind.speed + ' m/s' : 'N/A'}</span>
                        </div>
                        <div class="detail-item">
                            <span>Visibility:</span>
                            <span>${data.visibility ? (data.visibility / 1000).toFixed(1) + ' km' : 'N/A'}</span>
                        </div>
                        <div class="detail-item">
                            <span>Coordinates:</span>
                            <span>${data.coord.lat.toFixed(2)}, ${data.coord.lon.toFixed(2)}</span>
                        </div>
                    </div>
                `;
            } catch (error) {
                console.error('Error displaying weather data:', error);
                showError('Error displaying weather data: ' + error.message);
            }
        }
        
        // Update map location and marker
        function updateMapLocation(lat, lon, cityName) {
            map.setView([lat, lon], 10);
            
            // Remove existing marker
            if (weatherMarker) {
                map.removeLayer(weatherMarker);
            }
            
            // Add new marker
            weatherMarker = L.marker([lat, lon]).addTo(map);
            weatherMarker.bindPopup(`<b>${cityName}</b>`).openPopup();
        }
        
        // Handle weather layer changes
        document.querySelectorAll('.layer-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                // Update active button
                document.querySelectorAll('.layer-btn').forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                const layer = this.dataset.layer;
                updateWeatherLayer(layer);
            });
        });
        
        // Update weather layer on map
        function updateWeatherLayer(layerType) {
            // Remove existing weather layer
            if (currentWeatherLayer) {
                map.removeLayer(currentWeatherLayer);
                currentWeatherLayer = null;
            }
            
            // Don't add layer if "none" is selected
            if (layerType === 'none') return;
            
            // Add new weather layer
            currentWeatherLayer = L.tileLayer(`https://tile.openweathermap.org/map/${layerType}/{z}/{x}/{y}.png?appid=<?= env('df4df77033ff875be489280de588a695') ?>`, {
                attribution: '© OpenWeatherMap',
                opacity: 0.6
            });
            
            currentWeatherLayer.addTo(map);
        }
        
        // Helper functions
        function showLoading() {
            document.getElementById('weatherDisplay').innerHTML = '<div class="loading">Loading weather data...</div>';
        }
        
        function showError(message) {
            document.getElementById('weatherDisplay').innerHTML = `<div class="error">${message}</div>`;
        }
        
        // Handle Enter key in search input
        document.getElementById('cityInput').addEventListener('keypress', function(e) {
            if (e.key === 'Enter') {
                searchWeather();
            }
        });
        
        // Initialize map when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initMap();
        });
    </script>
</body>
</html>
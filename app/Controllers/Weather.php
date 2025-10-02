<?php
// 2. CONTROLLER: app/Controllers/Weather.php
namespace App\Controllers;

use App\Models\WeatherModel;

class Weather extends BaseController
{
    private $weatherModel;
    
    public function __construct()
    {
        $this->weatherModel = new WeatherModel();
    }
    
    /**
     * Display weather dashboard
     */
    public function index()
    {
        $data = [
            'title' => 'Weather Dashboard',
            'default_city' => 'London'
        ];
        
        return view('weather/dashboard', $data);
    }
    
    /**
     * Get weather data via AJAX
     */
    public function getWeatherData()
    {
        // Allow both AJAX and regular requests for debugging
        $city = $this->request->getPost('city') ?: $this->request->getGet('city') ?: 'London';
        
        // Log the request for debugging
        log_message('debug', 'Weather request for city: ' . $city);
        
        $weatherData = $this->weatherModel->getCurrentWeather($city);
        
        // Log the response for debugging
        log_message('debug', 'Weather API response: ' . json_encode($weatherData));
        
        if (isset($weatherData['error'])) {
            return $this->response->setStatusCode(400)->setJSON([
                'error' => $weatherData['error'],
                'details' => isset($weatherData['message']) ? $weatherData['message'] : 'Unknown error'
            ]);
        }
        
        // Ensure we have required fields
        if (!isset($weatherData['coord']) || !isset($weatherData['main']) || !isset($weatherData['weather'])) {
            return $this->response->setStatusCode(400)->setJSON([
                'error' => 'Invalid weather data received from API',
                'data' => $weatherData
            ]);
        }
        
        return $this->response->setJSON($weatherData);
    }
    
    /**
     * Get weather by coordinates
     */
    public function getWeatherByLocation()
    {
        if (!$this->request->isAJAX()) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Invalid request']);
        }
        
        $lat = $this->request->getPost('lat');
        $lon = $this->request->getPost('lon');
        
        if (!$lat || !$lon) {
            return $this->response->setStatusCode(400)->setJSON(['error' => 'Coordinates required']);
        }
        
        $weatherData = $this->weatherModel->getWeatherByCoordinates($lat, $lon);
        
        return $this->response->setJSON($weatherData);
    }
    
    /**
     * Get map tile proxy (to handle CORS if needed)
     */
    public function getMapTile($layer, $z, $x, $y)
    {
        $tileUrl = $this->weatherModel->getMapTileUrl($layer, $z, $x, $y);
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $tileUrl,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 10,
        ]);
        
        $response = curl_exec($curl);
        $contentType = curl_getinfo($curl, CURLINFO_CONTENT_TYPE);
        curl_close($curl);
        
        return $this->response
            ->setHeader('Content-Type', $contentType)
            ->setBody($response);
    }
    
    /**
     * API endpoint for weather maps configuration
     */
    public function getMapConfig()
    {
        $config = [
            'api_key' => env('df4df77033ff875be489280de588a695'),
            'base_url' => base_url(),
            'available_layers' => [
                'clouds_new' => 'Clouds',
                'precipitation_new' => 'Precipitation',
                'pressure_new' => 'Pressure',
                'wind_new' => 'Wind',
                'temp_new' => 'Temperature'
            ]
        ];
        
        return $this->response->setJSON($config);
    }
    
    /**
     * Debug endpoint to test API connectivity
     */
    public function testApi($city = 'London')
    {
        $weatherData = $this->weatherModel->getCurrentWeather($city);
        
        $debug = [
            'timestamp' => date('Y-m-d H:i:s'),
            'requested_city' => $city,
            'api_key_set' => !empty(env('OPENWEATHER_API_KEY')),
            'api_key_length' => env('OPENWEATHER_API_KEY') ? strlen(env('OPENWEATHER_API_KEY')) : 0,
            'weather_data' => $weatherData,
            'curl_available' => function_exists('curl_init'),
            'openssl_available' => extension_loaded('openssl')
        ];
        
        return $this->response->setJSON($debug);
    }
}

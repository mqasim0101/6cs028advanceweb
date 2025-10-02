<?php
namespace App\Models;

use CodeIgniter\Model;

class WeatherModel extends Model
{
    private $apiKey;
    private $baseUrl = 'https://api.openweathermap.org/data/2.5/';
    private $mapUrl = 'https://tile.openweathermap.org/map/';
    
    public function __construct()
    {
        parent::__construct();
        // Get API key from environment or config
        $this->apiKey = env('OPENWEATHER_API_KEY') ?: 'df4df77033ff875be489280de588a695';
    }
    
    /**
     * Get current weather data
     */
    public function getCurrentWeather($city)
    {
        $url = $this->baseUrl . "weather?q={$city}&appid={$this->apiKey}&units=metric";
        return $this->makeApiCall($url);
    }
    
    /**
     * Get weather data by coordinates
     */
    public function getWeatherByCoordinates($lat, $lon)
    {
        $url = $this->baseUrl . "weather?lat={$lat}&lon={$lon}&appid={$this->apiKey}&units=metric";
        return $this->makeApiCall($url);
    }
    
    /**
     * Get weather forecast
     */
    public function getForecast($city, $days = 5)
    {
        $url = $this->baseUrl . "forecast?q={$city}&appid={$this->apiKey}&units=metric&cnt=" . ($days * 8);
        return $this->makeApiCall($url);
    }
    
    /**
     * Get weather map tile URL
     */
    public function getMapTileUrl($layer, $z, $x, $y)
    {
        // Available layers: clouds_new, precipitation_new, pressure_new, wind_new, temp_new
        return $this->mapUrl . "{$layer}/{$z}/{$x}/{$y}.png?appid={$this->apiKey}";
    }
    
    /**
     * Make API call using cURL
     */
    private function makeApiCall($url)
    {
        // Log the API URL for debugging
        log_message('debug', 'Making API call to: ' . $url);
        
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_SSL_VERIFYPEER => false, // For development only
            CURLOPT_USERAGENT => 'CodeIgniter Weather App'
        ]);
        
        $response = curl_exec($curl);
        $httpCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        $curlError = curl_error($curl);
        curl_close($curl);
        
        // Log the response for debugging
        log_message('debug', "API Response - HTTP Code: $httpCode, Response: $response");
        
        if ($curlError) {
            log_message('error', 'cURL Error: ' . $curlError);
            return ['error' => 'Network error: ' . $curlError];
        }
        
        if ($httpCode === 200) {
            $decodedResponse = json_decode($response, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                return ['error' => 'Invalid JSON response from API'];
            }
            return $decodedResponse;
        } else {
            // Try to decode error response
            $errorData = json_decode($response, true);
            return [
                'error' => 'API call failed',
                'http_code' => $httpCode,
                'message' => isset($errorData['message']) ? $errorData['message'] : 'Unknown error',
                'response' => $response
            ];
        }
    }
}
?>
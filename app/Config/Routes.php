<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\News; // Add this line
use App\Controllers\Pages;
use App\Controllers\Home;
use App\Controllers\Contactus;
use App\Controllers\About;
use App\Controllers\Account;
use App\Controllers\Client;
use App\Controllers\WeatherMap;
/**
 * @var RouteCollection $routes
 */
# Default route:
$routes->get('/', 'Home::index');
// Static pages:
$routes->get('pages', [Pages::class, 'index']);
$routes->get('pages/(:segment)', [Pages::class, 'view']);
$routes->get('pages/home', [Home::class, 'show']);// Main Home Page:
$routes->get('pages/about', [About::class, 'aboutus']); // For about page:
$routes->get('pages/contactus', [Contactus::class, 'support']); // For Contact us page:
# News Controller below:
$routes->get('news', [News::class, 'index']); // Add this line for Reading News
$routes->get('news/new', [News::class, 'new']); // Add this line for form for viewing News
$routes->post('news', [News::class, 'create']); // Add this for creating news!
$routes->get('news/edit/(:segment)', [News::class, 'edit']);
$routes->post('news/update/(:segment)', [News::class, 'update']);
$routes->get('news/(:segment)', [News::class, 'show']); // Add this line
//$routes->get('news/delete', [News::class, 'delete']); // Add this line for deleting News

/*//Accessing form:
// Account info will be below:
$routes->get('account/login', [Account::class, 'login_page']); // For Login Page:
$routes->get('account/signup', [Account::class, 'signup_page']); // For Signup Page:
$routes->get('account/account_info', [Account::class, 'account_information']); // For Account Info Page: */

//$routes->get('/register', [Client::class, 'register']);
// Routes for login/Registration:
$routes->get('auth/register', [Client::class, 'store']);
//$routes->post('auth/register', [Client::class, 'processRegister']);
$routes->get('auth/login', [Client::class, 'login']);
$routes->post('auth/login', [Client::class, 'verifyLogin']);
$routes->get('auth/logout', [Client::class, 'logout']);
// Logout function:
//$routes->get('auth/forgotpassword', Client::class,'forgotpassword');

// Protected routes
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('auth/index', 'Dashboard::index');
    // Add other protected routes here
});


<?php defined('BASEPATH') OR exit('No direct script access allowed');
/*
| -------------------------------------------------------------------
|  Google API Configuration
| -------------------------------------------------------------------
|  client_id         string   Your Google API Client ID.
|  client_secret     string   Your Google API Client secret.
|  redirect_uri      string   URL to redirect back to after login.
|  application_name  string   Your Google application name.
|  api_key           string   Developer key.
|  scopes            string   Specify scopes
*/
$config['google']['client_id']        = '864450749052-slg7u62mg1bi05njhhno0m1sv0r2lk5l.apps.googleusercontent.com';
$config['google']['client_secret']    = 'Smz6rwhB3c6t_vF5HbyrsJ_a';
$config['google']['redirect_uri']     = base_url().'registration/auth_google';
$config['google']['redirect_uri_merchant']     = base_url().'registration/auth_google_merchant';
$config['google']['redirect_uri_login']     = base_url().'login/auth_google';
$config['google']['application_name'] = 'tastivo';
$config['google']['api_key']          = '';
$config['google']['scopes']           = array('email','profile');
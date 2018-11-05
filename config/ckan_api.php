<?php
/**
 * CKAN API CONFIGURATION
 *
 * url: is the base ckan url, for example https://data.myckan.com
 * api_key: To find it, login to the CKAN site using its web interface and visit your user profile page.
 * api_version: Api version that you want to use, we use the last one, so leave it empty if you are sure.
 */
return [
    'url' => env('CKAN_URL', 'http://13.76.133.211'),
    'api_key' => env('CKAN_API_KEY', '193d2d66-f49c-4bac-9975-c406694589ee'),
    'api_version' => env('2', ''),

    'repositories' => [
        'per_page' => 20,
    ],
];
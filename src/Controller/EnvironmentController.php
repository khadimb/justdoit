<?php

namespace App\Controller;
use Symfony\Component\HttpClient\HttpClient;

class EnvironmentController extends AbstractController
{
    public function environment()
    {

        $client = HttpClient::create();
        $response = $client->request('GET', 'http://mars-photos.herokuapp.com/api/v1/rovers/Perseverance/photos?earth_date=2021-05-09?api_key=Uhb88PepnBJsmemDorgenrrjO1qUIovFepIVw5bR');
        $selectMaps = [];

        $statusCode = $response->getStatusCode();

        if ($statusCode === 200) {
            $maps = $response->toArray();
        }
        
        return $this->twig->render('Environment/environment.html.twig', ['maps' => $maps['photos']]);
    }
}

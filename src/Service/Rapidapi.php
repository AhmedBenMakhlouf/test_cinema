<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\ParameterBag\ContainerBagInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class Rapidapi
{
    public function __construct(private HttpClientInterface $client,private ContainerBagInterface $params,) {
        $this->client = $client;
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function getRapidApi($name){
        $key = $this->params->get('app.rapid_dir');
        $response = $this->client->request('GET', "https://imdb8.p.rapidapi.com/auto-complete?q='.$name." , [
            'headers' => [
                'X-RapidAPI-Host' => 'imdb8.p.rapidapi.com',
                'X-RapidAPI-Key' => $key,
            ],
        ]);
        $statusCode = $response->getStatusCode();
        if ($statusCode == 200){
            try {
                return $response->getContent();
            } catch (ClientExceptionInterface|RedirectionExceptionInterface|ServerExceptionInterface|TransportExceptionInterface $e) {
            }
        }
        return $response->getStatusCode();
    }
}
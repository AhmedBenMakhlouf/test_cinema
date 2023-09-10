<?php

namespace App\Controller;

use App\Service\Rapidapi;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RapidApiController extends AbstractController
{
    #[Route('/api/poster/{slug}', name: 'poster', methods: 'GET')]
    public function getData(Rapidapi $rapidapi, Request $request){
        $data = $request->get('name');
        $response = $rapidapi->getRapidApi($data);
        return $this->json($response);

    }
}
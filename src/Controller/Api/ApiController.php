<?php
namespace App\Controller\Api;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractFOSRestController
{
    /**
     * @Route("/api", name="app_api_home")
     */
    public function index()
    {
        return $this->json(
            ['test' => __METHOD__]
        );
    }
}
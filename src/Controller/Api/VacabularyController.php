<?php
namespace App\Controller\Api;

use App\Repository\VacabularyRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;

class VacabularyController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/api/words", name="app_api_words_words")
     * @param VacabularyRepository $repository
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function all(VacabularyRepository $repository)
    {
        return $this->json(
            $repository->findAll()
        );
    }

    /**
     * @Rest\Get("/api/words/{id}", name="app_api_words_word")
     * @param VacabularyRepository $repository
     * @param int $id
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getWord(VacabularyRepository $repository, int $id)
    {
        return $this->json(
            $repository->findBy(['id' => $id])
        );
    }

    /**
//     * @Rest\Post("/api/words", name="app_api_words_store")
//     */
//    public function store()
//    {
//
//    }
//
//    /**
//     * @Rest\Put("/api/words/{id}, name="app_api_words_update")
//     */
//    public function update()
//    {
//
//    }
}
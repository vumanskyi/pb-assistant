<?php
namespace App\Controller\Api;

use App\Entity\Vocabulary;
use App\Repository\VocabularyRepository;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * @author Vlad Umanskyi
 * @Rest\Route("/api")
 */
class VocabularyController extends ApiController
{
    /**
     * @var VocabularyRepository
     */
    private $vocabularyRepository;

    /**
     * VacabularyController constructor.
     * @param VocabularyRepository $repository
     */
    public function __construct(VocabularyRepository $repository)
    {
        $this->vocabularyRepository = $repository;
    }

    /**
     * @return VocabularyRepository
     */
    public function getVocabularyRepository(): VocabularyRepository
    {
        return $this->vocabularyRepository;
    }

    /**
     * @Rest\Get("/words", name="app_api_words_words")
     * @return \FOS\RestBundle\View\View
     */
    public function all()
    {
        return $this->view(
            $this->getVocabularyRepository()->findAll(),
            Response::HTTP_OK
        );
    }

    /**
     * @Rest\Get("/words/{id}", name="app_api_words_word")
     * @param int $id
     * @return \FOS\RestBundle\View\View
     */
    public function getWord(int $id)
    {
        return $this->view(
            $this->getVocabularyRepository()->findBy(['id' => $id]),
            Response::HTTP_OK
        );
    }

    /**
     * @Rest\Post("/words", name="app_api_words_store")
     * @param Request $request
     * @param ValidatorInterface $validator
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function store(Request $request, ValidatorInterface $validator)
    {
        $vocabulary = new Vocabulary();

        $vocabulary->setTranslate($request->get('translate'));
        $vocabulary->setWord($request->get('word'));
        $vocabulary->setTranscription($request->get('transcription'));
        $vocabulary->setExample($request->get('example'));

        $errors = $validator->validate($vocabulary);

        if (count($errors) > 0) {
            return $this->getErrorResponse($errors);

        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($vocabulary);
        $em->flush();

        return $this->json([
            'message' => 'The data successfully created',
            'id' => $vocabulary->getId()
        ], Response::HTTP_CREATED);
    }

//
//    /**
//     * @Rest\Put("/words/{id}, name="app_api_words_update")
//     */
//    public function update()
//    {
//
//    }
}
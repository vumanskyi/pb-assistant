<?php
namespace App\Controller\Api;

use App\Entity\Vocabulary;
use App\Form\VocabularyFormType;
use App\Repository\VocabularyRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @author Vlad Umanskyi
 * @Rest\Route("/api")
 */
class VocabularyController extends AbstractFOSRestController
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
     * @param VocabularyRepository $repository
     * @param int $id
     * @return \FOS\RestBundle\View\View
     */
    public function getWord(VocabularyRepository $repository, int $id)
    {
        return $this->view(
            $repository->findBy(['id' => $id]),
            Response::HTTP_OK
        );
    }

    /**
     * @Rest\Post("/words", name="app_api_words_store")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function store(Request $request)
    {
        $vocabulary = new Vocabulary();

        $form = $this->createForm(VocabularyFormType::class, $vocabulary);

        $form->submit($request->request->all());

        $form->handleRequest($request);

        if ($form->isSubmitted() && !$form->isValid()) {
            return $this->json([
                'title' => 'There was a validation error',
                'errors' => $this->getErrorsFromForm($form)
            ]);
        }
        $em = $this->getDoctrine()->getManager();
        $em->persist($vocabulary);
        $em->flush();

        return $this->json([
            'message' => 'The data successfully created',
            'id' => $vocabulary->getId()
        ], Response::HTTP_CREATED);
    }

    /**
     * @param FormInterface $form
     * @return array
     */
    private function getErrorsFromForm(FormInterface $form)
    {
        $errors = array();
        foreach ($form->getErrors(true, false) as $key => $error) {
            $errors[] = $error->getMessage();
        }
        foreach ($form->all() as $childForm) {
            if ($childForm instanceof FormInterface) {
                if ($childErrors = $this->getErrorsFromForm($childForm)) {
                    $errors[$childForm->getName()] = $childErrors;
                }
            }
        }
        return $errors;
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
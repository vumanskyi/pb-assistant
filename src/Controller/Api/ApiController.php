<?php
namespace App\Controller\Api;

use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\ConstraintViolationList;

/**
 * @author Vlad Umanskyi
 */
class ApiController extends AbstractFOSRestController
{
    /**
     * @param ConstraintViolationList $validator
     * @return array
     */
    protected static function getErrors(ConstraintViolationList $validator): array
    {
        $errorList = [];
        foreach ($validator as $error) {
            $errorList[$error->getPropertyPath()] = $error->getMessage();
        }
        return $errorList;
    }

    /**
     * @param ConstraintViolationList $validator
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function getErrorResponse(ConstraintViolationList $validator)
    {
        return $this->json(
            [
                'title' => 'Errors',
                'errors' => static::getErrors($validator)
            ],
            Response::HTTP_BAD_REQUEST
        );
    }
}
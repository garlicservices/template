<?php

namespace App\Controller;

use Garlic\Bus\Entity\Response;
use Garlic\Bus\Service\CommunicatorService;
use GeneratorService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Nelmio\ApiDocBundle\Annotation\Model;
use Swagger\Annotations as SWG;
use Symfony\Component\HttpFoundation\JsonResponse;

class DefaultController extends Controller
{
    /**
     * Default method that requests default route from Cabinet service (for example)
     *
     * @Route("/{param}", name="default", methods={"GET"})
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @SWG\Response(
     *     response=200,
     *     description="Returns contents of request to Cabinet service",
     *     @SWG\Schema(
     *         type="array",
     *         @Model(type=JsonResponse::class)
     *     )
     * )
     * @SWG\Parameter(
     *     name="param",
     *     in="path",
     *     type="string",
     *     description="The field used to test parameters"
     * )
     *
     * @param $param
     * @return JsonResponse
     */
    public function index($param)
    {
        /** @var Response $response */
        $response = $this->get(CommunicatorService::class)
            ->request('template')
            ->root([$param]);

        return $response->getJsonResponse();
    }
}

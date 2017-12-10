<?php

namespace AppBundle\Controller;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiProperty;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends Controller
{
    /**
     * @Route("/api/index/{q}", name="homepage")
     *
     */
    public function indexAction(Request $request, $q)
    {
        $finder = $this->container->get('fos_elastica.finder.app.office');

// Option 1. Returns all users who have example.net in any of their mapped fields
        $results = $finder->find('Chaari');

        return new JsonResponse(json_encode($results));
    }
}

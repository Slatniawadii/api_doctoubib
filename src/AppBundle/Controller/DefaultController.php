<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/api/index/_search", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $requestPayload = $request->getContent();

        $elasticsearchHost = $this->getParameter('fos_elastica.host').':'. $this->getParameter('fos_elastica.port');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL,$elasticsearchHost."/app/_search");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestPayload);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        return new \Symfony\Component\HttpFoundation\Response($server_output);
    }
}

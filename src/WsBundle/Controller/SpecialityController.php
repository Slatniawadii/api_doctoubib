<?php

namespace WsBundle\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class SpecialityController
 *
 * @Rest\RouteResource("Speciality")
 */
class SpecialityController extends FOSRestController
{

    /**
     * Retourne la liste des specilités qui répondent aux critères passés en paramètres.
     *
     *
     * @ApiDoc(
     *   description="Retourne la liste des specialités",
     *   section="Speciality",
     *   statusCodes={
     *     200="Tout s'est bien passé",
     *     404="Aucun résultat trouvé",
     *     500="Erreur interne"
     *   }
     * )
     *
     * @Rest\View()
     *
     * @param ParamFetcher $paramFetcher
     * @return mixed
     */
    public function cgetAction(ParamFetcher $paramFetcher)
    {
        $params = $paramFetcher->all();
        $em = $this->getDoctrine()->getManager();

        $specialities = $em->getRepository('DoctoubibModelsBundle:Speciality')
            ->findAll($params);


        return $specialities;
    }

}

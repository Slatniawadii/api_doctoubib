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
 * @Rest\RouteResource("Region")
 */
class RegionController extends FOSRestController
{

    /**
     * Retourne la liste des regions qui répondent aux critères passés en paramètres.
     *
     *
     * @ApiDoc(
     *   description="Retourne la liste des regions",
     *   section="Region",
     *   statusCodes={
     *     200="Tout s'est bien passé",
     *     404="Aucun résultat trouvé",
     *     500="Erreur interne"
     *   }
     * )
     *
     * @Rest\QueryParam(name="for_form", nullable=true, description="structured data for form type")
     * @Rest\View()
     *
     * @param ParamFetcher $paramFetcher
     * @return mixed
     */
    public function cgetAction(ParamFetcher $paramFetcher)
    {
        $params = $paramFetcher->all();

        $em = $this->getDoctrine()->getManager();
        $specialities = $em->getRepository('DoctoubibModelsBundle:Region')
            ->getSpecialities();

        if ($params['for_form']) {
            $data = array();
            if (!empty($specialities)) {
                foreach ($specialities as $speciality) {
                    $data[$speciality['name']] = $speciality['slug'];
                }
            }

            return $data;
        }

        return $specialities;
    }

}

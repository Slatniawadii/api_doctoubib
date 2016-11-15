<?php

namespace WsBundle\Controller;

use Doctoubib\ModelsBundle\Entity\Doctor;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;

/**
 * Class DoctorController
 *
 * @Rest\RouteResource("Doctor")
 */
class DoctorController extends FOSRestController
{

    /**
     * Retourne la liste des doctors qui répondent aux critères passés en paramètres.
     *
     * Tri par nom de docteur ascendant.
     * 100 résultats maximum.
     *
     * @ApiDoc(
     *   description="Retourne la liste des praticiens",
     *   section="Doctor",
     *   statusCodes={
     *     200="Tout s'est bien passé",
     *     404="Aucun résultat trouvé",
     *     500="Erreur interne"
     *   }
     * )
     * @Rest\QueryParam(name="id", nullable=true, description="doctor id")
     * @Rest\QueryParam(name="slug", nullable=true, description="doctor slug")
     * @Rest\QueryParam(name="region", nullable=true, description="doctor region")
     * @Rest\QueryParam(name="speciality", nullable=true, description="doctor speciality")
     * @Rest\View()
     *
     * @param ParamFetcher $paramFetcher
     * @return mixed
     */
    public function cgetAction(ParamFetcher $paramFetcher)
    {
        $params = $paramFetcher->all();
        $em = $this->getDoctrine()->getManager();

        $doctors = $em->getRepository('DoctoubibModelsBundle:Doctor')
            ->findByCriteria($params);


        return $doctors;
    }


    /**
     * @ApiDoc(
     *  section = "Doctor",
     *  resource=true,
     *  description="Return a collection of doctors",
     * )
     *
     * @return array
     * @View()
     */
    public function getDoctorsAction()
    {
        $em = $this->getDoctrine()->getManager();

        $doctors = $em->getRepository('DoctoubibModelsBundle:Doctor')->findAll();

        return $doctors;
    }

    /**
     * @ApiDoc(
     *  section = "Doctor",
     *  resource= true,
     *  resource=true,
     *  description="Return a given doctor",
     * )
     *
     * @param Doctor $doctor
     * @return array
     * @View()
     * @ParamConverter("doctor", class="DoctoubibModelsBundle:Doctor")
     */
    public function getDoctorAction(Doctor $doctor)
    {
        return array('doctor' => $doctor);
    }

    /**
     *
     *
     *  @ApiDoc(
     *   description="Créé un nouveau contact",
     *   input="Doctoubib\ModelsBundle\Form\Type\DoctorType",
     *   output="Doctoubib\ModelsBundle\Entity\Doctor",
     *   section="Doctor",
     *   statusCodes={
     *     201="Client créé",
     *     400="Paramètres incorrects",
     *     500="Erreur interne"
     *   }
     * )
     * @param Request $request
     * @return array
     * @View()
     *
     */
    public function postDoctorAction(Request $request)
    {
        $params = $request->request->all();
        return $this->get('aramis.object.service.contact')->save($params);
    }

}

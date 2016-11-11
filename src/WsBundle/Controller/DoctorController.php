<?php

namespace WsBundle\Controller;

use Doctoubib\ModelsBundle\Entity\Doctor;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;


class DoctorController extends Controller
{
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

        $users = $em->getRepository('DoctoubibModelsBundle:Doctor')->findAll();

        return array('users' => $users);
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

<?php

namespace WsBundle\Controller;

use Doctoubib\ModelsBundle\Entity\Doctor;
use FOS\RestBundle\Request\ParamFetcher;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations\View;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;


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
     * @ApiDoc(
     *  section = "Doctor",
     *  resource=true,
     *  description="This is a description of your API method",
     * )
     *
     * @param ParamFetcher $paramFetcher
     * @return array
     * @View()
     *
     */
    public function postDoctorAction(ParamFetcher $paramFetcher)
    {
        return array('doctor' => array());
    }

}

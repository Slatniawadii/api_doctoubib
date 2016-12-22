<?php

namespace WsBundle\Controller;


use FOS\RestBundle\Controller\FOSRestController;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use FOS\RestBundle\Controller\Annotations as Rest;
use Symfony\Component\Config\Definition\Exception\Exception;
use FOS\RestBundle\Request\ParamFetcher;
use FOS\RestBundle\Controller\Annotations\QueryParam;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use FOS\RestBundle\View\View;

/**
 * Class ContactController
 *
 * @Rest\RouteResource("Contact")
 */
class ContactController extends FOSRestController
{
    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\Response
     *
     *
     * @ApiDoc(
     *     section="Contact",
     * )
     */
    public function getAction($id)
    {
        //return $this->render('', array('name' => $id));
    }

    /**
     * @ApiDoc(
     *     section = "Contact"
     * )
     */
    public function cgetAction()
    {
        //
    }

    /**
     * @param Request $request
     *
     * @ApiDoc(
     *     section="Contact"
     * )
     *
     * @Rest\QueryParam(name="subject", nullable=false, description="Subject")
     * @Rest\RequestParam(name="username", nullable=false, description="Name")
     * @Rest\QueryParam(name="email", nullable=false, description="Email")
     * @Rest\QueryParam(name="message", nullable=false, description="Message")
     *
     * @Rest\View()
     *
     * @return View
     */
    public function postAction(Request $request)
    {
        try {
            $params = $request->request->all();
            $this->get('doctoubib_models.contactmessage')->save($params);
        } catch (Exception $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        return View::create(null, 200);

    }
}

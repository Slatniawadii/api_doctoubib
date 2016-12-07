<?php

namespace WsBundle\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Bundle\FrameworkBundle\Routing\Router;
use Symfony\Bundle\FrameworkBundle\Routing\RouteCollection;

class ResponseListener implements EventSubscriberInterface
{
    /**
     * @var $_router Router
     */
    private $_router;

    /**
     * @var $_routeCollection RouteCollection
     */
    private $_routeCollection;

    /**
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        $this->_router = $router;
        $this->_routeCollection = $router->getRouteCollection();
    }

    /**
     * @return array
     */
    public static function getSubscribedEvents()
    {
        return array(
            KernelEvents::RESPONSE => 'onResponse'
        );
    }

    /**
     * @param FilterResponseEvent $event
     *
     * @return Symfony\Component\HttpFoundation\Response;
     */
    public function onResponse(FilterResponseEvent $event)
    {
        $request  = $event->getRequest();
        $response = $event->getResponse();

        if ('GET' == $request->getMethod() &&
            '20' == substr($response->getStatusCode(), 0, 2)) {

            $routeName = $request->get('_route');

            if (!$routeName) {
                $pathInfo = $request->getPathInfo();
                $routeName = $this->_router->match($pathInfo)['_route'];
            }

            if ($routeName) {
                $route = $this->_routeCollection->get($routeName);
                $defaults = $route->getDefaults();

                if (isset($defaults['cache'])) {
                    $params = $defaults['cache'];
                    if (isset($params["enabled"]) && $params["enabled"]) {
                        if (isset($params['type']) && 'public' == strtolower($params['type'])) {
                            $response->setPublic();
                        }
                        if (isset($params['max_age'])) {
                            $response->setMaxAge($params['max_age']);
                            $response->setSharedMaxAge($params['max_age']);
                        }

                        return $response;
                    }
                }
            }
        }
    }
}

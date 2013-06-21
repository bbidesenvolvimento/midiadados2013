<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/')) {
            // categoria
            if (rtrim($pathinfo, '/') === '/categoria') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'categoria');
                }

                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\CategoriaController::indexAction',  '_route' => 'categoria',);
            }

            // categoria_show
            if (0 === strpos($pathinfo, '/categoria') && preg_match('#^/categoria/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\CategoriaController::showAction',)), array('_route' => 'categoria_show'));
            }

            // categoria_new
            if ($pathinfo === '/categoria/new') {
                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\CategoriaController::newAction',  '_route' => 'categoria_new',);
            }

            // categoria_create
            if ($pathinfo === '/categoria/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_categoria_create;
                }

                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\CategoriaController::createAction',  '_route' => 'categoria_create',);
            }
            not_categoria_create:

            // categoria_edit
            if (0 === strpos($pathinfo, '/categoria') && preg_match('#^/categoria/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\CategoriaController::editAction',)), array('_route' => 'categoria_edit'));
            }

            // categoria_update
            if (0 === strpos($pathinfo, '/categoria') && preg_match('#^/categoria/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_categoria_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\CategoriaController::updateAction',)), array('_route' => 'categoria_update'));
            }
            not_categoria_update:

            // categoria_delete
            if (0 === strpos($pathinfo, '/categoria') && preg_match('#^/categoria/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_categoria_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\CategoriaController::deleteAction',)), array('_route' => 'categoria_delete'));
            }
            not_categoria_delete:

        }

        // bbi_tmanager_default_index
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
            return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\DefaultController::indexAction',)), array('_route' => 'bbi_tmanager_default_index'));
        }

        if (0 === strpos($pathinfo, '/')) {
            // item
            if (rtrim($pathinfo, '/') === '/item') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'item');
                }

                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::indexAction',  '_route' => 'item',);
            }

            // json
            if ($pathinfo === '/item/json') {
                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::jsonAction',  '_route' => 'json',);
            }

            // jsonoff
            if ($pathinfo === '/item/jsonoff') {
                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::jsonoffAction',  '_route' => 'jsonoff',);
            }

            // jsonlista
            if ($pathinfo === '/item/jsonlista') {
                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::jsonlistaAction',  '_route' => 'jsonlista',);
            }

            // item_show
            if (0 === strpos($pathinfo, '/item') && preg_match('#^/item/(?P<id>[^/]+)/show$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::showAction',)), array('_route' => 'item_show'));
            }

            // item_new
            if ($pathinfo === '/item/new') {
                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::newAction',  '_route' => 'item_new',);
            }

            // item_create
            if ($pathinfo === '/item/create') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_item_create;
                }

                return array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::createAction',  '_route' => 'item_create',);
            }
            not_item_create:

            // item_edit
            if (0 === strpos($pathinfo, '/item') && preg_match('#^/item/(?P<id>[^/]+)/edit$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::editAction',)), array('_route' => 'item_edit'));
            }

            // item_update
            if (0 === strpos($pathinfo, '/item') && preg_match('#^/item/(?P<id>[^/]+)/update$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_item_update;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::updateAction',)), array('_route' => 'item_update'));
            }
            not_item_update:

            // item_delete
            if (0 === strpos($pathinfo, '/item') && preg_match('#^/item/(?P<id>[^/]+)/delete$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_item_delete;
                }

                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Bbi\\TmanagerBundle\\Controller\\ItemController::deleteAction',)), array('_route' => 'item_delete'));
            }
            not_item_delete:

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

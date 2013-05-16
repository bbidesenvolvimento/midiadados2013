<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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
            // _welcome
            if (rtrim($pathinfo, '/') === '') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_welcome');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\WelcomeController::indexAction',  '_route' => '_welcome',);
            }

            if (0 === strpos($pathinfo, '/')) {
                // _demo_login
                if ($pathinfo === '/demo/secured/login') {
                    return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::loginAction',  '_route' => '_demo_login',);
                }

                // _security_check
                if ($pathinfo === '/demo/secured/login_check') {
                    return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::securityCheckAction',  '_route' => '_security_check',);
                }

                // _demo_logout
                if ($pathinfo === '/demo/secured/logout') {
                    return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::logoutAction',  '_route' => '_demo_logout',);
                }

                // acme_demo_secured_hello
                if ($pathinfo === '/demo/secured/hello') {
                    return array (  'name' => 'World',  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',  '_route' => 'acme_demo_secured_hello',);
                }

                // _demo_secured_hello
                if (0 === strpos($pathinfo, '/demo/secured/hello') && preg_match('#^/demo/secured/hello/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloAction',)), array('_route' => '_demo_secured_hello'));
                }

                // _demo_secured_hello_admin
                if (0 === strpos($pathinfo, '/demo/secured/hello/admin') && preg_match('#^/demo/secured/hello/admin/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\SecuredController::helloadminAction',)), array('_route' => '_demo_secured_hello_admin'));
                }

            }

            // _demo
            if (rtrim($pathinfo, '/') === '/demo') {
                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', '_demo');
                }

                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::indexAction',  '_route' => '_demo',);
            }

            // _demo_hello
            if (0 === strpos($pathinfo, '/demo/hello') && preg_match('#^/demo/hello/(?P<name>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::helloAction',)), array('_route' => '_demo_hello'));
            }

            // _demo_contact
            if ($pathinfo === '/demo/contact') {
                return array (  '_controller' => 'Acme\\DemoBundle\\Controller\\DemoController::contactAction',  '_route' => '_demo_contact',);
            }

            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::toolbarAction',)), array('_route' => '_wdt'));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_search
                if ($pathinfo === '/_profiler/search') {
                    return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchAction',  '_route' => '_profiler_search',);
                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::infoAction',)), array('_route' => '_profiler_info'));
                }

                // _profiler_import
                if ($pathinfo === '/_profiler/import') {
                    return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::importAction',  '_route' => '_profiler_import',);
                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]+)\\.txt$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::exportAction',)), array('_route' => '_profiler_export'));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]+)/search/results$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::searchResultsAction',)), array('_route' => '_profiler_search_results'));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Symfony\\Bundle\\WebProfilerBundle\\Controller\\ProfilerController::panelAction',)), array('_route' => '_profiler'));
                }

                // _profiler_redirect
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_redirect');
                    }

                    return array (  '_controller' => 'Symfony\\Bundle\\FrameworkBundle\\Controller\\RedirectController::redirectAction',  'route' => '_profiler_search_results',  'token' => 'empty',  'ip' => '',  'url' => '',  'method' => '',  'limit' => '10',  '_route' => '_profiler_redirect',);
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]+)$#s', $pathinfo, $matches)) {
                    return array_merge($this->mergeDefaults($matches, array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',)), array('_route' => '_configurator_step'));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

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

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}

<?php


use Symfony\Component\DependencyInjection;
use Symfony\Component\DependencyInjection\Reference;

$sc = new DependencyInjection\ContainerBuilder();
$sc->register('context', 'Symfony\Component\Routing\RequestContext');
$sc->register('matcher', 'Symfony\Component\Routing\Matcher\UrlMatcher')
    ->setArguments([$routes, new Reference('context')]);

$sc->register('request_stack', 'Symfony\Component\HttpFoundation\RequestStack');
$sc->register('resolver', 'Symfony\Component\HttpKernel\Controller\ControllerResolver');

$sc->register('listener.router', 'Symfony\Component\HttpKernel\EventListener\RouterListener')
    ->setArguments([new Reference('matcher'), new Reference('request_stack')]);

$sc->register('listener.response', 'Symfony\Component\HttpKernel\EventListener\ResponseListener')
    ->setArguments(['UTF-8']);

$sc->register('listener.exception', 'Symfony\Component\HttpKernel\EventListener\ExceptionListener')
    ->setArguments(['\\app\\Http\\Controllers\\ErrorController::exceptionAction']);

$sc->register('dispatcher', 'Symfony\Component\EventDispatcher\EventDispatcher')
    ->addMethodCall('addSubscriber', [new Reference('listener.router')])
    ->addMethodCall('addSubscriber', [new Reference('listener.response')])
    ->addMethodCall('addSubscriber', [new Reference('listener.exception')]);

$sc->register('framework', 'Circle\Framework')
    ->setArguments([new Reference('dispatcher'), new Reference('resolver')]);

$sc->getDefinition('dispatcher')->addMethodCall('addSubscriber', [new Reference('listener.string_response')]);

$sc->setParameter('debug', true);
$sc->register('listener.string_response', 'Circle\StringResponseListener');

$sc->register('listener.response', 'Symfony\Component\HttpKernel\EventListener\ResponseListener')->setArguments(['%charset%']);
$sc->setParameter('charset', 'UTF-8');
$sc->register('matcher', 'Symfony\Component\Routing\Matcher\UrlMatcher')->setArguments(['%routes%', new Reference('context')]);

$sc->setParameter('routes', include __DIR__.'/../app/routes.php');

return $sc;

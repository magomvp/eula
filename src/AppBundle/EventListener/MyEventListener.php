<?php
/**
 * Created by PhpStorm.
 * User: marius.melega
 * Date: 8/27/2015
 * Time: 5:46 PM
 */

namespace AppBundle\EventListener;


use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class MyEventListener
{
    public function onKernelRequest(GetResponseEvent $responseEvent)
    {
        var_export($responseEvent->getRequest()->getUri());
    }
}
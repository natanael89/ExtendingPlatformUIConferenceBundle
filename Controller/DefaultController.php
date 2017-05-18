<?php

namespace EzSystems\ExtendingPlatformUIConferenceBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EzSystemsExtendingPlatformUIConferenceBundle:Default:index.html.twig');
    }
}

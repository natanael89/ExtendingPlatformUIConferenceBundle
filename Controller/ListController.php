<?php

namespace EzSystems\ExtendingPlatformUIConferenceBundle\Controller;

use eZ\Publish\API\Repository\Values\Content\LocationQuery;
use eZ\Publish\API\Repository\Values\Content\Query\Criterion;
use EzSystems\PlatformUIBundle\Controller\Controller as BaseController;

class ListController extends BaseController
{
    public function listAction($offset)
    {
        $query = new LocationQuery();
        $query->query = new Criterion\Subtree('/1/');
        $query->offset = (int)$offset;

        return $this->render('EzSystemsExtendingPlatformUIConferenceBundle:List:list.html.twig', [
            'results' => $this->get('ezpublish.api.service.search')->findLocations($query),
        ]);
    }
}

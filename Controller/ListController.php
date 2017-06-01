<?php

namespace EzSystems\ExtendingPlatformUIConferenceBundle\Controller;

use EzSystems\PlatformUIBundle\Controller\Controller as BaseController;

class ListController extends BaseController
{
    public function listAction($offset, $typeIdentifier)
    {
        $contentSearcher = $this->get('ez_systems_extending_platform_uiconference.service.content_searcher');
        $contentSearcher->setOffset($offset);
        $results = $contentSearcher->findContentItems($typeIdentifier);
        $previousIndex = $contentSearcher->calculatePreviousIndex();
        $nextIndex = $contentSearcher->calculateNextIndex($results->totalCount);

        return $this->render('EzSystemsExtendingPlatformUIConferenceBundle:List:list.html.twig', [
            'typeIdentifier' => $typeIdentifier,
            'results' => $results,
            'previous' => $previousIndex,
            'next' => $nextIndex
        ]);
    }
}

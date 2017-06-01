<?php

namespace EzSystems\ExtendingPlatformUIConferenceBundle\Controller;

use EzSystems\PlatformUIBundle\Controller\Controller as BaseController;

class ListController extends BaseController
{
    public function listAction($offset)
    {
        $contentSearcher = $this->get('ez_systems_extending_platform_uiconference.service.content_searcher');
        $contentSearcher->setOffset($offset);
        $results = $contentSearcher->findContentItems();
        $previousIndex = $contentSearcher->calculatePreviousIndex();
        $nextIndex = $contentSearcher->calculateNextIndex($results->totalCount);

        return $this->render('EzSystemsExtendingPlatformUIConferenceBundle:List:list.html.twig', [
            'results' => $results,
            'previous' => $previousIndex,
            'next' => $nextIndex
        ]);
    }
}

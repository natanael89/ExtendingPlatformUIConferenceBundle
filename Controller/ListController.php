<?php

namespace EzSystems\ExtendingPlatformUIConferenceBundle\Controller;

use EzSystems\ExtendingPlatformUIConferenceBundle\Form\ContentListFilterType;
use EzSystems\PlatformUIBundle\Controller\Controller as BaseController;

class ListController extends BaseController
{
    public function listAction($offset, $typeIdentifier)
    {
        $contentType = $this->getContentType($typeIdentifier);

        $contentSearcher = $this->get('ez_systems_extending_platform_uiconference.service.content_searcher');
        $contentSearcher->setOffset($offset);
        $results = $contentSearcher->findContentItems($typeIdentifier);
        $previousIndex = $contentSearcher->calculatePreviousIndex();
        $nextIndex = $contentSearcher->calculateNextIndex($results->totalCount);

        $form = $this->createForm(ContentListFilterType::class);
        $form->get('typesList')->setData($typeIdentifier);

        return $this->render('EzSystemsExtendingPlatformUIConferenceBundle:List:list.html.twig', [
            'typeIdentifier' => $typeIdentifier,
            'contentType' => $contentType,
            'results' => $results,
            'previous' => $previousIndex,
            'next' => $nextIndex,
            'form' => $form->createView()
        ]);
    }

    private function getContentType($typeIdentifier)
    {
        $type = null;
        if ($typeIdentifier) {
            $type = $this->get('ezpublish.api.service.content_type')->loadContentTypeByIdentifier($typeIdentifier);
        }

        return $type;
    }
}

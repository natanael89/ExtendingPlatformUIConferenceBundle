<?php

namespace EzSystems\ExtendingPlatformUIConferenceBundle\Twig;

use eZ\Publish\API\Repository\ContentTypeService;

class ListExtension extends \Twig_Extension
{
    private $contentTypeService;

    public function __construct(ContentTypeService $contentTypeService)
    {
        $this->contentTypeService = $contentTypeService;
    }

    public function getFunctions()
    {
        return [
            new \Twig_SimpleFunction('getContentTypeName', array($this, 'getContentTypeNameFunction'))
        ];
    }

    public function getContentTypeNameFunction($contentTypeId)
    {
        $contentType = $this->contentTypeService->loadContentType($contentTypeId);

        return $contentType->getName('eng-GB');
    }
}

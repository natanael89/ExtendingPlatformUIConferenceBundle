<?php

namespace EzSystems\ExtendingPlatformUIConferenceBundle\Form;

use eZ\Publish\API\Repository\ContentTypeService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;

class ContentListFilterType extends AbstractType
{
    private $contentTypeService;

    public function __construct(ContentTypeService $contentTypeService)
    {
        $this->contentTypeService = $contentTypeService;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typesList', ChoiceType::class, [
                'choices' => $this->getContentTypesAsChoices(),
                'required' => false,
                'placeholder' => 'None',
                'label' => 'Choose a Content Type to only display Content Items of this type'
            ]);
    }

    private function getContentTypesAsChoices()
    {
        $contentTypeGroups = $this->contentTypeService->loadContentTypeGroups();

        $typesByGroup = [];
        foreach ($contentTypeGroups as $group) {
            $contentTypes = $this->contentTypeService->loadContentTypes($group);
            foreach ($contentTypes as $contentType) {
                $typesByGroup[$group->identifier][$contentType->identifier] = $contentType->getName('eng-GB');
            }
        }

        return $typesByGroup;
    }
}

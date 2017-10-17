<?php

namespace AdamWojs\CustomPolicyExampleBundle\Security\CustomPolicy\Limitation\Mapper;

use eZ\Publish\API\Repository\Values\User\Limitation;
use EzSystems\RepositoryForms\Limitation\LimitationFormMapperInterface;
use EzSystems\RepositoryForms\Limitation\LimitationValueMapperInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormInterface;

class CustomLimitationMapper implements LimitationFormMapperInterface, LimitationValueMapperInterface
{
    /**
     * Form template to use.
     *
     * @var string
     */
    private $template;

    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     * @inheritdoc
     */
    public function mapLimitationForm(FormInterface $form, Limitation $data)
    {
        $builder = $form->getConfig()->getFormFactory()->createBuilder();

        $transformer = new class implements DataTransformerInterface
        {
            public function transform($value)
            {
                return (bool) $value;
            }

            public function reverseTransform($value)
            {
                if ($value !== null) {
                    return [ $value ];
                }

                return null;
            }
        };

        $form->add(
            $builder->create('limitationValues', CheckboxType::class, [
                'required' => false,
                'label' => $data->getIdentifier()
            ])
            ->addModelTransformer($transformer)
            ->setAutoInitialize(false)
            ->getForm()
        );
    }

    /**
     * @inheritdoc
     */
    public function getFormTemplate()
    {
        return $this->template;
    }

    /**
     * @inheritdoc
     */
    public function filterLimitationValues(Limitation $limitation)
    {
    }

    /**
     * @inheritdoc
     */
    public function mapLimitationValue(Limitation $limitation)
    {
        if (!empty($limitation->limitationValues)) {
            return $limitation->limitationValues[0] ? 'YES' : 'NO';
        }

        return 'NO';
    }
}

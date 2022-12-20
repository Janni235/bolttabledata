<?php

declare(strict_types=1);

namespace Janni235\BoltTableData;

use Bolt\Extension\BaseExtension;
use Bolt\Entity\Field;
use Bolt\Entity\FieldInterface;
use Bolt\Translation\Translator as Trans;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Extension extends BaseExtension
{
    public function getName(): string
    {
        return 'BoltTableData';
    }

    public function getVersion(): string
    {
        return '1.0';
    }

    public function getDependencies(): array
    {
        return [
            FieldTypeBase::class,
        ];
    }

    public function registerFields(): iterable
    {
        return [
            new TableDataType(),
        ];
    }
}

class TableDataType extends Field
{
    public function getName(): string
    {
        return 'tabledata';
    }

    public function getTemplate(): string
    {
        return 'tabledata.twig';
    }

    public function getStorageType(): string
    {
        return 'text';
    }

    public function getStorageOptions(): array
    {
        return [
            'default' => null,
            'notnull' => false
        ];
    }

    public function getStorageColumnType(): string
    {
        return 'text';
    }

    public function getFormType(): string
    {
        return 'collection';
    }

    public function getFormOptions(): array
    {
        return [
            'label' => 'Table data',
            'default' => null,
            'required' => false,
            'entry_type' => TableRowType::class,
            'allow_add' => true,
            'allow_delete' => true,
            'prototype' => true,
            'prototype_name' => '__name__',
            'by_reference' => false,
        ];
    }

    public function getValidationOptions(): array
    {
        return [
            'required' => false,
            'minlength' => null,
            'maxlength' => null,
            'pattern' => null,
        ];
    }

    public function getDefaultValue(): array
    {
        return null;
    }

    public function getTemplateOptions(): array
    {
        return [
            'tabledata' => [
                'form' => 'tabledata.twig',
                'display' => 'tabledata.twig',
            ]
        ];
    }

    public function getConfiguration(): array
    {
        return [
            'type' => $this->getName(),
            'form' => [
                'type' => $this->getFormType(),
                'options' => $this->getFormOptions()
            ],
            'template' => [
                'name' => $this->getTemplate(),
                'options' => $this->getTemplateOptions()
            ],
            'storage' => [
                'type' => $this->getStorageType(),
                'options' => $this->getStorageOptions()
            ],
            'validation' => [
                'options' => $this->getValidationOptions()
            ]
        ];
    }
}

class TableRowType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('row', TextType::class, [
                'label' => 'Row header',
            ])
            ->add('column1', TextType::class, [
                'label' => 'Column 1',
            ])
            ->add('column2', TextType::class, [
                'label' => 'Column 2',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => null,
        ]);
    }
}

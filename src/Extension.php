<?php

declare(strict_types=1);

namespace Bolt\Extension\Janni235\BoltTableData;

use Bolt\Extension\BaseExtension;
use Bolt\Entity\Field;
use Bolt\Entity\Field\FieldInterface;
use Bolt\Entity\Field\Type\FieldTypeBase;
use Bolt\Entity\Field\Option\Option;
use Bolt\Translation\Translator as Trans;

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

class TableDataType extends FieldTypeBase implements FieldInterface
{
    public function getName()
    {
        return 'tabledata';
    }

    public function getTemplate()
    {
        return 'tabledata.twig';
    }

    public function getStorageType()
    {
        return 'text';
    }

    public function getStorageOptions()
    {
        return [
            'default' => null,
            'notnull' => false
        ];
    }

    public function getStorageColumnType()
    {
        return 'text';
    }

    public function getFormType()
    {
        return 'tabledata';
    }

    public function getFormOptions()
    {
        return [
            'label' => 'Table data',
            'default' => null,
            'required' => false,
            'choices' => [
                'row' => 'Row',
                'column' => 'Column'
            ],
        ];
    }

    public function getValidationOptions()
    {
        return [
            'required' => false,
            'minlength' => null,
            'maxlength' => null,
            'pattern' => null,
        ];
    }

    public function getDefaultValue()
    {
        return null;
    }

    public function getTemplateOptions()
    {
        return [
            'tabledata' => [
                'form' => 'tabledata.twig',
                'display' => 'tabledata.twig',
            ]
        ];
    }

    public function getConfiguration()
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

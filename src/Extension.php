<?php

declare(strict_types=1);

namespace Bolt\Extension\Janni235\BoltTableData;

use Bolt\BaseExtension;
use Bolt\Field\FieldInterface;
use Bolt\Field\FieldTypeBase;
use Bolt\Field\FieldOption as Option;
use Bolt\Translation\Translator as Trans;

class Extension extends SimpleExtension
{
    public function getName()
    {
        return 'BoltTableData';
    }

    public function getVersion()
    {
        return '1.0';
    }

    public function getDependencies()
    {
        return [
            FieldTypeBase::class,
        ];
    }

    public function registerFields()
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

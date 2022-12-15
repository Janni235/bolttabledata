<?php

declare(strict_types=1);

namespace Bolt\Extension\Janni235\BoltTableData;

use Bolt\Extension\BaseExtension;
use Bolt\Entity\Field;
use Bolt\Entity\FieldInterface;
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
        return 'tabledata';
    }

    public function getFormOptions(): array
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

<?php

namespace Bolt\Extension\Janni235\BoltTableData;

use Bolt\Extension\SimpleExtension;
use Bolt\Field\FieldInterface;
use Bolt\Field\FieldTypeBase;

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

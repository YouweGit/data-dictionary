<?php

namespace DataDictionaryBundle\Graph\Visitor\Nullables;

class BrickDefinition extends \Pimcore\Model\DataObject\Objectbrick\Definition
{
    public function getFieldDefinitions($context = [])
    {
        return [];
    }
}

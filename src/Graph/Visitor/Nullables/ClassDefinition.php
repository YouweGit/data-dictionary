<?php

namespace DataDictionaryBundle\Graph\Visitor\Nullables;

class ClassDefinition extends \Pimcore\Model\DataObject\ClassDefinition
{
    public function getFieldDefinitions($context = [])
    {
        return [];
    }
}

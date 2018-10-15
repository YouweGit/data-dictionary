<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-11
 * Time: 17:03
 */

namespace DataDictionaryBundle\Graph\Visitor\Nullables;

class ClassDefinition extends \Pimcore\Model\DataObject\ClassDefinition
{
    public function getFieldDefinitions($context = [])
    {
        return [];
    }
}

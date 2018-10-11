<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-11
 * Time: 17:03
 */

namespace Youwe\DataDictionaryBundle\Graph\Visitor\Nullables;


class BrickDefinition extends \Pimcore\Model\DataObject\Objectbrick\Definition
{
    public function getFieldDefinitions($context = [])
    {
        return [];
    }


}
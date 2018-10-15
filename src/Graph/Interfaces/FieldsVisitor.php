<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 14:33
 */

namespace DataDictionaryBundle\Graph\Interfaces;

use Pimcore\Model\DataObject\ClassDefinition\Data;
use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use DataDictionaryBundle\Graph\Entity\Node;

interface FieldsVisitor
{
    public static function makeAttribute(Node $node, Data $field): NodeInterface;
}

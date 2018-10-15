<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 14:15
 */

namespace DataDictionaryBundle\Graph\Visitor\Fields;

use DataDictionaryBundle\Graph\Interfaces\FieldsVisitor;
use DataDictionaryBundle\Graph\Entity\Node;
use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use \Pimcore\Model\DataObject\ClassDefinition\Data as Data;

class LocalizedFields implements FieldsVisitor
{
    public static function makeAttribute(Node $node, Data $field): NodeInterface
    {
        if ($field instanceof Data\Localizedfields) {
            foreach ($field->getChildren() as $localizedFields) {
                DefaultField::makeAttribute($node, $localizedFields);
            }
        }
        return $node;
    }
}

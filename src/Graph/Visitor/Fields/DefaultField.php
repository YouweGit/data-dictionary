<?php

namespace DataDictionaryBundle\Graph\Visitor\Fields;

use DataDictionaryBundle\Graph\Entity\Attribute;
use DataDictionaryBundle\Graph\Interfaces\FieldsVisitor;
use DataDictionaryBundle\Graph\Entity\Node;
use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use \Pimcore\Model\DataObject\ClassDefinition\Data;

class DefaultField implements FieldsVisitor
{
    public static function makeAttribute(Node $node, Data $field): NodeInterface
    {
        $node->addAttribute(new Attribute(
            $field->getName(),
            $field->getMandatory(),
            $field->getUnique()
        ));
        return $node;
    }
}

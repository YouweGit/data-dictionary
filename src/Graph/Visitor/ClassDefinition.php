<?php

namespace DataDictionaryBundle\Graph\Visitor;

use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use \Pimcore\Model\DataObject\ClassDefinition as PimcoreClassDefinition;
use DataDictionaryBundle\Graph\Entity\Node;

class ClassDefinition
{
    /**
     * Will visit the
     * @param \Pimcore\Model\DataObject\ClassDefinition class definition
     * @return NodeInterface Return a node instance from a Class Definition
     */
    public static function getNode(PimcoreClassDefinition $class): NodeInterface
    {
        $result = new Node(
            $class->getName()
        );
        $result->setClassDefinition($class);
        return $result;
    }
}

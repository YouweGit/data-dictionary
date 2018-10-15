<?php

namespace DataDictionaryBundle\Graph\Visitor\Relations;

use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use DataDictionaryBundle\Graph\Entity\Node;
use DataDictionaryBundle\Graph\Entity\Vertex;

class Brick
{
    /**
     * @param Node $node
     * @return NodeInterface
     */
    public static function createRelation(Node $node): NodeInterface
    {
        foreach ($node->getObjectBrickDefinition()->getClassDefinitions() as $classDefinition) {
            $node->addVertex(
                new Vertex(
                    $classDefinition["fieldname"],
                    $classDefinition["fieldname"],
                    $classDefinition["classname"],
                    true
                )
            );
        }
        return $node;
    }
}

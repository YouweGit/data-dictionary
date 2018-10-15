<?php

namespace DataDictionaryBundle\Graph\Visitor\Relations;

use Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations;
use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use DataDictionaryBundle\Graph\Entity\Node;
use DataDictionaryBundle\Graph\Entity\Vertex;

class Relations
{
    /**
     * @param Node $node
     * @param AbstractRelations $relation
     * @return NodeInterface
     */
    public static function createRelation(Node $node, AbstractRelations $relation): NodeInterface
    {
        foreach ($relation->getClasses() as $classes) {
            $node->addVertex(
                new Vertex(
                    $relation->getName(),
                    $relation->getTitle(),
                    $classes["classes"]
                )
            );
        }

        return $node;
    }
}

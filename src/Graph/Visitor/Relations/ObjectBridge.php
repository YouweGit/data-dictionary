<?php

namespace DataDictionaryBundle\Graph\Visitor\Relations;

use \ObjectBridgeBundle\Model\DataObject\ClassDefinition\Data\ObjectBridge as ObjectBridgeData;
use Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations;
use DataDictionaryBundle\Graph\Entity\Vertex;
use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;

class ObjectBridge
{
    /**
     * @param NodeInterface $node
     * @param AbstractRelations $relation
     * @return NodeInterface
     */
    public static function createRelation(NodeInterface $node, AbstractRelations $relation): NodeInterface
    {
        if ($relation instanceof ObjectBridgeData) {
            $node->addVertex(
                new Vertex(
                    $relation->getName(),
                    $relation->getTitle(),
                    $relation->getBridgeAllowedClassName()
                )
            );
        }
        return $node;
    }
}

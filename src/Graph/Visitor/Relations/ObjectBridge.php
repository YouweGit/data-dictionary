<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 16:46
 */

namespace Youwe\DataDictionaryBundle\Graph\Visitor\Relations;

use \ObjectBridgeBundle\Model\DataObject\ClassDefinition\Data\ObjectBridge as ObjectBridgeData;
use Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations;
use Youwe\DataDictionaryBundle\Graph\Vertex;
use Youwe\DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;

class ObjectBridge
{
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

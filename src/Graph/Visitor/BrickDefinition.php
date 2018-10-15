<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 10:42
 */

namespace DataDictionaryBundle\Graph\Visitor;

use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use \Pimcore\Model\DataObject\Objectbrick\Definition as Definition;
use DataDictionaryBundle\Graph\Entity\Node;
use DataDictionaryBundle\Graph\Visitor\Relations\Brick;

class BrickDefinition
{
    /**
     * Will visit the
     * @param Definition $definition
     * @return NodeInterface Return a node instance from a Class Definition
     */
    public static function getNode(Definition $definition): NodeInterface
    {
        $result = new Node(
            $definition->getKey()
        );
        $result->setSteorotype("Object Brick");
        $result->setObjectBrickDefinition($definition);

        return $result;
    }


    public static function makeRelationships(NodeInterface $node): NodeInterface
    {
        Brick::createRelation($node);
        return $node;
    }
}

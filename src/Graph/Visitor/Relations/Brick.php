<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 16:29
 */

namespace DataDictionaryBundle\Graph\Visitor\Relations;

use DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use DataDictionaryBundle\Graph\Entity\Node;
use DataDictionaryBundle\Graph\Entity\Vertex;
use Pimcore\Model\DataObject\Objectbrick\Definition as BrickDefinition;

class Brick
{
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

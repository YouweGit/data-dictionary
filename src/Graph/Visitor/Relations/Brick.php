<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 16:29
 */

namespace Youwe\DataDictionaryBundle\Graph\Visitor\Relations;

use Youwe\DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use Youwe\DataDictionaryBundle\Graph\Entity\Node;
use Youwe\DataDictionaryBundle\Graph\Entity\Vertex;
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

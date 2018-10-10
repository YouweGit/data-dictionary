<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 16:29
 */

namespace Youwe\DataDictionaryBundle\Graph\Visitor\Relations;

use Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations;
use Youwe\DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use Youwe\DataDictionaryBundle\Graph\Entity\Node;
use Youwe\DataDictionaryBundle\Graph\Entity\Vertex;

class Relations
{
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

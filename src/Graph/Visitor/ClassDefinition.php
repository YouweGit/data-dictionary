<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 10:42
 */

namespace Youwe\DataDictionaryBundle\Graph\Visitor;

use Youwe\DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use \Pimcore\Model\DataObject\ClassDefinition as PimcoreClassDefinition;
use Youwe\DataDictionaryBundle\Graph\Entity\Node;

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

<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-24
 * Time: 12:55
 */

namespace DataDictionaryBundle\Graph\Visitor;

use DataDictionaryBundle\Graph\Entity\Vertex;
use DataDictionaryBundle\Graph\Interfaces\Node;
use Pimcore\Model\DataObject\Objectbrick\Definition;

class Objectbricks extends AbstractVisitor
{
    /**
     * @var Definition $objectBrickDefinition
     */
    protected $objectBrickDefinition;

    /**
     * @return Definition
     */
    public function getObjectBrickDefinition()
    {
        return $this->objectBrickDefinition;
    }

    /**
     * @param Definition $objectBrickDefinition
     */
    public function setObjectBrickDefinition(Definition $objectBrickDefinition): void
    {
        $this->objectBrickDefinition = $objectBrickDefinition;
    }

    public function visit()
    {
        $node = $this->getNode();
        $node->setStereotype("Object Brick");
        $this->classDefinition = new \Pimcore\Model\DataObject\ClassDefinition();
        $this->classDefinition->setName($this->objectBrickDefinition->getKey());
        $this->addAttributes($node);
        $this->addVertex($node);
    }
    private function addVertex(Node $node)
    {
        foreach ($this->objectBrickDefinition->getClassDefinitions() as $classDefinition) {
            $node->addVertex(
                new Vertex(
                    $classDefinition["fieldname"],
                    $classDefinition["fieldname"],
                    $classDefinition["classname"],
                    true
                )
            );
        }
    }
    private function addAttributes(Node $node)
    {
        foreach ($this->objectBrickDefinition->getFieldDefinitions() as $field) {
            $this->graph->processField($this->classDefinition, $field);
        }
    }
    private function getNode() : Node
    {
        return $this->getGraph()->getNode(
            $this->objectBrickDefinition->getKey()
        );
    }
}

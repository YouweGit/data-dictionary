<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-23
 * Time: 16:36
 */

namespace DataDictionaryBundle\Graph\Visitor;

use DataDictionaryBundle\Graph\Entity\Attribute;
use DataDictionaryBundle\Graph\Entity\Vertex;
use DataDictionaryBundle\Graph\Interfaces\Node;

class DefaultClass extends AbstractVisitor
{

    public function visit()
    {
        $node = $this->getNode();
        $this->addAttributes($node);
        $this->addVertex($node);
    }
    private function addVertex(Node $node) {
        if ($this->fieldDefinition->isRelationType()) {
            foreach ($this->fieldDefinition->getClasses() as $classes) {
                $node->addVertex(
                    new Vertex(
                        $this->fieldDefinition->getName(),
                        $this->fieldDefinition->getTitle(),
                        $classes["classes"]
                    )
                );
            }
        }
    }
    private function addAttributes(Node $node) {
        if (!$this->fieldDefinition->isRelationType()) {
            $node->addAttribute(new Attribute(
                $this->fieldDefinition->getName(),
                $this->fieldDefinition->getMandatory(),
                $this->fieldDefinition->getUnique()
            ));
        }
    }
    private function getNode() : Node {
        return $this->getGraph()->getNode(
            $this->classDefinition->getName()
        );
    }
}

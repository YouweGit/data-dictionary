<?php

namespace DataDictionaryBundle\Graph;

use DataDictionaryBundle\Graph\Interfaces\FieldsVisitor;
use DataDictionaryBundle\Graph\Interfaces\GenericVisitor;
use DataDictionaryBundle\Graph\Visitor\Factory\DefaultClass;
use DataDictionaryBundle\Graph\Visitor\Objectbricks;
use Pimcore\Model\DataObject\ClassDefinition;
use DataDictionaryBundle\Graph\Entity\Node;
use DataDictionaryBundle\Graph\Visitor\BrickDefinition;
use DataDictionaryBundle\Graph\Visitor\FieldDefinition;

class Graph implements Interfaces\Graph
{
    /**
     * Array of Nodes
     * @var Node[] $nodes
     */
    protected $nodes = [];

    protected $visitors = [];

    /**
     * @return Node[]
     */
    public function getNodes(): array
    {
        return $this->nodes;
    }

    /**
     * @param Node[] $nodes
     * @return Graph
     */
    public function setNodes(array $nodes): Graph
    {
        $this->nodes = $nodes;
        return $this;
    }

    /**
     * @return mixed array of the classes name
     * @throws \Doctrine\DBAL\DBALException
     */
    private function getClasses()
    {
        $classDefinition = new ClassDefinition();
        $db = $classDefinition->getDao()->db;
        return $db->fetchPairs('select * from classes order by 1 asc');
    }

    /**
     * @return \Pimcore\Model\DataObject\Objectbrick\Definition[]
     */
    public function getObjectBricksList()
    {
        $list = new \Pimcore\Model\DataObject\Objectbrick\Definition\Listing();
        return $list->load();
    }

    public function setVisitors(iterable $classes)
    {
        $this->visitors = [];
        foreach($classes as $class) {
            if (in_array(\DataDictionaryBundle\Interfaces\DataDictionary::class, class_implements($class['fullName']))) {
                $this->visitors[] = $class['fullName'];
            }
        }
        $this->visitors[] = new DefaultClass();
    }

    public function getNode(string $name): Interfaces\Node
    {
        if (array_key_exists($name, $this->nodes)) {
            return $this->nodes[$name];
        }
        return $this->addNode(
          new Node($name)
        );
    }

    public function addNode(Interfaces\Node $node)
    {
        $this->nodes[$node->getName()] = $node;
        return $node;
    }
    public function processField($class, $fieldDefinition) {
        foreach ($this->visitors as $visitor) {
            $visitorClass = null;
            /** @var Visitor \DataDictionaryBundle\Interfaces\DataDictionary */
            if ($fieldDefinition instanceof $visitor) {
                $visitorClass = $visitor::getVisitor(get_class($fieldDefinition));
            }
            if ($visitor instanceof GenericVisitor && $visitor->canVisit(get_class($fieldDefinition))) {
                $visitorClass = $visitor::getVisitor(get_class($fieldDefinition));
            }
            if ($visitorClass instanceof Interfaces\Visitor) {
                $visitorClass->setFieldDefinition($fieldDefinition);
                $visitorClass->setClassDefinition($class);
                $visitorClass->setGraph($this);
                $visitorClass->visit();
            }
        }
    }
    public function getClassesDefinitions()
    {
        $definitions = [];
        foreach($this->getClasses() as $class) {
            $definitions[] = ClassDefinition::getByName($class);
        }
        return $definitions;
    }
    public function processClasses()
    {
        foreach($this->getClassesDefinitions() as $class) {
            foreach($class->getFieldDefinitions() as $fieldDefinition) {
                $this->processField($class, $fieldDefinition);
            }
        }
    }
    public function processObjectBricks()
    {
        foreach($this->getObjectBricksList() as $brick) {
            $visitor = new Objectbricks();
            $visitor->setGraph($this);
            $visitor->setObjectBrickDefinition($brick);
            $visitor->visit();

        }
    }
    public function makeGraph()
    {
        $this->processClasses();
        $this->processObjectBricks();
    }
}

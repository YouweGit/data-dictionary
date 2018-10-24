<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-24
 * Time: 12:56
 */

namespace DataDictionaryBundle\Graph\Visitor;


use DataDictionaryBundle\Graph\Interfaces\Graph;
use DataDictionaryBundle\Graph\Interfaces\Visitor;

abstract class AbstractVisitor implements Visitor
{
    /**
     * @var Graph $graph
     */
    protected $graph;
    /** @var \Pimcore\Model\DataObject\ClassDefinition\Data $definition */
    protected $fieldDefinition;
    /**
     * @var \Pimcore\Model\DataObject\ClassDefinition $classDefinition
     */
    protected $classDefinition;

    public function setFieldDefinition($object)
    {
        $this->fieldDefinition = $object;
    }

    public function setClassDefinition(\Pimcore\Model\DataObject\ClassDefinition $object)
    {
        $this->classDefinition = $object;
    }


    public function setGraph(Graph $graph)
    {
        $this->graph = $graph;
    }

    public function getGraph(): Graph
    {
        return $this->graph;
    }

}

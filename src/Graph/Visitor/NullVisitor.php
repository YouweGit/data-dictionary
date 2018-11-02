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

class NullVisitor implements Visitor
{
   private $graph;

    public function setFieldDefinition($object)
    {
        return;
    }

    public function setClassDefinition(\Pimcore\Model\DataObject\ClassDefinition $object)
    {
        return;
    }

    public function setGraph(Graph $graph)
    {
        $this->graph = $graph;
    }

    public function getGraph(): Graph
    {
        return $this->graph;
    }

    public function visit()
    {
        return;
    }

}

<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-23
 * Time: 15:49
 */

namespace DataDictionaryBundle\Graph\Interfaces;

interface Visitor
{
    public function setFieldDefinition($object);

    public function setClassDefinition(\Pimcore\Model\DataObject\ClassDefinition $object);

    public function setGraph(Graph $graph);

    public function getGraph():Graph;

    public function visit();
}

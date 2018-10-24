<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-23
 * Time: 16:05
 */

namespace DataDictionaryBundle\Graph\Interfaces;

interface Graph
{
    public function getNodes(): array;

    public function getNode(string $name): Node;

    public function addNode(Node $node);
}

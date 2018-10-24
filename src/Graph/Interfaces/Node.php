<?php

namespace DataDictionaryBundle\Graph\Interfaces;

interface Node
{
    /**
     * @return mixed the name of the node is like the primary key for it
     */
    public function getName();

    /**
     * @return array
     */
    public function getAttributes(): array;

    /**
     * @return array
     */
    public function getVertex(): array;

    public function addAttribute(Attribute $attribute);

    public function addVertex(Vertex $vertex);
}

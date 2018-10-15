<?php

namespace DataDictionaryBundle\Graph\Interfaces;

use Pimcore\Model\DataObject\Objectbrick\Definition as BrickDefinition;
use Pimcore\Model\DataObject\ClassDefinition;

interface Node
{
    /**
     * @return mixed
     */
    public function getName();

    /**
     * @return array
     */
    public function getAttributes(): array;

    /**
     * @return BrickDefinition
     */
    public function getObjectBrickDefinition(): BrickDefinition;

    /**
     * @return ClassDefinition
     */
    public function getClassDefinition(): ClassDefinition;

    /**
     * @return string
     */
    public function getStereotype(): string;
}

<?php

namespace DataDictionaryBundle\Graph\Interfaces;

interface Vertex
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getLabel(): string;

    /**
     * @return string
     */
    public function getDestiny(): string;

    /**
     * @return bool
     */
    public function isBack(): bool;
}

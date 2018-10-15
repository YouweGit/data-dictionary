<?php

namespace DataDictionaryBundle\Graph\Interfaces;

interface Attribute
{
    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return bool
     */
    public function isMandatory(): bool;

    /**
     * @return bool
     */
    public function isUnique(): bool;
}

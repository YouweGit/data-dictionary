<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 10:19
 */

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

<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 10:24
 */

namespace DataDictionaryBundle\Graph\Interfaces;

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
}

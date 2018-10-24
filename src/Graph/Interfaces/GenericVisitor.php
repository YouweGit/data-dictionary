<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-24
 * Time: 09:40
 */

namespace DataDictionaryBundle\Graph\Interfaces;

interface GenericVisitor
{

    public function canVisit(string $className):bool;
}

<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-23
 * Time: 15:48
 */

namespace DataDictionaryBundle\Interfaces;

use DataDictionaryBundle\Graph\Interfaces\Visitor;

interface DataDictionary
{
    public static function getVisitor(string $className = null):Visitor;

    public static function canVisit(string $className):bool;
}

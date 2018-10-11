<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 10:24
 */

namespace Youwe\DataDictionaryBundle\Graph\Interfaces;

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

    public function getObjectBrickDefinition(): BrickDefinition;

    public function getClassDefinition(): ClassDefinition;
    public function getSteorotype(): string;
}

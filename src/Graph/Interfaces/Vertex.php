<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 16:00
 */

namespace DataDictionaryBundle\Graph\Interfaces;

use DataDictionaryBundle\Graph\Entity\Node;

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
}

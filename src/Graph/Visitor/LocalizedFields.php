<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-24
 * Time: 12:55
 */

namespace DataDictionaryBundle\Graph\Visitor;

use DataDictionaryBundle\Graph\Entity\Attribute;
use DataDictionaryBundle\Graph\Entity\Vertex;
use DataDictionaryBundle\Graph\Interfaces\Node;

class LocalizedFields extends AbstractVisitor
{

    public function visit()
    {
        foreach ($this->fieldDefinition->getChildren() as $child) {
            $this->graph->processField($this->classDefinition, $child);
        }
    }
}

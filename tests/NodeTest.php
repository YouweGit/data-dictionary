<?php

namespace DataDictionaryBundle\Graph\Test;

use PHPUnit\Framework\TestCase;
use DataDictionaryBundle\Graph\Entity\Attribute;
use DataDictionaryBundle\Graph\Entity\Node;

class NodeTest extends TestCase
{
    public function testCreation()
    {
        $node = new Node("Test");
        $this->assertInstanceOf(\DataDictionaryBundle\Graph\Interfaces\Node::class, $node);
        $this->assertEquals("Test", $node->getName());
        $this->assertEquals([], $node->getAttributes());
        $node->setName("Test2");
        $this->assertEquals("Test2", $node->getName());
        $attr = new Attribute("attr");
        $node->addAttribute($attr);
        $this->assertEquals([$attr], $node->getAttributes());
        $node->setAttributes([$attr, $attr]);
        $this->assertEquals([$attr, $attr], $node->getAttributes());
    }
}

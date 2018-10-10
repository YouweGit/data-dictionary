<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 11:22
 */

namespace Youwe\DataDictionaryBundle\Graph\Test;

use Youwe\DataDictionaryBundle\Graph\Entity\Attribute;
use PHPUnit\Framework\TestCase;

class AttributeTest extends TestCase
{
    public function testCreation()
    {
        $att = new Attribute("field1", 1, 1);
        $this->assertInstanceOf(\Youwe\DataDictionaryBundle\Graph\Interfaces\Attribute::class, $att);
        $this->assertEquals("field1", $att->getName());
        $this->assertTrue($att->isMandatory());
        $this->assertTrue($att->isUnique());
        $att->setName("field2")
            ->setMandatory(false)
            ->setUnique(false);
        $this->assertEquals("field2", $att->getName());
        $this->assertFalse($att->isMandatory());
        $this->assertFalse($att->isUnique());
    }
}

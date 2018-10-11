<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 10:20
 */

namespace Youwe\DataDictionaryBundle\Graph\Entity;

use Pimcore\Model\DataObject\ClassDefinition;
use Youwe\DataDictionaryBundle\Graph\Interfaces;
use Pimcore\Model\DataObject\Objectbrick\Definition as BrickDefinition;

class Node implements Interfaces\Node
{
    /**
     * @var string $name
     */
    private $name;
    /**
     * @var array $attributes
     */
    private $attributes;

    /**
     * @var array $vertex
     */
    private $vertex = [];
    /**
     * @var ClassDefinition
     */
    private $classDefinition = null;
    /**
     * @var BrickDefinition
     */
    private $objectBrickDefinition = null;

    /**
     * @var string stereotype
     */
    private $steorotype = '';

    /**
     * @return string
     */
    public function getSteorotype(): string
    {
        return $this->steorotype;
    }

    /**
     * @param string $steorotype
     * @return Node
     */
    public function setSteorotype(string $steorotype): Node
    {
        $this->steorotype = $steorotype;
        return $this;
    }

    /**
     * @return BrickDefinition
     */
    public function getObjectBrickDefinition(): BrickDefinition
    {
        return $this->objectBrickDefinition;
    }

    /**
     * @param BrickDefinition $objectBrickDefinition
     * @return Node
     */
    public function setObjectBrickDefinition(BrickDefinition $objectBrickDefinition): Node
    {
        $this->objectBrickDefinition = $objectBrickDefinition;
        return $this;
    }

    /**
     * @return ClassDefinition
     */
    public function getClassDefinition(): ClassDefinition
    {
        return $this->classDefinition;
    }

    /**
     * @param ClassDefinition $classDefinition
     * @return Node
     */
    public function setClassDefinition(ClassDefinition $classDefinition): Node
    {
        $this->classDefinition = $classDefinition;
        return $this;
    }

    /**
     * Node constructor.
     * @param $name
     * @param $attributes
     */
    public function __construct($name, array $attributes = [])
    {
        $this->name = $name;
        $this->setAttributes($attributes);
        $this->setClassDefinition(new \Youwe\DataDictionaryBundle\Graph\Visitor\Nullables\ClassDefinition());
        $this->setObjectBrickDefinition(new \Youwe\DataDictionaryBundle\Graph\Visitor\Nullables\BrickDefinition());
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return Node
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }

    /**
     * @param array $attributes
     * @return Node
     */
    public function setAttributes(array $attributes): Node
    {
        $this->attributes = [];
        foreach ($attributes as $attribute) {
            $this->addAttribute($attribute);
        }
        return $this;
    }

    /**
     * Adds one attribute to the node
     * @param Interfaces\Attribute $attribute
     * @return $this
     */
    public function addAttribute(Interfaces\Attribute $attribute)
    {
        $this->attributes[] = $attribute;
        return $this;
    }
    /**
     * @return array
     */
    public function getVertex(): array
    {
        return $this->vertex;
    }

    /**
     * @param array $vertex
     * @return Node
     */
    public function setVertex(array $vertex): Node
    {
        $this->vertex = [];
        foreach ($vertex as $v) {
            $this->addVertex($v);
        }
        return $this;
    }

    /**
     * Adds one vertex to the node
     * @param Interfaces\Vertex $vertex
     * @return $this
     */
    public function addVertex(Interfaces\Vertex $vertex)
    {
        $this->vertex[] = $vertex;
        return $this;
    }
}

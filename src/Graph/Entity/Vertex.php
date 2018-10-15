<?php

namespace DataDictionaryBundle\Graph\Entity;

class Vertex implements \DataDictionaryBundle\Graph\Interfaces\Vertex
{
    /**
     * @var string name
     */
    private $name;
    /**
     * @var string label
     */
    private $label;

    /**
     * @var string destiny
     */
    private $destiny;

    /**
     * @var bool if the arrow should be annotated in the other end
     */
    private $back = false;

    /**
     * @return bool
     */
    public function isBack(): bool
    {
        return $this->back;
    }

    /**
     * @param bool $back
     * @return Vertex
     */
    public function setBack(bool $back): Vertex
    {
        $this->back = $back;
        return $this;
    }

    /**
     * Vertex constructor.
     * @param string $name
     * @param string $label
     * @param string $destiny
     */
    public function __construct(string $name, string $label, string $destiny, bool $back = false)
    {
        $this->name = $name;
        $this->label = $label;
        $this->destiny = $destiny;
        $this->back = $back;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Vertex
     */
    public function setName(string $name): Vertex
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     * @return Vertex
     */
    public function setLabel(string $label): Vertex
    {
        $this->label = $label;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestiny(): string
    {
        return $this->destiny;
    }

    /**
     * @param string $destiny
     * @return Vertex
     */
    public function setDestiny(string $destiny): Vertex
    {
        $this->destiny = $destiny;
        return $this;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 10:15
 */

namespace DataDictionaryBundle\Graph\Entity;

use DataDictionaryBundle\Graph\Interfaces;

class Attribute implements Interfaces\Attribute
{
    /**
     * @var string name
     */
    private $name;
    /**
     * @var bool mandatory
     */
    private $mandatory;
    /**
     * @var bool unique
     */
    private $unique;

    /**
     * Attribute constructor.
     * @param string $name
     * @param bool $mandatory
     * @param bool $unique
     */
    public function __construct(string $name, bool $mandatory = false, bool $unique = false)
    {
        $this->name = $name;
        $this->mandatory = $mandatory;
        $this->unique = $unique;
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
     * @return Attribute
     */
    public function setName(string $name): Attribute
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return bool
     */
    public function isMandatory(): bool
    {
        return $this->mandatory;
    }

    /**
     * @param bool $mandatory
     * @return Attribute
     */
    public function setMandatory(bool $mandatory): Attribute
    {
        $this->mandatory = $mandatory;
        return $this;
    }

    /**
     * @return bool
     */
    public function isUnique(): bool
    {
        return $this->unique;
    }

    /**
     * @param bool $unique
     * @return Attribute
     */
    public function setUnique(bool $unique): Attribute
    {
        $this->unique = $unique;
        return $this;
    }
}

<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-09
 * Time: 10:42
 */

namespace Youwe\DataDictionaryBundle\Graph\Visitor;

use ObjectBridgeBundle\Model\DataObject\ClassDefinition\Data\ObjectBridge as ObjectBridgeData;
use Youwe\DataDictionaryBundle\Graph\Interfaces\Node as NodeInterface;
use Youwe\DataDictionaryBundle\Graph\Entity\Node;
use Youwe\DataDictionaryBundle\Graph\Visitor\Relations\ObjectBridge;
use Youwe\DataDictionaryBundle\Graph\Visitor\Relations\Relations;

class FieldDefinition
{
    /**
     * Will visit the field definitions and create the attributes
     * @param Node $node
     * @return NodeInterface
     * @throws \Exception
     */
    public static function makeAttributes(Node $node): NodeInterface
    {
        foreach (self::getFieldDefinitions($node) as $fieldName => $field) {
            if ($field->isRelationType()) {
                continue;
            }
            switch (get_class($field)) {
                case false:
                    throw new \Exception("The attribute $fieldName is not a class");
                    break;
                case \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::class:
                    Fields\LocalizedFields::makeAttribute($node, $field);
                    break;
                default:
                    Fields\DefaultField::makeAttribute($node, $field);
                    break;
            }
        }
        return $node;
    }
    private static function getFieldDefinitions(NodeInterface $node)
    {
        return array_merge(
            $node->getClassDefinition()->getFieldDefinitions(),
            $node->getObjectBrickDefinition()->getFieldDefinitions()
        );
    }
    public static function makeRelationships(NodeInterface $node): NodeInterface
    {
        foreach (self::getFieldDefinitions($node) as $fieldName => $field) {
            if ($field->isRelationType()) {
                switch (get_class($field)) {
                    case false:
                        throw new \Exception("The attribute $fieldName is not a class");
                        break;
                    case ObjectBridgeData::class:
                        ObjectBridge::createRelation($node, $field);
                        break;
                    default:
                        Relations::createRelation($node, $field);
                        break;
                }
            }
        }
        return $node;
    }
}

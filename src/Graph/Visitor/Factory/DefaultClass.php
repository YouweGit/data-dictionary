<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-23
 * Time: 16:35
 */
namespace DataDictionaryBundle\Graph\Visitor\Factory;
use DataDictionaryBundle\Graph\Interfaces\GenericVisitor;
use DataDictionaryBundle\Graph\Interfaces\Visitor;
use DataDictionaryBundle\Interfaces\DataDictionary;

class DefaultClass implements DataDictionary, GenericVisitor
{
    private $map = [
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Block',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\CalculatedValue',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Checkbox',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Classificationstore',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Consent',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Country',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Countrymultiselect',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Date',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Datetime',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Email',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\EncryptedField',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ExternalImage',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Fieldcollections',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Firstname',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Gender',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Geobounds',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Geopoint',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Geopolygon',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Hotspotimage',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Href',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Image',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ImageGallery',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Input',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Language',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Languagemultiselect',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Lastname',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Link',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Localizedfields',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Multihref',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\MultihrefMetadata',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Multiselect',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\NewsletterActive',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Nonownerobjects',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Numeric',
        //'\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Objectbricks',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Objects',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\ObjectsMetadata',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Password',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\RgbaColor',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\TargetGroup',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\TargetGroupMultiselect',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Persona',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Personamultiselect',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\QuantityValue',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\InputQuantityValue',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Select',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Slider',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\StructuredTable',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Table',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Textarea',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Time',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\User',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Video',
        '\\Pimcore\\Model\\DataObject\\ClassDefinition\\Data\\Wysiwyg',
    ];
    public static function getVisitor(string $className = null): Visitor
    {
        switch ($className) {
            case \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::class:
                return new \DataDictionaryBundle\Graph\Visitor\LocalizedFields();
                break;
            default:
                return new \DataDictionaryBundle\Graph\Visitor\DefaultClass();
        }
    }

    public function canVisit(string $className):bool
    {

        return in_array($this->checkClassname($className), $this->map);
    }
    private static function checkClassname(string $className) {
        if ($className[0] != '\\') {
            return '\\'. $className;
        }
        return $className;
    }
}

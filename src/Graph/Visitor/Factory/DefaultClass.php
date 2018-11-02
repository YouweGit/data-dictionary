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

class DefaultClass implements DataDictionary
{
    private static function getMap()
    {
        return [
            \Pimcore\Model\DataObject\ClassDefinition\Data\Block::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\CalculatedValue::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Checkbox::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Classificationstore::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Consent::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Country::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Countrymultiselect::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Date::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Datetime::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Email::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\EncryptedField::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\ExternalImage::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Fieldcollections::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Firstname::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Gender::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Geobounds::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Geopoint::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Geopolygon::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Hotspotimage::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Href::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Image::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\ImageGallery::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Input::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Language::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Languagemultiselect::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Lastname::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Link::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Localizedfields::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Multihref::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\MultihrefMetadata::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Multiselect::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\NewsletterActive::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Nonownerobjects::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Numeric::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Objects::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\ObjectsMetadata::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Password::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\RgbaColor::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\TargetGroup::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\TargetGroupMultiselect::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Persona::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Personamultiselect::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\QuantityValue::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\InputQuantityValue::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Select::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Slider::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\StructuredTable::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Table::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Textarea::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Time::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\User::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Video::class,
            \Pimcore\Model\DataObject\ClassDefinition\Data\Wysiwyg::class,
        ];
    }
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

    public static function canVisit(string $className):bool
    {
        return in_array($className, self::getMap());
    }
}

Data Dictionary
======
Creates a diagram of the current datamodel inside Pimcore.

![Sceenshot](https://image.ibb.co/mRmAgL/Screenshot-2018-10-17-at-23-46-00.png)

## Install

Install the bundle with composer, go to the directory of the project and run the following command:

```
COMPOSER_MEMORY_LIMIT=3G composer require youwe/data-dictionary
```

And then enable the bundle:

```
./bin/console pimcore:bundle:install DataDictionaryBundle
```

And youre done!

## Custom Pimcore Data Types

If you created your own data type inside pimcore you have extended from this class:

```php
ClassDefinition\Data\ObjectsMetadata
```

#### First interface: Visitor

Nice, so the next step is to create a class that implements the interface:

```php
namespace DataDictionaryBundle\Graph\Interfaces;


interface Visitor
{
    public function setFieldDefinition($object);

    public function setClassDefinition(\Pimcore\Model\DataObject\ClassDefinition $object);

    public function setGraph(Graph $graph);

    public function getGraph():Graph;

    public function visit();
}

```

In this class you will be able to change the graph that you will receive through the **setGraph** method. Before calling the **visit** method, the data dictionary will provide the field definition (**setFieldDefinition**), the class definition (**setClassDefinition**) and the graph. 

We encourage you to implement those in separated class, and not in your main DataType class. 

You can also extend the class
```php
\DataDictionaryBundle\Graph\Visitor\AbstractVisitor
```
That implements all the methods from the interface except the method **visit**, you will have in this class the following properties:
```php
    protected $graph;
    protected $fieldDefinition;
    protected $classDefinition;
```

#### Second interface: DataDictionary

After you implement your visitor class, you will have to indicate how to load it, so you will have to implement an interface that will give us a method to recover your class.

```php
namespace DataDictionaryBundle\Interfaces;

use DataDictionaryBundle\Graph\Interfaces\Visitor;

interface DataDictionary
{
    public static function getVisitor(string $className = null):Visitor;
}
```

The method **getVisitor** receive as parameter the class name of the field definition that should be visited by the data dictionary.

## Results

You can get the data dictionary by going to the setting (gear icon) -> Show Current Data Dictionary. Then a new tab wil be opened with the data dictionary.

Or you can get the data dictionary directly going to the following URL: 
[http://<localhost>/admin/data-dictionary/](http://<localhost>/admin/data-dictionary)

Remember to change the *localhost* to your own pimcore host name.


## Todo
- [ ] Create a diagram with all the classes, attributes and relations;
    - [x] Classes;
    - [x] Attributes;
    - [x] Relations (basic);  
    - [ ] Create specific elements for specific cases:
        - [x] Localized fields;
        - [ ] Object Bridge (will add it again but in their package)
        - [x] Bricks
        - [ ] Block;
        - [ ] Field collection;
        - [ ] Tables;
        - [ ] Classificationstore
- [ ] Generate textual documentation;
    - [ ] Create links between the diagram and the documentation;


# API Documentation

## Table of Contents

* [Attribute](#attribute)
    * [__construct](#__construct)
    * [getName](#getname)
    * [setName](#setname)
    * [isMandatory](#ismandatory)
    * [setMandatory](#setmandatory)
    * [isUnique](#isunique)
    * [setUnique](#setunique)
* [ClassDefinition](#classdefinition)
    * [getNode](#getnode)
* [Configuration](#configuration)
    * [getConfigTreeBuilder](#getconfigtreebuilder)
* [DefaultController](#defaultcontroller)
    * [indexAction](#indexaction)
* [DefaultField](#defaultfield)
    * [makeAttribute](#makeattribute)
* [FieldDefinition](#fielddefinition)
    * [makeAttributes](#makeattributes)
    * [makeRelationships](#makerelationships)
* [Graph](#graph)
    * [getNodes](#getnodes)
    * [setNodes](#setnodes)
    * [__construct](#__construct-1)
    * [addAttributes](#addattributes)
    * [addRelations](#addrelations)
* [GraphViz](#graphviz)
    * [getGraphViz](#getgraphviz)
    * [setGraphViz](#setgraphviz)
    * [getGraph](#getgraph)
    * [setGraph](#setgraph)
    * [__construct](#__construct-2)
    * [getLegendHtml](#getlegendhtml)
    * [createNodes](#createnodes)
    * [addAttributes](#addattributes-1)
    * [createImageFile](#createimagefile)
    * [createImageHtml](#createimagehtml)
* [LocalizedFields](#localizedfields)
    * [makeAttribute](#makeattribute-1)
* [Node](#node)
    * [getClassDefinition](#getclassdefinition)
    * [setClassDefinition](#setclassdefinition)
    * [__construct](#__construct-3)
    * [getName](#getname-1)
    * [setName](#setname-1)
    * [getAttributes](#getattributes)
    * [setAttributes](#setattributes)
    * [addAttribute](#addattribute)
    * [getVertex](#getvertex)
    * [setVertex](#setvertex)
    * [addVertex](#addvertex)
* [ObjectBridge](#objectbridge)
    * [createRelation](#createrelation)
* [Relations](#relations)
    * [createRelation](#createrelation-1)
* [Vertex](#vertex)
    * [__construct](#__construct-4)
    * [getName](#getname-2)
    * [setName](#setname-2)
    * [getLabel](#getlabel)
    * [setLabel](#setlabel)
    * [getDestiny](#getdestiny)
    * [setDestiny](#setdestiny)
* [YouweDataDictionaryBundle](#youwedatadictionarybundle)
    * [getJsPaths](#getjspaths)
* [YouweDataDictionaryExtension](#youwedatadictionaryextension)
    * [load](#load)

## Attribute





* Full name: \Youwe\DataDictionaryBundle\Graph\Entity\Attribute
* This class implements: \Youwe\DataDictionaryBundle\Graph\Interfaces\Attribute


### __construct

Attribute constructor.

```php
Attribute::__construct( string $name, boolean $mandatory = false, boolean $unique = false )
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **string** |  |
| `$mandatory` | **boolean** |  |
| `$unique` | **boolean** |  |




---

### getName



```php
Attribute::getName(  ): string
```







---

### setName



```php
Attribute::setName( string $name ): \Youwe\DataDictionaryBundle\Graph\Entity\Attribute
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **string** |  |




---

### isMandatory



```php
Attribute::isMandatory(  ): boolean
```







---

### setMandatory



```php
Attribute::setMandatory( boolean $mandatory ): \Youwe\DataDictionaryBundle\Graph\Entity\Attribute
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$mandatory` | **boolean** |  |




---

### isUnique



```php
Attribute::isUnique(  ): boolean
```







---

### setUnique



```php
Attribute::setUnique( boolean $unique ): \Youwe\DataDictionaryBundle\Graph\Entity\Attribute
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$unique` | **boolean** |  |




---

## ClassDefinition





* Full name: \Youwe\DataDictionaryBundle\Graph\Visitor\ClassDefinition


### getNode

Will visit the

```php
ClassDefinition::getNode( \Pimcore\Model\DataObject\ClassDefinition $class ): \Youwe\DataDictionaryBundle\Graph\Interfaces\Node
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$class` | **\Pimcore\Model\DataObject\ClassDefinition** |  |


**Return Value:**

Return a node instance from a Class Definition



---

## Configuration

This is the class that validates and merges configuration from your app/config files.

To learn more see [http://symfony.com/doc/current/cookbook/bundles/configuration.html](http://symfony.com/doc/current/cookbook/bundles/configuration.html)

* Full name: \Youwe\DataDictionaryBundle\DependencyInjection\Configuration
* This class implements: \Symfony\Component\Config\Definition\ConfigurationInterface


### getConfigTreeBuilder

{@inheritdoc}

```php
Configuration::getConfigTreeBuilder(  )
```







---

## DefaultController





* Full name: \Youwe\DataDictionaryBundle\Controller\DefaultController
* Parent class: 


### indexAction



```php
DefaultController::indexAction( \Symfony\Component\HttpFoundation\Request $request )
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$request` | **\Symfony\Component\HttpFoundation\Request** |  |




---

## DefaultField





* Full name: \Youwe\DataDictionaryBundle\Graph\Visitor\Fields\DefaultField
* This class implements: \Youwe\DataDictionaryBundle\Graph\Interfaces\FieldsVisitor


### makeAttribute



```php
DefaultField::makeAttribute( \Youwe\DataDictionaryBundle\Graph\Entity\Node $node, \Pimcore\Model\DataObject\ClassDefinition\Data $field )
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$node` | **\Youwe\DataDictionaryBundle\Graph\Entity\Node** |  |
| `$field` | **\Pimcore\Model\DataObject\ClassDefinition\Data** |  |




---

## FieldDefinition





* Full name: \Youwe\DataDictionaryBundle\Graph\Visitor\FieldDefinition


### makeAttributes

Will visit the field definitions and create the attributes

```php
FieldDefinition::makeAttributes( \Youwe\DataDictionaryBundle\Graph\Entity\Node $node ): \Youwe\DataDictionaryBundle\Graph\Interfaces\Node
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$node` | **\Youwe\DataDictionaryBundle\Graph\Entity\Node** |  |




---

### makeRelationships



```php
FieldDefinition::makeRelationships( \Youwe\DataDictionaryBundle\Graph\Interfaces\Node $node )
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$node` | **\Youwe\DataDictionaryBundle\Graph\Interfaces\Node** |  |




---

## Graph





* Full name: \Youwe\DataDictionaryBundle\Graph\Graph


### getNodes



```php
Graph::getNodes(  ): array&lt;mixed,\Youwe\DataDictionaryBundle\Graph\Entity\Node&gt;
```







---

### setNodes



```php
Graph::setNodes( array&lt;mixed,\Youwe\DataDictionaryBundle\Graph\Entity\Node&gt; $nodes ): \Youwe\DataDictionaryBundle\Graph\Graph
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$nodes` | **array<mixed,\Youwe\DataDictionaryBundle\Graph\Entity\Node>** |  |




---

### __construct

Graph constructor.

```php
Graph::__construct(  )
```







---

### addAttributes

Iterate over the nodes and create the attributes for them

```php
Graph::addAttributes(  ): $this
```







---

### addRelations

Iterate over the nodes and create the relations for them

```php
Graph::addRelations(  ): $this
```







---

## GraphViz

This class will convert a graph object to an object that represents a graphviz dot notation.

Class DotNotation

* Full name: \Youwe\DataDictionaryBundle\Graph\Presenters\GraphViz


### getGraphViz



```php
GraphViz::getGraphViz(  ): \Graphp\GraphViz\GraphViz
```







---

### setGraphViz



```php
GraphViz::setGraphViz( \Graphp\GraphViz\GraphViz $graphViz ): \Youwe\DataDictionaryBundle\Graph\Presenters\GraphViz
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$graphViz` | **\Graphp\GraphViz\GraphViz** |  |




---

### getGraph



```php
GraphViz::getGraph(  ): \Fhaculty\Graph\Graph
```







---

### setGraph



```php
GraphViz::setGraph( \Fhaculty\Graph\Graph $graph ): \Youwe\DataDictionaryBundle\Graph\Presenters\GraphViz
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$graph` | **\Fhaculty\Graph\Graph** |  |




---

### __construct

GraphViz adapter constructor.

```php
GraphViz::__construct( \Youwe\DataDictionaryBundle\Graph\Graph $graph )
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$graph` | **\Youwe\DataDictionaryBundle\Graph\Graph** |  |




---

### getLegendHtml

Will get the legend html from the view

```php
GraphViz::getLegendHtml(  ): \stdClass
```







---

### createNodes



```php
GraphViz::createNodes(  $nodes ): \Youwe\DataDictionaryBundle\Graph\Presenters\GraphViz
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$nodes` | **** | array of node names |




---

### addAttributes



```php
GraphViz::addAttributes( array $nodes ): \Youwe\DataDictionaryBundle\Graph\Presenters\GraphViz
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$nodes` | **array** |  |




---

### createImageFile



```php
GraphViz::createImageFile(  ): string
```





**Return Value:**

file path on disk



---

### createImageHtml



```php
GraphViz::createImageHtml(  ): string
```





**Return Value:**

the image string (svg)



---

## LocalizedFields





* Full name: \Youwe\DataDictionaryBundle\Graph\Visitor\Fields\LocalizedFields
* This class implements: \Youwe\DataDictionaryBundle\Graph\Interfaces\FieldsVisitor


### makeAttribute



```php
LocalizedFields::makeAttribute( \Youwe\DataDictionaryBundle\Graph\Entity\Node $node, \Pimcore\Model\DataObject\ClassDefinition\Data $field )
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$node` | **\Youwe\DataDictionaryBundle\Graph\Entity\Node** |  |
| `$field` | **\Pimcore\Model\DataObject\ClassDefinition\Data** |  |




---

## Node





* Full name: \Youwe\DataDictionaryBundle\Graph\Entity\Node
* This class implements: \Youwe\DataDictionaryBundle\Graph\Interfaces\Node


### getClassDefinition



```php
Node::getClassDefinition(  ): \Pimcore\Model\DataObject\ClassDefinition
```







---

### setClassDefinition



```php
Node::setClassDefinition( \Pimcore\Model\DataObject\ClassDefinition $classDefinition ): \Youwe\DataDictionaryBundle\Graph\Entity\Node
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$classDefinition` | **\Pimcore\Model\DataObject\ClassDefinition** |  |




---

### __construct

Node constructor.

```php
Node::__construct(  $name,  $attributes = array() )
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **** |  |
| `$attributes` | **** |  |




---

### getName



```php
Node::getName(  ): mixed
```







---

### setName



```php
Node::setName( mixed $name ): \Youwe\DataDictionaryBundle\Graph\Entity\Node
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **mixed** |  |




---

### getAttributes



```php
Node::getAttributes(  ): array
```







---

### setAttributes



```php
Node::setAttributes( array $attributes ): \Youwe\DataDictionaryBundle\Graph\Entity\Node
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$attributes` | **array** |  |




---

### addAttribute

Adds one attribute to the node

```php
Node::addAttribute( \Youwe\DataDictionaryBundle\Graph\Interfaces\Attribute $attribute ): $this
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$attribute` | **\Youwe\DataDictionaryBundle\Graph\Interfaces\Attribute** |  |




---

### getVertex



```php
Node::getVertex(  ): array
```







---

### setVertex



```php
Node::setVertex( array $vertex ): \Youwe\DataDictionaryBundle\Graph\Entity\Node
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$vertex` | **array** |  |




---

### addVertex

Adds one vertex to the node

```php
Node::addVertex( \Youwe\DataDictionaryBundle\Graph\Interfaces\Vertex $vertex ): $this
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$vertex` | **\Youwe\DataDictionaryBundle\Graph\Interfaces\Vertex** |  |




---

## ObjectBridge





* Full name: \Youwe\DataDictionaryBundle\Graph\Visitor\Relations\ObjectBridge


### createRelation



```php
ObjectBridge::createRelation( \Youwe\DataDictionaryBundle\Graph\Interfaces\Node $node, \Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations $relation )
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$node` | **\Youwe\DataDictionaryBundle\Graph\Interfaces\Node** |  |
| `$relation` | **\Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations** |  |




---

## Relations





* Full name: \Youwe\DataDictionaryBundle\Graph\Visitor\Relations\Relations


### createRelation



```php
Relations::createRelation( \Youwe\DataDictionaryBundle\Graph\Entity\Node $node, \Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations $relation )
```



* This method is **static**.
**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$node` | **\Youwe\DataDictionaryBundle\Graph\Entity\Node** |  |
| `$relation` | **\Pimcore\Model\DataObject\ClassDefinition\Data\Relations\AbstractRelations** |  |




---

## Vertex





* Full name: \Youwe\DataDictionaryBundle\Graph\Entity\Vertex
* This class implements: \Youwe\DataDictionaryBundle\Graph\Interfaces\Vertex


### __construct

Vertex constructor.

```php
Vertex::__construct( string $name, string $label, string $destiny )
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **string** |  |
| `$label` | **string** |  |
| `$destiny` | **string** |  |




---

### getName



```php
Vertex::getName(  ): string
```







---

### setName



```php
Vertex::setName( string $name ): \Youwe\DataDictionaryBundle\Graph\Entity\Vertex
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$name` | **string** |  |




---

### getLabel



```php
Vertex::getLabel(  ): string
```







---

### setLabel



```php
Vertex::setLabel( string $label ): \Youwe\DataDictionaryBundle\Graph\Entity\Vertex
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$label` | **string** |  |




---

### getDestiny



```php
Vertex::getDestiny(  ): string
```







---

### setDestiny



```php
Vertex::setDestiny( string $destiny ): \Youwe\DataDictionaryBundle\Graph\Entity\Vertex
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$destiny` | **string** |  |




---

## YouweDataDictionaryBundle





* Full name: \Youwe\DataDictionaryBundle\YouweDataDictionaryBundle
* Parent class: 


### getJsPaths



```php
YouweDataDictionaryBundle::getJsPaths(  )
```







---

## YouweDataDictionaryExtension

This is the class that loads and manages your bundle configuration.



* Full name: \Youwe\DataDictionaryBundle\DependencyInjection\YouweDataDictionaryExtension
* Parent class: 

**See Also:**

* http://symfony.com/doc/current/cookbook/bundles/extension.html 

### load

{@inheritdoc}

```php
YouweDataDictionaryExtension::load( array $configs, \Symfony\Component\DependencyInjection\ContainerBuilder $container )
```




**Parameters:**

| Parameter | Type | Description |
|-----------|------|-------------|
| `$configs` | **array** |  |
| `$container` | **\Symfony\Component\DependencyInjection\ContainerBuilder** |  |




---



--------
> This document was automatically generated from source code comments on 2018-10-10 using [phpDocumentor](http://www.phpdoc.org/) and [cvuorinen/phpdoc-markdown-public](https://github.com/cvuorinen/phpdoc-markdown-public)

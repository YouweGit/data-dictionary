<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-08
 * Time: 11:35
 */

namespace Youwe\DataDictionaryBundle\Graph;

use Fhaculty\Graph\Set\Edges;
use Graphp\GraphViz\GraphViz;
use Pimcore\Model\DataObject\ClassDefinition;
use Youwe\DataDictionaryBundle\Graph\Visitor\FieldDefinition;

class Graph
{
    protected $graph;
    protected $graphViz;
    protected $classes;

    /**
     * Graph constructor.
     */
    public function __construct()
    {
        $this->graph = new \Fhaculty\Graph\Graph();
        $this->graph->setAttribute('graphviz.node.shape', 'box');
        $this->graph->setAttribute('graphviz.graph.label', '<<b>Legend</b><br/><b>M</b> - Mandatory <br/> <b>U</b> - Unique>');
        $this->graphViz = new GraphViz();
        $this->graphViz->setFormat('svg');
        foreach ($this->getClasses() as $class) {
            $this->classes[$class] = Visitor\ClassDefinition::getNode(
                ClassDefinition::getByName($class)
            );
        }
    }

    /**
     * @return \Fhaculty\Graph\Graph
     */
    public function getGraph(): \Fhaculty\Graph\Graph
    {
        return $this->graph;
    }

    /**
     * @param \Fhaculty\Graph\Graph $graph
     */
    public function setGraph(\Fhaculty\Graph\Graph $graph): void
    {
        $this->graph = $graph;
    }

    /**
     * @return GraphViz
     */
    public function getGraphViz(): GraphViz
    {
        return $this->graphViz;
    }

    /**
     * @param GraphViz $graphViz
     */
    public function setGraphViz(GraphViz $graphViz): void
    {
        $this->graphViz = $graphViz;
    }

    /**
     * @param $nodes array of node names
     * @return Graph
     */
    public function createNodes()
    {
        /**
         * @var Node $node
         */
        foreach ($this->classes as $node) {
            $this->graph->createVertex($node->getName());
        }
        return $this;
    }
    public function addAttributes()
    {
        foreach ($this->classes as $node) {
            FieldDefinition::makeAttributes($node);
            $this->graph
                 ->getVertex($node->getName())
                 ->setAttribute('graphviz.label', $this->getNodeHtml($node));
        }
        return $this;
    }
    public function addRelations()
    {
        foreach ($this->classes as $node) {
            FieldDefinition::makeRelationships($node);
            $this->createRelations($node);
        }

        return $this;
    }
    private function createRelations(Node $node)
    {
        /**
         * @var Vertex $vertex
         */
        foreach ($node->getVertex() as $vertex) {
            $this->graph
                 ->getVertex($node->getName())
                 ->createEdgeTo(
                     $this->graph->getVertex(
                         $vertex->getDestiny()
                     )
                 )
                 ->setAttribute("graphviz.label", $this->getArrowHtml($vertex->getLabel()));
        }
    }
    private function getArrowHtml($label)
    {
        return "< <i> $label </i> >";
    }
    private function getNodeHtml(Node $node)
    {
        $left =  'align="left"';
        $attributes = '';
        $name = $node->getName();
        foreach ($node->getAttributes() as $att) {
            $attributes .= "<tr>"
                         . "<td $left>" . $att->getName() . "</td>"
                         . "<td><b>&nbsp;" . (($att->isMandatory())?'M':'') . "</b></td>"
                         . "<td><b>&nbsp;" .(($att->isUnique())?'U':'') . "</b></td>"
                         . "</tr>\n";
        }
        return <<<HTML
<            <table border="0" cellborder="0"  cellspacing="0" align="left">
                <tr><td colspan="3" align="center"><u><b>$name</b></u></td></tr>
                $attributes
            </table>
>
HTML;
    }
    /**
     * @return string file path on disk
     */
    public function createImageFile()
    {
        return $this->graphViz->createImageFile($this->graph);
    }

    /**
     * @return string the image string (svg)
     */
    public function createImageHtml()
    {
        return $this->graphViz->createImageHtml($this->graph);
    }

    /**
     * @return mixed array of the classes name
     * @throws \Doctrine\DBAL\DBALException
     */
    private function getClasses()
    {
        $classDefinition = new ClassDefinition();
        $db = $classDefinition->getDao()->db;
        return $db->fetchPairs('select * from classes order by 1 asc');
    }
}

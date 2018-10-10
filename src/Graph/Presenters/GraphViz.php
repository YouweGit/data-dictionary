<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-10
 * Time: 10:21
 */

namespace Youwe\DataDictionaryBundle\Graph\Presenters;

use Fhaculty\Graph\Graph;
use Youwe\DataDictionaryBundle\Graph\Adapters\Vertex;
use Youwe\DataDictionaryBundle\Graph\Entity\Node;

/**
 * This class will convert a graph object to an object that represents a graphviz dot notation.
 * Class DotNotation
 * @package Youwe\DataDictionaryBundle\Graph\Adapters
 */
class GraphViz
{
    /**
     * @var Graph graph
     */
    private $graph;
    /**
     * @var \Graphp\GraphViz\GraphViz $graphViz
     */
    private $graphViz;

    /**
     * @return \Graphp\GraphViz\GraphViz
     */
    public function getGraphViz(): \Graphp\GraphViz\GraphViz
    {
        return $this->graphViz;
    }

    /**
     * @param \Graphp\GraphViz\GraphViz $graphViz
     * @return GraphViz
     */
    public function setGraphViz(\Graphp\GraphViz\GraphViz $graphViz): GraphViz
    {
        $this->graphViz = $graphViz;
        return $this;
    }

    /**
     * @return Graph
     */
    public function getGraph(): Graph
    {
        return $this->graph;
    }

    /**
     * @param Graph $graph
     * @return GraphViz
     */
    public function setGraph(Graph $graph): GraphViz
    {
        $this->graph = $graph;
        return $this;
    }

    /**
     * GraphViz adapter constructor.
     * @param \Youwe\DataDictionaryBundle\Graph\Graph $graph
     * @throws \Exception
     */
    public function __construct(\Youwe\DataDictionaryBundle\Graph\Graph $graph)
    {
        $this->graph = new \Fhaculty\Graph\Graph();
        $this->graph->setAttribute('graphviz.node.shape', 'box');
        $this->graph->setAttribute('graphviz.graph.label', '<<b>Legend</b><br/><b>M</b> - Mandatory <br/> <b>U</b> - Unique>');
        $this->graphViz = new \Graphp\GraphViz\GraphViz();
        $this->graphViz->setFormat('svg');

        $this->build($graph);
    }

    /**
     * @param \Youwe\DataDictionaryBundle\Graph\Graph $graph
     * @return GraphViz
     * @throws \Exception
     */
    private function build(\Youwe\DataDictionaryBundle\Graph\Graph $graph): GraphViz
    {
        $this->createNodes($graph->getNodes());
        $this->addAttributes($graph->getNodes());
        $this->addRelations($graph->getNodes());

        return $this;
    }

    /**
     * @param $nodes array of node names
     * @return GraphViz
     */
    public function createNodes(array $nodes)
    {
        /**
         * @var Node $node
         */
        foreach ($nodes as $node) {
            $this->graph->createVertex($node->getName());
        }
        return $this;
    }

    /**
     * @param array $nodes
     * @return GraphViz
     * @throws \Exception
     */
    public function addAttributes(array $nodes)
    {
        /**
         * @var Node $node
         */
        foreach ($nodes as $node) {
            $this->graph
                ->getVertex($node->getName())
                ->setAttribute('graphviz.label', $this->getNodeHtml($node));
        }
        return $this;
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

    private function addRelations(array $nodes)
    {
        /**
         * @var Node $node
         */
        foreach ($nodes as $node) {
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
    }
    private function getArrowHtml($label)
    {
        return "< <i> $label </i> >";
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
}

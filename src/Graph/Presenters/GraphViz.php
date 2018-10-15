<?php
/**
 * Created by PhpStorm.
 * User: paulo.bettini
 * Date: 2018-10-10
 * Time: 10:21
 */

namespace DataDictionaryBundle\Graph\Presenters;

use DataDictionaryBundle\Graph\Entity\Vertex;
use Fhaculty\Graph\Graph;
use DataDictionaryBundle\Graph\Entity\Node;
use Symfony\Component\Templating\PhpEngine;
use Symfony\Component\Templating\TemplateNameParser;
use Symfony\Component\Templating\Loader\FilesystemLoader;

/**
 * This class will convert a graph object to an object that represents a graphviz dot notation.
 * Class DotNotation
 * @package DataDictionaryBundle\Graph\Adapters
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
     * @var string[] warning messages to show as a simple text node
     */
    private $warnings = [];

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
     * @param \DataDictionaryBundle\Graph\Graph $graph
     * @throws \Exception
     */
    public function __construct(\DataDictionaryBundle\Graph\Graph $graph)
    {
        $this->graph = new \Fhaculty\Graph\Graph();
        $this->graph->setAttribute('graphviz.node.shape', 'box');
        $this->graph->setAttribute('graphviz.graph.label', $this->getLegendHtml());
        $this->graphViz = new \Graphp\GraphViz\GraphViz();
        $this->graphViz->setFormat('svg');

        $this->build($graph);
    }

    /**
     * Will get the legend html from the view
     * @return \stdClass
     */
    public function getLegendHtml()
    {
        return $this->createHtmlContent(
            $this->getView('legend')
        );
    }
    /**
     * @param \DataDictionaryBundle\Graph\Graph $graph
     * @return GraphViz
     * @throws \Exception
     */
    private function build(\DataDictionaryBundle\Graph\Graph $graph): GraphViz
    {
        $this->createNodes($graph->getNodes());
        $this->addAttributes($graph->getNodes());
        $this->addRelations($graph->getNodes());
        $this->addWarnings();
        return $this;
    }
    private function addWarnings()
    {
        $this->graph
             ->createVertex('Warnings')
             ->setAttribute('graphviz.label', $this->getWarningsHtml());
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
        return $this->createHtmlContent(
            $this->getView(
                'node',
                [
                    'node' => $node
                ]
            )
        );
    }
    private function getWarningsHtml()
    {
        return $this->createHtmlContent(
            $this->getView(
                'warning',
                [
                    'warnings' => $this->warnings
                ]
            )
        );
    }
    /**
     * Get a view from the views directory
     * @param string $name
     * @param array $data
     * @return false|string
     */
    private function getView(string $name, array $data = [])
    {
        $filesystemLoader = new FilesystemLoader(__DIR__.'/views/%name%');
        $templating = new PhpEngine(new TemplateNameParser(), $filesystemLoader);
        return $templating->render($name . '.phtml', $data);
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
                if (!array_key_exists($vertex->getDestiny(), $nodes)) {
                    $this->warnings[] = sprintf(
                        "The second node of the relation does not exists: %s -> %s (%s)",
                        $node->getName(),
                        $vertex->getDestiny(),
                        ($vertex->isBack())?'forward' : 'backward'
                    );
                    continue;
                }
                if ($vertex->isBack()) {
                    $this->createRelation(
                        $vertex->getDestiny(),
                        $node->getName(),
                        $this->getArrowHtml($vertex->getLabel())
                    );
                } else {
                    $this->createRelation(
                        $node->getName(),
                        $vertex->getDestiny(),
                        $this->getArrowHtml($vertex->getLabel())
                    );
                }
            }
        }
    }
    private function createRelation($from, $to, $label)
    {
        $edge = $this->graph->getVertex($from);
        $edge->createEdgeTo(
            $this->graph->getVertex(
                $to
            )
        )->setAttribute("graphviz.label", $label);
    }

    private function getArrowHtml($label)
    {
        return $this->createHtmlContent(
            $this->getView(
                'arrow',
                [
                    'label' => $label
                ]
            )
        );
    }

    private function createHtmlContent(string $content)
    {
        return \Graphp\GraphViz\GraphViz::raw('<' . $content .'>');
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

<?php

namespace DataDictionaryBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use DataDictionaryBundle\Graph\Presenters\GraphViz;
use DataDictionaryBundle\Graph\Graph;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

/**
 * Class DefaultController
 * @package DataDictionaryBundle\Controller
 *
 * @Route("/admin/data-dictionary")
 */
class DefaultController extends AdminController
{
    /**
     * @Route("/")
     * @param Graph $graph
     * @return Response
     * @throws \Exception
     */
    public function indexAction(\DataDictionaryBundle\Graph\Graph $graph)
    {
        $graph->makeGraph();
        $graphViz = new GraphViz($graph);

        return $this->render(
            "DataDictionaryBundle:Default:index.html.php",
            ['image' => $graphViz->createSVGData()]
        );
    }
    
    /**
     * @Route("/image", name="dataDictonaryImage")
     * @param Graph $graph
     * @return Response
     * @throws \Exception
     */
    public function imageAction(\DataDictionaryBundle\Graph\Graph $graph)
    {
        $graph->makeGraph();
        $graphViz = new GraphViz($graph);

        $response = new BinaryFileResponse($graphViz->createImageFile());

        return $response;
    }
    /**
     * @Route("/test", name="dataDictonaryImage")
     * @param Graph $graph
     * @return Response
     * @throws \Exception
     */
    public function testAction(\DataDictionaryBundle\Graph\Graph $graph)
    {
        $graph->makeGraph();

        $graphViz = new GraphViz($graph);

        return $this->render(
            "DataDictionaryBundle:Default:index.html.php",
            ['image' => $graphViz->createSVGData()]
        );
    }
}

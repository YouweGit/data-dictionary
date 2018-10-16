<?php

namespace DataDictionaryBundle\Controller;

use Pimcore\Bundle\AdminBundle\Controller\AdminController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
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
     * @return Response
     * @throws \Exception
     */
    public function indexAction()
    {
        $graph = new Graph();
        $graphViz = new GraphViz($graph);

        return $this->render(
            "DataDictionaryBundle:default:index.html.php",
            ['image' => $graphViz->createImageHtml()]
        );
    }
    /**
     * @Route("/image", name="dataDictonaryImage")
     * @return Response
     * @throws \Exception
     */
    public function imageAction()
    {
        $graph = new Graph();
        $graphViz = new GraphViz($graph);

        $response = new BinaryFileResponse($graphViz->createImageFile());

        return $response;
    }
}

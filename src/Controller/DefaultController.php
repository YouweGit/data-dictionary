<?php

namespace Youwe\DataDictionaryBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Youwe\DataDictionaryBundle\Graph\Presenters\GraphViz;
use Youwe\DataDictionaryBundle\Graph\Graph;

class DefaultController extends FrontendController
{
    /**
     * @Route("/data-dictionary")
     * @throws \Exception
     */
    public function indexAction(Request $request)
    {
        $graph = new Graph();
        $graphViz = new GraphViz($graph);

        return $this->render(
            "YouweDataDictionaryBundle:default:index.html.php",
            ['image' => $graphViz->createImageHtml()]
        );
    }
}

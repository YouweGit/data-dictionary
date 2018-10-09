<?php

namespace Youwe\DataDictionaryBundle\Controller;

use Pimcore\Controller\FrontendController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Youwe\DataDictionaryBundle\Graph\Graph;

class DefaultController extends FrontendController
{
    /**
     * @Route("/data-dictionary")
     */
    public function indexAction(Request $request)
    {
        $graph = new Graph();
        $graph->createNodes()->addAttributes()->addRelations();

        return $this->render(
            "YouweDataDictionaryBundle:default:index.html.php",
            ['image' => $graph->createImageHtml()]
        );
    }
}

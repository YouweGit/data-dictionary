<?php

namespace DataDictionaryBundle\Command;

use DataDictionaryBundle\Graph\{Graph, Presenters\GraphViz};

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class GraphCommand extends ContainerAwareCommand
{
    private $classes;
    protected function configure()
    {
        $this->setName('youwe:graph')->setDescription("");
    }
    public function setClasses(iterable $classes) {
        $this->classes = $classes;
    }
    protected function execute(InputInterface $input, OutputInterface $output)
    {

    }
}

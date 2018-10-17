<?php

namespace DataDictionaryBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class DataDictionaryBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/datadictionary/js/pimcore/startup.js'
        ];
    }
}

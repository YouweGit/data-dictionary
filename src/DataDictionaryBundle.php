<?php

namespace DataDictionaryBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;
use Pimcore\Extension\Bundle\Traits\PackageVersionTrait;

class DataDictionaryBundle extends AbstractPimcoreBundle
{
    use PackageVersionTrait;

    protected function getComposerPackageName()
    {
        return 'youwe/data-dictionary';
    }

    public function getJsPaths()
    {
        return [
            '/bundles/datadictionary/js/pimcore/startup.js'
        ];
    }
}

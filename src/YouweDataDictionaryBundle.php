<?php

namespace Youwe\DataDictionaryBundle;

use Pimcore\Extension\Bundle\AbstractPimcoreBundle;

class YouweDataDictionaryBundle extends AbstractPimcoreBundle
{
    public function getJsPaths()
    {
        return [
            '/bundles/youwedatadictionary/js/pimcore/startup.js'
        ];
    }
}

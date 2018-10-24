<?php

namespace DataDictionaryBundle\DependencyInjection;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\Extension\PrependExtensionInterface;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;
use Symfony\Component\DependencyInjection\Loader;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class DataDictionaryExtension extends Extension implements PrependExtensionInterface
{
    /**
     * {@inheritdoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.yml');
    }

    public function prepend(ContainerBuilder $container)
    {
        $pim= $container->getExtensionConfig('pimcore');
        $map = [];
        foreach ($pim as $key => $config) {
            if (is_array($config)) {
                foreach ($this->getConfigForPath($config) as $className => $fullName) {
                    $map[] = [
                        'className' => $className,
                        'fullName' => $fullName
                    ];
                }
            }
        }
        $configuration = new Configuration();
        $config= $this->processConfiguration($configuration, $map);
        $container->setParameter('data_dictionary.map', $map);
    }
    private function getConfigForPath(array $config)
    {
        $steps = [
            'objects',
            'class_definitions',
            'data',
            'map'
        ];

        foreach ($steps as $step) {
            if (!array_key_exists($step, $config)) {
                return [];
            }

            $config = $config[$step];
        }

        return $config;
    }
}

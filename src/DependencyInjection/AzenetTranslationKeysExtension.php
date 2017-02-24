<?php

namespace Azenet\TranslationKeysBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration.
 *
 * @link http://symfony.com/doc/current/cookbook/bundles/extension.html
 */
class AzenetTranslationKeysExtension extends Extension {
	/**
	 * {@inheritdoc}
	 */
	public function load(array $configs, ContainerBuilder $container) {
		$configuration = new Configuration();
		$config        = $this->processConfiguration($configuration, $configs);

		$container->setParameter('azenet_translation_keys.parameter_name', $config['parameter_name']);
		$container->setParameter('azenet_translation_keys.enabled', $config['enabled']);

		$loader = new Loader\YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
		$loader->load('services.yml');
	}
}

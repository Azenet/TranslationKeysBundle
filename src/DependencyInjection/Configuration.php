<?php

namespace Azenet\TranslationKeysBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface {
	/**
	 * {@inheritdoc}
	 */
	public function getConfigTreeBuilder() {
		$treeBuilder = new TreeBuilder();
		$rootNode    = $treeBuilder->root('azenet_translation_keys');

		$rootNode
			->children()
				->booleanNode('enabled')->defaultFalse()->end()
				->scalarNode('parameter_name')->defaultValue("untranslated")->end()
			->end();

		return $treeBuilder;
	}
}

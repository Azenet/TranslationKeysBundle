<?php

namespace Azenet\TranslationKeysBundle\Event;

use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;

class RequestSubscriber implements EventSubscriberInterface, ContainerAwareInterface {
	use ContainerAwareTrait;

	/**
	 * @var boolean
	 */
	private $enabled;

	/**
	 * @var string
	 */
	private $parameterName;

	public function __construct($parameterName, $enabled) {
		$this->enabled       = $enabled;
		$this->parameterName = $parameterName;
	}

	/**
	 * {@inheritdoc}
	 */
	public static function getSubscribedEvents() {
		return [
			'kernel.request' => 'onKernelRequest'
		];
	}

	public function onKernelRequest(GetResponseEvent $event) {
		$request = $event->getRequest();

		if ($request->query->has($this->parameterName) && $this->enabled) {
			$request->setLocale('unt');
			$t = $this->container->get('translator');
			$t->setLocale('unt');

			$refl = new \ReflectionClass(get_class($t));
			if ($refl->hasProperty('translator')) {
				$prop = $refl->getProperty('translator');
				$prop->setAccessible(true);
				$rt = $prop->getValue($t);
				$rt->setFallbackLocales([]);
			} else {
				$t->setFallbackLocales([]);
			}
		}
	}
}
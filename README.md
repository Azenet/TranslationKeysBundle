# TranslationKeysBundle

## Installation
### 1. Require the package
```bash
composer require azenet/translation-keys-bundle
```

### 2. Add configuration
The bundle is disabled by default.
```yaml
# config_dev.yml
azenet_translation_keys:
    enabled:        true
    parameter_name: untranslated
```

### 3. Add bundle to AppKernel
```php
<?php

// app/AppKernel.php

class AppKernel extends Kernel {
	public function registerBundles() {
		$bundles = array(
			// ...
			new Azenet\TranslationKeysBundle\AzenetTranslationKeysBundle(),
		);
	}
}
```

## Usage
Add `?parameter_name` to your URLs. Default parameter_name is `untranslated`. 
 
## License
GPLv2, see [LICENSE](LICENSE).
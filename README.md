# Coffreo/php-translation-js-extractor

By [Coffreo](https://coffreo.biz)

[![Build Status](https://travis-ci.org/Coffreo/php-translation-js-extractor-bundle.svg?branch=master)](https://travis-ci.com/Coffreo/php-translation-js-extractor-bundle)
[![Coverage](https://img.shields.io/scrutinizer/coverage/g/coffreo/php-translation-js-extractor-bundle.svg)](https://scrutinizer-ci.com/g/coffreo/php-translation-js-extractor-bundle)

Extract translations from Javascript source files.

* **Require** [`PHP Translation symfony-bundle`](https://php-translation.readthedocs.io/en/latest/symfony/index.html) 
* **Recommended** [`willdurand/js-translation-bundle`](https://github.com/willdurand/BazingaJsTranslationBundle)

## Installation

### Application with Symfony flex

```
composer require coffreo/php-translation-js-extractor-bundle
```

### Application without Symfony flex

* Install bundle

  ```
  composer require coffreo/php-translation-js-extractor-bundle
  ```

* Enable bundle: add bundle to `AppKernel`

````php
// config/AppKernel.php
public function registerBundles()
{
    return array(
        // ...
        new Coffreo\PHPTranslationJsExtractorBundle\PHPTranslationJsExtractorBundle(),
        // ...
    );
}
````

## Usage

This bundle allow extraction of translated strings in javascript files using [Coffreo/js-translation-extractor](https://github.com/Coffreo/js-translation-extractor).

No specific command line to use, just use originals php-translation commands:

```
(app|bin)/console translation:extract ....
``` 

Translations found are automatically added to current translations files as PHP, twig ones.

### Configuration

This bundle doesn't need configuration.   
However, to extract strings from JS files, you must indicate where are stored your JS files in [`php-translation/symfony-bundle` configuration](https://php-translation.readthedocs.io/en/latest/symfony/index.html#configuration).

```
# config/packages/php_translation.yaml
translation:
    ...
    configs:
        app:
            dirs: 
              - "%kernel.project_dir%/templates"
              - "%kernel.project_dir%/src"
              - "%kernel.project_dir%/assets"     # <-- add path containing JS files 
            #...
```


## Developer commands

* Run tests:

```shell
composer test
```

* Apply coding standard

```shell
composer cs
```

**Coding standard must be applied before commit, TravisCI will fail otherwise**

## License

This project is licensed under the MIT License - see the [LICENSE](./LICENSE) file for details

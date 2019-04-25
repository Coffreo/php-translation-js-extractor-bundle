# Coffreo/php-translation-js-extractor

By [Coffreo](https://coffreo.biz)

![PHP from Packagist](https://img.shields.io/packagist/php-v/coffreo/php-translation-js-extractor-bundle.svg)
[![Build Status](https://travis-ci.org/Coffreo/php-translation-js-extractor-bundle.svg?branch=master)](https://travis-ci.org/Coffreo/php-translation-js-extractor-bundle)
[![Coverage](https://img.shields.io/scrutinizer/coverage/g/coffreo/php-translation-js-extractor-bundle.svg)](https://scrutinizer-ci.com/g/coffreo/php-translation-js-extractor-bundle)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Coffreo/php-translation-js-extractor-bundle/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/Coffreo/php-translation-js-extractor-bundle/?branch=master)

Extract translations from Javascript source files.

* **Recommended** [`willdurand/js-translation-bundle`](https://github.com/willdurand/BazingaJsTranslationBundle)

> Same bundle exists for [JMSTranslation](http://jmsyst.com/bundles/JMSTranslationBundle): see [Coffreo/jms-translation-js-extractor-bundle](https://github.com/Coffreo/jms-translation-js-extractor-bundle)

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

* Enable bundle:
    
  * symfony 3.*
    ````php
    // config/AppKernel.php
    public function registerBundles()
    {
        return array(
            // ...
            new Coffreo\PHPTranslationJsExtractorBundle\CoffreoPHPTranslationJsExtractorBundle(),
            // ...
        );
    }
    ````
    
  * symfony 4.* (if not already added by `symfony/flex`)
    ````php
    // config/bundles.php
    
    return [
        // ...
        Coffreo\PHPTranslationJsExtractorBundle\CoffreoPHPTranslationJsExtractorBundle::class => ['all' => true],
    ];
    ````


## Usage

This bundle allow extraction of translated strings in javascript files using [Coffreo/js-translation-extractor](https://github.com/Coffreo/js-translation-extractor).

No specific command line to use, just use originals `php-translation/symfony-bundle` commands:

````shell
$ bin/console translation:extract ....
```` 

Translations found are automatically added to current translations files as PHP, twig ones.

### Configuration

This bundle doesn't need configuration.   
However, to extract strings from JS files, you must indicate where are stored your JS files in [`php-translation/symfony-bundle` configuration](https://php-translation.readthedocs.io/en/latest/symfony/index.html#configuration).

```
# paths below are symfony 4.X paths, make sure to change them for sumfony 3.X
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

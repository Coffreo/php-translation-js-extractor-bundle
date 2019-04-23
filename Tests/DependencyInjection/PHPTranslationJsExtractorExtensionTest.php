<?php

namespace Coffreo\PHPTranslationJsExtractorBundle\Tests\Extractor;

use Coffreo\PHPTranslationJsExtractorBundle\DependencyInjection\PHPTranslationJsExtractorExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

/** @covers \Coffreo\PHPTranslationJsExtractorBundle\DependencyInjection\PHPTranslationJsExtractorExtension */
class PHPTranslationJsExtractorExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @return array|\Symfony\Component\DependencyInjection\Extension\ExtensionInterface[]
     */
    protected function getContainerExtensions()
    {
        return [
            new PHPTranslationJsExtractorExtension(),
        ];
    }

    public function getHandledTypes()
    {
        return [
            ['js'],
            ['jsx'],
        ];
    }

    /**
     *
     * @dataProvider getHandledTypes
     *
     * @param $type
     */
    public function testPHPTranslationServiceIsDefinedWithTagAndType($type)
    {
        $this->load();
        $this->assertContainerBuilderHasServiceDefinitionWithTag(
            'coffreo.php_translation.js_extractor.'.$type,
            'php_translation.extractor',
            compact('type')
        );
    }
}

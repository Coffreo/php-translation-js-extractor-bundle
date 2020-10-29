<?php

namespace Coffreo\PHPTranslationJsExtractorBundle\Tests\Extractor;

use Coffreo\PHPTranslationJsExtractorBundle\DependencyInjection\CoffreoPHPTranslationJsExtractorExtension;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;

/** @covers \Coffreo\PHPTranslationJsExtractorBundle\DependencyInjection\CoffreoPHPTranslationJsExtractorExtension */
class CoffreoPHPTranslationJsExtractorExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @return \Symfony\Component\DependencyInjection\Extension\ExtensionInterface[]
     */
    protected function getContainerExtensions(): array
    {
        return [
            new CoffreoPHPTranslationJsExtractorExtension(),
        ];
    }

    public function getHandledTypes(): array
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

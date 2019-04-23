<?php

/**
 * This file is part of Coffreo project "coffreo/php-translation-js-extractor-bundle"
 *
 * (c) Coffreo SAS <contact@coffreo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coffreo\PHPTranslationJsExtractorBundle\Tests\Extractor;

use Coffreo\JsTranslationExtractor\Extractor\JsTranslationExtractor;
use Coffreo\JsTranslationExtractor\Model\TranslationCollection;
use Coffreo\JsTranslationExtractor\Model\TranslationString;
use Coffreo\PHPTranslationJsExtractorBundle\Extractor\JsFileExtractor;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Finder\SplFileInfo;
use Translation\Extractor\Model\SourceCollection;
use Translation\Extractor\Model\SourceLocation;

/** @covers \Coffreo\PHPTranslationJsExtractorBundle\Extractor\JsFileExtractor */
class JsFileExtractorTest extends TestCase
{
    public function testExtraction()
    {
        $collectionStub = new TranslationCollection();
        $collectionStub->addTranslation(
            new TranslationString('foo', 10, ['domain' => 'messages'])
        );

        $baseExtractorMock = $this
            ->getMockBuilder(JsTranslationExtractor::class)
            ->setMethods(['extract'])
            ->getMock();

        $baseExtractorMock->expects($this->once())
            ->method('extract')
            ->with('')
            ->willReturn($collectionStub);

        $extractor = new JsFileExtractor('type', $baseExtractorMock);
        $this->assertEquals('type', $extractor->getType());
        $file = \realpath(__DIR__.'/../Resources/file');

        $collection = new SourceCollection();
        $extractor->getSourceLocations(new SplFileInfo($file, '', ''), $collection);

        $this->assertEquals(new SourceLocation('foo', $file, 10, ['domain' => 'messages']), $collection->first());
    }
}

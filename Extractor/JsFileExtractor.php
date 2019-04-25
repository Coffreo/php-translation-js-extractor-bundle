<?php

/**
 * This file is part of Coffreo project "coffreo/php-translation-js-extractor-bundle"
 *
 * (c) Coffreo SAS <contact@coffreo.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Coffreo\PHPTranslationJsExtractorBundle\Extractor;

use Coffreo\JsTranslationExtractor\Extractor\JsTranslationExtractor;
use Coffreo\JsTranslationExtractor\Extractor\JsTranslationExtractorInterface;
use Coffreo\JsTranslationExtractor\Model\TranslationCollection;
use Coffreo\JsTranslationExtractor\Model\TranslationString;
use Symfony\Component\Finder\SplFileInfo;
use Translation\Extractor\FileExtractor\FileExtractor;
use Translation\Extractor\Model\SourceCollection;
use Translation\Extractor\Model\SourceLocation;

final class JsFileExtractor implements FileExtractor
{
    /** @var JsTranslationExtractorInterface */
    private $extractor;

    /** @var string */
    private $type;

    /**
     * JsFileExtractor constructor.
     *
     * @param string                               $type      the type of file handled by this extractor
     * @param JsTranslationExtractorInterface|null $extractor extractor instance to use
     */
    public function __construct($type = 'js', JsTranslationExtractorInterface $extractor = null)
    {
        $this->type = $type;
        $this->extractor = $extractor ?: new JsTranslationExtractor();
    }

    public function getSourceLocations(SplFileInfo $file, SourceCollection $collection)
    {
        $realPath = $file->getRealPath();
        $translations = $this->findTranslations($file);

        foreach ($translations as $translation) {
            /* @var $translation TranslationString */
            $collection->addLocation(new SourceLocation($translation->getMessage(), $realPath, $translation->getLine(), $translation->getContext()));
        }
    }

    /**
     * @param SplFileInfo $file
     *
     * @return TranslationCollection
     */
    public function findTranslations(SplFileInfo $file)
    {
        return $this->extractor->extract($file->getContents(), new TranslationCollection());
    }

    /**
     * @return string the file type
     */
    public function getType()
    {
        return $this->type;
    }
}

<?php

/**
 * This file is part of the Spryker Suite.
 * For full license information, please view the LICENSE file that was distributed with this source code.
 */

declare(strict_types = 1);

namespace Pyz\Zed\Translator;

use Spryker\Zed\Translator\TranslatorConfig as SprykerTranslatorConfig;

class TranslatorConfig extends SprykerTranslatorConfig
{
    /**
     * * @project Only needed in non-split projects.
     *
     * @return array<string>
     */
    public function getCoreTranslationFilePathPatterns(): array
    {
        $coreTranslationFilePathPatterns = parent::getCoreTranslationFilePathPatterns();
        $coreTranslationFilePathPatterns[] = APPLICATION_VENDOR_DIR . '/spryker/spryker/Bundles/*/data/translation/Zed/[a-z][a-z]_[A-Z][A-Z].csv';
        $coreTranslationFilePathPatterns[] = APPLICATION_VENDOR_DIR . '/spryker/spryker/Features/*/data/translation/Zed/[a-z][a-z]_[A-Z][A-Z].csv';

        return $coreTranslationFilePathPatterns;
    }
}

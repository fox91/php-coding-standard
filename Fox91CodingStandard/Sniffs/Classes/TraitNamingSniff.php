<?php
declare(strict_types=1);

namespace Fox91ModDoctrine\Classes\NamingConventions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\ClassHelper;

use function sprintf;
use function strlen;
use function strtolower;
use function substr;

use const T_TRAIT;

class TraitNamingSniff implements Sniff
{
    public const CODE_MISSING_SUFFIX = 'MissingSuffix';
    public const TRAIT_SUFFIX = 'Trait';

    /** @return array<int, (int|string)> */
    public function register(): array
    {
        return [T_TRAIT];
    }

    /**
     * @param int $traitPointer
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     */
    public function process(File $phpcsFile, $traitPointer): void
    {
        $traitName = ClassHelper::getName($phpcsFile, $traitPointer);

        $suffix = substr($traitName, 0 - strlen(self::TRAIT_SUFFIX));
        if (strtolower($suffix) === strtolower(self::TRAIT_SUFFIX)) {
            return;
        }

        $phpcsFile->addWarning(sprintf('Missing suffix "%s".', self::TRAIT_SUFFIX), $traitPointer, self::CODE_MISSING_SUFFIX);
    }
}

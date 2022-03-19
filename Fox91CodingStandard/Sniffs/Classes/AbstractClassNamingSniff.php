<?php
declare(strict_types=1);

namespace Fox91CodingStandard\Classes\NamingConventions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\ClassHelper;
use SlevomatCodingStandard\Helpers\TokenHelper;

use function sprintf;
use function strlen;
use function strtolower;
use function substr;

use const T_ABSTRACT;
use const T_CLASS;

class AbstractClassNamingSniff implements Sniff
{
    public const CODE_MISSING_PREFIX = 'MissingPrefix';
    public const ABSTRACT_CLASS_PREFIX = 'Abstract';

    /** @return array<int, (int|string)> */
    public function register(): array
    {
        return [T_CLASS];
    }

    /**
     * @param int $classPointer
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     */
    public function process(File $phpcsFile, $classPointer): void
    {
        $className = ClassHelper::getName($phpcsFile, $classPointer);

        $previousPointer = TokenHelper::findPreviousEffective($phpcsFile, $classPointer - 1);
        if ($phpcsFile->getTokens()[$previousPointer]['code'] !== T_ABSTRACT) {
            return;
        }

        $prefix = substr($className, 0, strlen(self::ABSTRACT_CLASS_PREFIX));

        if (strtolower($prefix) === strtolower(self::ABSTRACT_CLASS_PREFIX)) {
            return;
        }

        $phpcsFile->addWarning(sprintf('Missing prefix "%s".', self::ABSTRACT_CLASS_PREFIX), $classPointer, self::CODE_MISSING_PREFIX);
    }
}

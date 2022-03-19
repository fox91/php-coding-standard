<?php
declare(strict_types=1);

namespace Fox91CodingStandard\Classes\NamingConventions;

use PHP_CodeSniffer\Files\File;
use PHP_CodeSniffer\Sniffs\Sniff;
use SlevomatCodingStandard\Helpers\ClassHelper;

use function sprintf;
use function strlen;
use function strtolower;
use function substr;

use const T_INTERFACE;

class InterfaceNamingSniff implements Sniff
{
    public const CODE_MISSING_SUFFIX = 'MissingSuffix';
    public const INTERFACE_SUFFIX = 'Interface';

    /** @return array<int, (int|string)> */
    public function register(): array
    {
        return [T_INTERFACE];
    }

    /**
     * @param int $interfacePointer
     *
     * @phpcsSuppress SlevomatCodingStandard.TypeHints.ParameterTypeHint.MissingNativeTypeHint
     */
    public function process(File $phpcsFile, $interfacePointer): void
    {
        $interfaceName = ClassHelper::getName($phpcsFile, $interfacePointer);

        $suffix = substr($interfaceName, 0 - strlen(self::INTERFACE_SUFFIX));
        if (strtolower($suffix) === strtolower(self::INTERFACE_SUFFIX)) {
            return;
        }

        $phpcsFile->addWarning(sprintf('Missing suffix "%s".', self::INTERFACE_SUFFIX), $interfacePointer, self::CODE_MISSING_SUFFIX);
    }
}

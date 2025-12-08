# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Project Overview

This is a PHP_CodeSniffer coding standard package that provides the `Fox91CodingStandard` ruleset. The project is distributed as a Composer package and integrates multiple PHP coding standard tools.

**Supported PHP Versions**: 7.4, 8.0, 8.1, 8.2, 8.3, 8.4, 8.5

## Essential Commands

### Installation and Setup
```bash
composer install
```

### Linting and Code Standards
```bash
# Check code against Fox91CodingStandard
./vendor/bin/phpcs --standard=Fox91CodingStandard <path>

# Auto-fix code style issues
./vendor/bin/phpcbf --standard=Fox91CodingStandard <path>

# List installed coding standards
./vendor/bin/phpcs -i

# Show all sniffs included in a standard
./vendor/bin/phpcs --standard=Fox91CodingStandard -e
```

### Testing
```bash
# Run the test suite (auto-fixes test inputs for all PHP versions)
./tests/run.sh
```

The test script:
- Creates fixed versions for PHP 7.4, 8.0, 8.1, 8.2, 8.3, 8.4, and 8.5
- Runs `phpcbf` against test inputs in `tests/input/`
- Outputs fixed files to `tests/fixed/php-{version}/{Standard}/`

### Validation
```bash
# Validate composer.json
composer validate --strict

# Validate with dependencies
composer validate --strict --with-dependencies
```

## Architecture

### Ruleset Structure

The project defines **Fox91CodingStandard** (`Fox91CodingStandard/ruleset.xml`):
- Imports rules from Generic, PSR1, PSR2, PSR12, Squiz, PHPCompatibility, SlevomatCodingStandard, and VariableAnalysis
- Configures forbidden functions (e.g., forbids `compact`, `extract`, `create_function`)
- Enforces strict types declaration
- Requires type hints for parameters, properties, and return values
- Enforces trailing commas in arrays and function calls
- Several sniffs set to "warning" level for flexibility

### Dependencies

The project automatically installs these PHP_CodeSniffer standards via Composer:
- `squizlabs/php_codesniffer`: Core PHPCS
- `slevomat/coding-standard`: Advanced sniffs
- `phpcompatibility/php-compatibility`: Cross-version compatibility checks
- `sirbrillig/phpcs-import-detection`: Import/use statement analysis
- `sirbrillig/phpcs-variable-analysis`: Variable usage detection
- `dealerdirect/phpcodesniffer-composer-installer`: Auto-registration of standards

Optional:
- `pheromone/phpcs-security-audit`: Security vulnerability detection

### Key Configuration Points

**Indentation**: 4 spaces (tabs disallowed)
**Strict Types**: Required with specific formatting (`declare(strict_types=1);`)
**Type Hints**: Array type hints disallowed (use specific types like `array<string>` in docblocks)
**Trailing Commas**: Required in arrays and function calls
**Yoda Conditions**: Disallowed
**Function Length**: Warning at 40 lines

## CI/CD

GitHub Actions workflow (`.github/workflows/php-ci.yml`) tests against:
- All supported PHP versions (7.4 through 8.5)
- Both "lowest" and "highest" dependency versions
- Validates composer.json
- Lists installed standards and sniffs

## Important Notes

- The test suite requires multiple PHP versions installed locally (php7.4, php8.0, etc.)
- PHPCompatibility checks require setting `testVersion` config (e.g., `--runtime-set testVersion 7.4-`)
- When modifying the ruleset, test against all PHP versions using `./tests/run.sh`

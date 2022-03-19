#!/usr/bin/env bash
set -Eeuo pipefail

test() {
  typeset folder="${1}"
  typeset standard="${2}"
  typeset php_version="${3}"

  echo "${php_version}: ${standard}"

  rm -rf "./tests/${folder}"
  cp -pr ./tests/input "./tests/${folder}"
  "php${php_version}" ./vendor/bin/phpcbf --colors --standard="${standard}" "./tests/${folder}" \
    || true
}

main() {
  echo "START"

  test 'fixed-old' 'Fox91OldCodingStandard' '7.4'

  test 'fixed-7.4' 'Fox91CodingStandard' '7.4'
  test 'fixed-8.0' 'Fox91CodingStandard' '8.0'
  test 'fixed-8.1' 'Fox91CodingStandard' '8.1'

  echo "END"
}
main

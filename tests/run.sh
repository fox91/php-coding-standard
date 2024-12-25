#!/usr/bin/env bash
set -Eeuo pipefail

typeset _progdir
_progdir=$(readlink -m "$(dirname "$(dirname "$0")")")
[ -z "${PROGDIR-}" ] && typeset -r PROGDIR="${_progdir}"
unset _progdir

main() {
  echo "START"

  typeset std php_version
  for php_version in 7.4 8.{0..4}; do
    rm -rf "${PROGDIR}/tests/fixed/php-${php_version}"
    mkdir -p "${PROGDIR}/tests/fixed/php-${php_version}"
    for std in Fox91CodingStandard Fox91CodingStandardStrict; do
      cp -pr "${PROGDIR}/tests/input/" "${PROGDIR}/tests/fixed/php-${php_version}/${std}/"
      "php${php_version}" "${PROGDIR}/vendor/bin/phpcbf" \
        --colors \
        --standard="${std}" \
        --runtime-set testVersion "${php_version}-" \
        "${PROGDIR}/tests/fixed/php-${php_version}/${std}/" \
        || true
    done
  done

  echo "END"
}
main

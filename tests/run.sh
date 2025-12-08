#!/usr/bin/env bash
set -Eeuo pipefail

typeset _progdir
_progdir=$(readlink -m "$(dirname "$(dirname "$0")")")
[ -z "${PROGDIR-}" ] && typeset -r PROGDIR="${_progdir}"
unset _progdir

main() {
  echo "START"

  typeset -a php_versions=(
    7.4
    8.0
    8.1
    8.2
    8.3
    8.4
    8.5
  )
  typeset -a stds=(
    Fox91CodingStandard
  )

  typeset std php_version
  for php_version in "${php_versions[@]}"; do
    rm -rf "${PROGDIR}/tests/fixed/php-${php_version}"
    mkdir -p "${PROGDIR}/tests/fixed/php-${php_version}"

    rm -rf "${PROGDIR}/composer.lock" "${PROGDIR}/vendor/"
    "php${php_version}" "$(which composer)" install

    for std in "${stds[@]}"; do
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

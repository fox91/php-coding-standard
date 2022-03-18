#!/usr/bin/env bash
set -Eeuo pipefail

test() {
  typeset folder="${1}"
  typeset standard="${2}"

  echo "${standard}"

  rm -rf "./tests/${folder}"
  cp -pr ./tests/input "./tests/${folder}"
  ./vendor/bin/phpcbf --colors --standard="${standard}" "./tests/${folder}" || true
}

main() {
  echo "START"

  test 'fixed-my' 'Fox91CodingStandard'
  # test 'fixed-my-strict' 'Fox91CodingStandardStrict'
  test 'fixed-doctrine' 'Doctrine'
  test 'fixed-doctrine-mod' 'Fox91ModDoctrine'

  echo "END"
}
main

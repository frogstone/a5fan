#!/bin/sh

cd $(dirname $0)

sass --watch --style compressed --sourcemap=none .:../css
#sass --watch --style expanded --sourcemap=none .:../css
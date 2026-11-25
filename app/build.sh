#!/bin/sh
# Build the runtime artifact for the Node.js 20 FunctionWeb runtime.
set -eu

export NPM_CONFIG_REGISTRY='https://registry.npmjs.org/'
npm ci --registry='https://registry.npmjs.org/'
npm prune --omit=dev

mkdir -p dist
cp server.js package.json run.sh dist/
cp -R lib views public data assets dist/
cp -R node_modules dist/node_modules
chmod 755 dist/run.sh

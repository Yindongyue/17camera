#!/bin/sh
# Start the archive server in the foreground on the platform-provided port.
set -eu
exec node server.js

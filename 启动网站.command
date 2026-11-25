#!/bin/bash
# 本地启动《逸憩摄影》旧站：MySQL 3307 + PHP 内置服务器 8080
set -e
cd "$(dirname "$0")"

RUNTIME="$PWD/runtime"
MYSQL_BASE="$RUNTIME/mysql-8.0.29-macos12-arm64"
MYSQL_DATA="$RUNTIME/mysql-data"
PHP_BIN="$RUNTIME/php84/bin/php"
SITE="$PWD/site"
URL="http://127.0.0.1:8080/"

if [ ! -x "$PHP_BIN" ]; then
  echo "找不到 PHP：$PHP_BIN"
  exit 1
fi

if nc -z 127.0.0.1 8080 2>/dev/null; then
  echo "网站已经在运行：$URL"
  open "$URL"
  exit 0
fi

if ! nc -z 127.0.0.1 3307 2>/dev/null; then
  echo "启动 MySQL ..."
  "$MYSQL_BASE/bin/mysqld" --no-defaults \
    --basedir="$MYSQL_BASE" --datadir="$MYSQL_DATA" \
    --port=3307 --socket=/tmp/yiqi_mysql.sock \
    --pid-file="$MYSQL_DATA/mysqld.pid" \
    --log-error="$RUNTIME/mysql.log" --mysqlx=0 \
    --bind-address=127.0.0.1 &
  MYSQL_PID=$!
  for i in {1..30}; do
    nc -z 127.0.0.1 3307 2>/dev/null && break
    sleep 0.5
  done
fi

echo "启动 PHP ..."
"$PHP_BIN" -c "$PWD/php.ini" -S 127.0.0.1:8080 -t "$SITE" &
PHP_PID=$!

sleep 1
open "$URL"
echo "网站已启动：$URL"
echo "按 Ctrl+C 停止。"
trap 'kill $PHP_PID ${MYSQL_PID:-} 2>/dev/null; exit 0' INT TERM
wait

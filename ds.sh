#!/usr/bin/env bash
projectName=`pwd | awk -F "/" '{print $NF}'`
docker run -d -v $PWD:/home/web/code -P -p 80:80 --name $projectName brucehong/php-dev
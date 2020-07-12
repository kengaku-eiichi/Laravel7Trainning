#!/bin/bash

dnf -y install https://dl.fedoraproject.org/pub/epel/epel-release-latest-8.noarch.rpm
dnf -y install https://rpms.remirepo.net/enterprise/remi-release-8.rpm

dnf -y install dnf-utils
dnf -y module install php:remi-7.4
dnf -y install php-iconv php-gd php-mysql

unalias php

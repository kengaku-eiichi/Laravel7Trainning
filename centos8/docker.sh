#!/bin/bash

dnf -y install device-mapper-persistent-data lvm2 wget
dnf config-manager --add-repo https://download.docker.com/linux/centos/docker-ce.repo
dnf makecache
dnf -y install docker-ce --nobest
systemctl enable --now docker
usermod -aG docker $USER
newgrp docker
docker version

path="/usr/local/bin/docker-compose"
curl -L https://github.com/docker/compose/releases/download/1.21.2/docker-compose-$(uname -s)-$(uname -m) -o ${path}
chmod +x ${path}
${path} --version && cd /git/Laravel7Trainning && ${path} up -d --build

path="/etc/profile.d/composer.sh"
[ -f ${path} ] || ln -snf "/vagrant${path}" ${path}

path="/etc/profile.d/php.sh"
[ -f ${path} ] || ln -snf "/vagrant${path}" ${path}

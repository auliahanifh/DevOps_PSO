#!/bin/bash

set -e

STACK_NAME="devops_pso"
COMPOSE_FILE="/home/devops-pso/docker-compose.yml" # sesuaikan path jika perlu

echo "[INFO] Mengecek apakah Docker terinstal..."
if ! command -v docker &> /dev/null; then
    echo "[INFO] Docker tidak ditemukan. Installing Docker."
    echo "[INFO] Add Docker's official GPG key."
    sudo apt-get update
    sudo apt-get install ca-certificates curl -y
    sudo install -m 0755 -d /etc/apt/keyrings
    sudo curl -fsSL https://download.docker.com/linux/ubuntu/gpg -o /etc/apt/keyrings/docker.asc
    sudo chmod a+r /etc/apt/keyrings/docker.asc

    echo "[INFO] Add the repository to Apt sources."
    echo \
      "deb [arch=$(dpkg --print-architecture) signed-by=/etc/apt/keyrings/docker.asc] https://download.docker.com/linux/ubuntu \
      $(. /etc/os-release && echo "${UBUNTU_CODENAME:-$VERSION_CODENAME}") stable" | \
      sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
      sudo apt-get update
    echo "[INFO] Installing Docker Package."
    sudo apt-get install docker-ce docker-ce-cli containerd.io docker-buildx-plugin docker-compose-plugin -y
    echo "[INFO] Docker Berhasil Diinstall."
fi

echo "[INFO] Docker ditemukan."

echo "[INFO] Mengecek apakah Docker Swarm sudah di-init..."
if [ "$(docker info --format '{{.Swarm.ControlAvailable}}')" != "true" ]; then
    echo "[INFO] Docker Swarm belum di-init. Menjalankan 'docker swarm init'..."
    docker swarm init --advertise-addr="$SWARM_ADVERTISE_ADDR"
else
    echo "[INFO] Docker Swarm sudah aktif."
fi

echo "[INFO] Mengecek apakah file docker-compose.yml tersedia..."
if [ ! -f "$COMPOSE_FILE" ]; then
    echo "[ERROR] File $COMPOSE_FILE tidak ditemukan!"
    exit 1
fi

echo "[INFO] Meng-update stack '$STACK_NAME' dengan file $COMPOSE_FILE..."
docker stack deploy -c "$COMPOSE_FILE" "$STACK_NAME"

echo "[INFO] Deployment selesai."
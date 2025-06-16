resource "null_resource" "remote_deploy" {
  provisioner "remote-exec" {
    inline = [
      "mkdir -p /home/devops-pso"
    ]

    connection {
      type     = "ssh"
      host     = var.server_ip
      user     = var.username
      password = var.password
    }
  }

  provisioner "file" {
    source      = "../deploy.sh"
    destination = "/home/deploy.sh"

    connection {
      type     = "ssh"
      host     = var.server_ip
      user     = var.username
      password = var.password
    }
  }

  provisioner "file" {
    source      = "../docker-compose.yml"
    destination = "/home/devops-pso/docker-compose.yml"

    connection {
      type     = "ssh"
      host     = var.server_ip
      user     = var.username
      password = var.password
    }
  }

  provisioner "file" {
    source      = "../trial_laravel.sql"
    destination = "/home/devops-pso/trial_laravel.sql"

    connection {
      type     = "ssh"
      host     = var.server_ip
      user     = var.username
      password = var.password
    }
  }

  provisioner "remote-exec" {
    inline = [
      "bash -c 'cat <<EOF > /home/devops-pso/.env
      DB_HOST=${var.db_host}
      DB_USERNAME=${var.db_username}
      DB_PASSWORD=${var.db_password}
      DB_DATABASE=${var.db_database}
      EOF'"
      ,
      "export SWARM_ADVERTISE_ADDR=${var.swarm_advertise_addr}",
      "chmod +x /home/deploy.sh",
      "/home/deploy.sh"
    ]

    connection {
      type     = "ssh"
      host     = var.server_ip
      user     = var.username
      password = var.password
    }
  }

  triggers = {
    always_run = timestamp()
  }
}
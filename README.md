## 🚀 Overview

**DevOps_PSO** is a robust, containerized PHP-based project designed for rapid local development and seamless DevOps workflow integration. The repository leverages Docker for consistent and reproducible environments, making it easy to spin up and hack on the application regardless of your host OS.

## 📦 Tech Stack

- **Backend:** PHP
- **Frontend:** Blade Templates
- **DevOps:** Docker, Shell, HCL
- **Other:** See [language composition](#) for details

---

## 🛠️ Getting Started

### 1. Clone the Repository

Start by cloning the repository to your local machine:

```bash
git clone https://github.com/auliahanifh/DevOps_PSO.git
cd DevOps_PSO
```

---

### 2. Run Locally with Docker

This project provides a `Dockerfile` and/or `docker-compose.yml` for easy setup. Follow the steps below to get started:

#### Using Docker Compose (Recommended)

If a `docker-compose.yml` file is present:

```bash
# Build and start all services
docker-compose up --build
```

- The application should now be running locally.
- Access the application in your browser at: `http://localhost:8080` (or the port specified in your compose file).

#### Using Docker Only

If you prefer to run the app using Docker directly:

```bash
# Build the Docker image
docker build -t devops_pso_app .

# Run the container
docker run -p 8080:80 devops_pso_app
```

- Replace `8080` with your preferred local port if needed.

---

## 📝 Additional Notes

- **Environment Variables:** Review `.env.example` or configuration files to set up any required environment variables.
- **Database Setup:** If the application needs a database, make sure to run database migrations or seeders as described in the project documentation.
- **Customization:** Feel free to modify the Docker setup to fit your local development needs.

---

## 🤝 Contributing

Contributions, issues, and feature requests are welcome! You can fork this repository for contribution.

---

## 📄 License

This project is licensed under the terms of the [MIT license](LICENSE).

---

## 💡 Acknowledgement

Thanks to all contributors and the open-source community!

---

> _Happy Coding! 🚀_

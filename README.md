## 🚀 Overview

**DevOps_PSO** is a laravel application for product management used by PT. XYZ

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

## 🧑‍💻 CI/CD Workflow

DevOps_PSO have been using pipeline CI/CD with GitHub Actions. Here are the breakdown the pipeline workflow when committed codes to the main branch in the repository when releasing:

1. **Automation Testing**
   - Every push, pull request, or release to the `main` branch triggers the workflow.
   - The system sets up the environment (PHP, Node.js, and MySQL database).
   - Dependencies and environment variables are configured automatically.
   - The database is migrated and seeded for testing.
   - All testing are run in paralel for ensure the application works correctly.

2. **Static Application Security Testing (SAST)**
   - As part of the testing phase, Larastan is utilized for Static Application Security Testing (SAST).
   - Larastan analyzes the PHP codebase without executing it, identifying potential code quality issues, bugs, and security vulnerabilities like insecure coding practices, unhandled exceptions, and potential SQL injection points.
   - This static analysis helps catch issues early in the development cycle, improving code robustness and security.

3. **Build Docker Image**
   - If all tests pass, the pipeline builds a new Docker image for the application.
   - The docker image is pushed to the Docker Registry using secure credentials stored in GitHub Secrets.

4. **Automation Deployment**
   - Deployment is triggered automatically when a release is published.
   - Terraform is used to provision infrastructure and deploy the application to the server, based on Infrastructure as Code (IaC) configuration.
> For more detailed information, take a look at [`pipeline.yml`](.github/workflows/pipeline.yml) file.

---

## 📊 Monitoring

**DevOps_PSO** integrates with Prometheus for application monitoring and Grafana for visualization.

**Requirements for Monitoring**
To anable To enable comprehensive monitoring, ensure the following are in place:
- Laravel Prometheus Exporter: A Laravel package is required to expose application metrics. You'll need to find a package that fits your specific Laravel and PHP versions on ([Packagist](https://packagist.org/)). Search for "laravel prometheus" and choose a well-maintained package like ensi/laravel-prometheus or similar. Install it via Composer, here's the example:

```bash
composer require ensi/laravel-prometheus
```
Follow the package's documentation for configuration details, including publishing assets and setting up routes for metrics exposure.
- **Redis Extension** : For optimal performance and data aggregation, ensure the Redis PHP extension is installed and enabled. This is crucial for collecting certain types of application metrics.
- **APCU Extension**: The APCu (Alternative PHP Cache Userland) extension can be beneficial for caching and improving the performance of metric collection. Install and enable it for enhanced monitoring capabilities.
- **Prometheus Setup**: Ensure your Prometheus configuration includes a scrape job targeting the metrics endpoint (e.g., /metrics) exposed by the Laravel application. The Prometheus server should have network access to your application.
- **Grafana Setup**: Configure a Prometheus data source in Grafana pointing to your Prometheus server. Import or create Grafana dashboards to visualize the metrics collected from DevOps_PSO. Recommended metrics to visualize include request counts, error rates, response times, database query performance, and queue sizes.

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

# Employee Happiness Chart

  

This project is a chart representation of employee happiness, utilizing Vue.js for the front end, Lumen for the API, and MySQL for the database. This README provides steps to set up the project locally.

  

## Prerequisites

 
- Ensure you have Docker and Docker Compose installed on your machine.

- Clone or download the project repository to your local machine.

  
## Setup Instructions

  
### 1. Navigate to the Project Directory

```
cd  /employee_happiness_cmparison
```

### 2. Build and Run the Containers

```docker-compose up -d```

This command will read the docker-compose.yml file, build the necessary images (if they don't exist locally), and start the containers.

This command will read the `docker-compose.yml` file, build the necessary images, and start the containers.

### 3. Migrate and Seed the Lumen Database

Run the following command to migrate and seed the Lumen database:

```
docker-compose exec lumen php artisan migrate --seed
```

###  4. Access the Applications and Test 

- **Vue.js App:** Open a web browser and navigate to [http://localhost:8080](http://localhost:8080).
- **Lumen API:** Access the API at [http://localhost:8000](http://localhost:8000).
- **MySQL Database:** You can connect to the MySQL database using any database client with the following credentials:
  - Host: localhost
  - Port: 3306
  - User: user
  - Password: secret
  - Database: employee-happiness-chart

### Conclusion
 Vue and Lumen are running locally on your machine. 
 
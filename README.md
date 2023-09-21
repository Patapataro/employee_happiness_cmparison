<!-- Title  -->
Employee Happiness Chart

<!-- header -->
Prerequisites

<!-- List items -->
Ensure you have Docker and Docker Compose installed on your machine.
Clone or download the project repository to your local machine.

<!-- Header 2 -->
1. Navigate to the Project Directory

<!-- Path to project -->
/dir

<!-- Header 3 -->
2. Build and Start the Containers

Use Docker Compose to build and start the containers:

cmd: 
```docker-compose up -d```

This command will read the docker-compose.yml file, build the necessary images (if they don't exist locally), and start the containers.

<!-- Header 3 -->
3. Access the Applications

Vue.js App: Open a web browser and navigate to http://localhost:8080.
Lumen API: Access the API at http://localhost:8000.
MySQL Database: You can connect to the MySQL database using any database client with the following credentials:
    Host: localhost
    Port: 3306
    User: user
    Password: secret
    Database: employee-happiness-chart


<!-- Header -->
Migrate and seed the lumen database
```docker-compose exec lumen php artisan migrate --seed```

<!-- Header Conclusion -->
Conclusion

You should now have the Vue.js, Pinia, and Lumen project running locally on your machine.
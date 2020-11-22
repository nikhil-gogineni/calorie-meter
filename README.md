# Calorie Meter
A web application that helps people in tracking daily intake calories to reach their weight goals.

Calorie Meter is built using HTML, CSS & PHP following the MVC architecture.


# Running the application

1. Clone and run the source code
2. Create a the following tables in the database 

`CREATE TABLE calorie_meter.users ( user_id INT NOT NULL AUTO_INCREMENT , email VARCHAR(50) NOT NULL, PRIMARY KEY (user_id) ) ENGINE = InnoDB;`

`CREATE TABLE calorie_meter.calorie_count ( id INT NOT NULL AUTO_INCREMENT, user_id INT NOT NULL , date VARCHAR(20) NOT NULL, item VARCHAR(50), calories INT, PRIMARY KEY (id) ) ENGINE = InnoDB;`

3. Update the database connection inside the Database class of the project.

Cheers! You are good to go!

# Project Details

1. Login Screen
   - Login screen enables the multi-user functionality.
2. Home screen
   - Provision to change the user.
   - Fields to enter the calorie intake one after the other.
   - Provision to upload a file to add the calories.
   - A Table which shows the current day calory intake.
3. Calorie Record screen
   - Shows the entire record of calorie intake each day in a table.

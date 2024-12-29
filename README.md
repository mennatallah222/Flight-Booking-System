# ✈️ Flight Booking System

The **Flight Booking System** is a web application designed to facilitate the management and booking of flights. The system allows companies to register and add flights, and passengers to book available flights. The application includes user roles such as admin, company, and passenger with specific functionalities for each role.

## 🚀 Features
- **User Registration and Login**: Users can register and log in as a company or passenger.
- **Company Management**: Companies can add, view, and manage flights.
- **Passenger Management**: Passengers can book flights and view their booking history.
- **Flight Management**: Add, edit, and delete flight itineraries.
- **Itinerary Management**: Define detailed itineraries for each flight, including departure and arrival times for different cities.

## 🛠️ Technologies Used
- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP
- **Database**: MySQL

## 📋 Prerequisites
- **PHP**: Version 7.4 or higher
- **MySQL**: Version 5.7 or higher
- **Web Server**: Apache or Nginx

## 🛠️ Installation

1. **Clone the repository**:
    ```sh
    git clone https://github.com/mennatallah222/Flight-Booking-System.git
    cd flight-booking
    ```

2. **Create the database**:
    ```sql
    CREATE DATABASE flight_booking;
    USE flight_booking;
    ```

3. **Set up the tables**:
    ```sql
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(255) UNIQUE NOT NULL,
        password VARCHAR(255) NOT NULL,
        name VARCHAR(255) NOT NULL,
        tel VARCHAR(20) NOT NULL,
        role VARCHAR(50) NOT NULL,
        account VARCHAR(255) NULL
    );

    CREATE TABLE companies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        bio TEXT,
        address VARCHAR(255),
        location VARCHAR(255),
        logo TEXT,
        account DECIMAL(10, 2),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );

    CREATE TABLE passengers (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT NOT NULL,
        photo TEXT,
        passport_img TEXT,
        account DECIMAL(10, 2),
        FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
    );

    CREATE TABLE flights (
        id INT AUTO_INCREMENT PRIMARY KEY,
        flight_uid VARCHAR(255) UNIQUE NOT NULL,
        name VARCHAR(255) NOT NULL,
        passengers_count INT,
        registered_passengers INT,
        pending_passengers INT,
        fees DECIMAL(10, 2),
        start_time TIMESTAMP default current_timestamp,
        end_time TIMESTAMP default current_timestamp,
        is_completed BOOLEAN,
        company_id INT,
        is_cancelled BOOLEAN DEFAULT FALSE,
        FOREIGN KEY (company_id) REFERENCES companies(id) ON DELETE SET NULL
    );

    CREATE TABLE itineraries (
        id INT AUTO_INCREMENT PRIMARY KEY,
        flight_id INT NOT NULL,
        from_city VARCHAR(255) NOT NULL,
        to_city VARCHAR(255) NOT NULL,
        from_arrival DATETIME NOT NULL,
        from_departure DATETIME NOT NULL,
        to_arrival DATETIME NOT NULL,
        to_departure DATETIME NOT NULL,
        FOREIGN KEY (flight_id) REFERENCES flights(id) ON DELETE CASCADE
    );

    CREATE TABLE flight_passengers (
        flight_id INT NOT NULL,
        passenger_id INT NOT NULL,
        status VARCHAR(50),
        PRIMARY KEY (flight_id, passenger_id),
        FOREIGN KEY (flight_id) REFERENCES flights(id) ON DELETE CASCADE,
        FOREIGN KEY (passenger_id) REFERENCES passengers(id) ON DELETE CASCADE
    );
    ```

    > Or you can navigate to `/db/schema.sql` to find the database schema.

4. **Set up the database connection**:
    Update the `db.php` file with your database credentials:
    ```php
    <?php
    $pdo = new PDO('mysql:host=localhost;dbname=flight_booking', 'your_username', 'your_password');
    ?>
    ```

5. **Run the application**:
    Place the project files in your web server's root directory and open the application in your browser.

## 📚 Usage

### Registering a Company
1. Navigate to the registration page and select "Company" as the user type.
2. Fill out the registration form with your company details.
3. Complete the company-specific registration form to add additional details like bank account number and company logo.

### Registering a Passenger
1. Navigate to the registration page and select "Passenger" as the user type.
2. Fill out the registration form with your personal details.
3. Complete the passenger-specific registration form to add additional details like bank account number and passport image.

### Adding Flights
1. Log in as a company.
2. Navigate to the "Add Flight" page.
3. Fill out the flight details including flight UID, name, fees, number of passengers, start and end times.
4. Add itineraries by specifying the departure and arrival cities along with their respective times.

### Booking Flights
1. Log in as a passenger.
2. Browse available flights and book the desired flight.
3. View your booking history.

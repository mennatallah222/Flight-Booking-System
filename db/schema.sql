CREATE DATABASE flight_booking;
USE flight_booking;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    role VARCHAR(50) NOT NULL,
    account VARCHAR(225) NOT NULL,
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
    name VARCHAR(255) NOT NULL,
    passengers_count INT,
    registered_passengers INT,
    pending_passengers INT,
    fees DECIMAL(10, 2),
    start_time TIMESTAMP,
    end_time TIMESTAMP,
    is_completed BOOLEAN,
    company_id INT,
    is_cancelled BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (company_id) REFERENCES companies(id) ON DELETE SET NULL
);



CREATE TABLE flight_passengers (
    flight_id INT NOT NULL,
    passenger_id INT NOT NULL,
    status VARCHAR(50),
    PRIMARY KEY (flight_id, passenger_id),
    FOREIGN KEY (flight_id) REFERENCES flights(id) ON DELETE CASCADE,
    FOREIGN KEY (passenger_id) REFERENCES passengers(id) ON DELETE CASCADE
);





CREATE TABLE itineraries (
    id INT AUTO_INCREMENT PRIMARY KEY,
    flight_id INT NOT NULL,
    city VARCHAR(255) NOT NULL,
    arrival_time DATETIME NOT NULL,
    departure_time DATETIME NOT NULL,
    FOREIGN KEY (flight_id) REFERENCES flights(id) ON DELETE CASCADE
);



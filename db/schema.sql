
CREATE DATABASE flight_booking;
USE flight_booking;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    role VARCHAR(50) NOT NULL
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
    flight_uid VARCHAR(255) NOT NULL,
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
    flight_id INT,
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

CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_flights_company_id ON flights(company_id);
CREATE INDEX idx_flight_passengers_flight_id ON flight_passengers(flight_id);
CREATE INDEX idx_flight_passengers_passenger_id ON flight_passengers(passenger_id);

DELIMITER $$

CREATE TRIGGER flight_completion_check_before_insert
BEFORE INSERT ON flights
FOR EACH ROW
BEGIN
    IF NEW.registered_passengers >= NEW.passengers_count THEN
        SET NEW.is_completed = TRUE;
    ELSE
        SET NEW.is_completed = FALSE;
    END IF;
END $$

DELIMITER ;

SELECT * FROM companies;
SELECT * FROM passengers;
SELECT * FROM users;
SELECT * FROM flights;

ALTER TABLE users
ADD COLUMN account VARCHAR(255);

ALTER TABLE users
MODIFY COLUMN account VARCHAR(255) NULL;

ALTER TABLE itineraries
CHANGE COLUMN city FROM_CITY VARCHAR(255) NOT NULL;

ALTER TABLE itineraries
ADD COLUMN to_city VARCHAR(255) NOT NULL
AFTER from_city;

ALTER TABLE itineraries
MODIFY COLUMN departure_time DATETIME NOT NULL,
MODIFY COLUMN arrival_time DATETIME NOT NULL;

SELECT * FROM itineraries;



USE flight_booking;

ALTER TABLE flights ADD COLUMN from_city VARCHAR(255), ADD COLUMN to_city VARCHAR(255)
;
ALTER TABLE flight_passengers
ADD COLUMN payment VARCHAR(255) NOT NULL;

ALTER TABLE flight_passengers
ADD COLUMN company_id INT;

ALTER TABLE flight_passengers
ADD CONSTRAINT fk_company_id
FOREIGN KEY (company_id) REFERENCES companies(id) ON DELETE CASCADE;


CREATE TABLE company_messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    passenger_id INT NOT NULL,
    company_id INT NOT NULL,
    company_email VARCHAR(255) NOT NULL,
    passenger_email VARCHAR(255) NOT NULL,
    message_content TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (passenger_id) REFERENCES passengers(id) ON DELETE CASCADE,
    FOREIGN KEY (company_id) REFERENCES companies(id) ON DELETE CASCADE
);
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    tel VARCHAR(20) NOT NULL,
    role VARCHAR(50) NOT NULL
);

--companies table
CREATE TABLE companies (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    bio TEXT,
    address VARCHAR(255),
    location VARCHAR(255),
    logo TEXT,
    account NUMERIC
);

--passengers table
CREATE TABLE passengers (
    id SERIAL PRIMARY KEY,
    user_id INT NOT NULL REFERENCES users(id) ON DELETE CASCADE,
    photo TEXT,
    passport_img TEXT,
    account NUMERIC
);

--flights table
CREATE TABLE flights (
    id SERIAL PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    passengers_count INT,
    registered_passengers INT,
    pending_passengers INT,
    fees NUMERIC,
    start_time TIMESTAMP,
    end_time TIMESTAMP,
    is_completed BOOLEAN,
    company_id INT REFERENCES companies(id) ON DELETE SET NULL
);

--itineraries table
CREATE TABLE itineraries (
    id SERIAL PRIMARY KEY,
    flight_id INT REFERENCES flights(id) ON DELETE CASCADE,
    city VARCHAR(255) NOT NULL,
    arrival_time TIMESTAMP,
    departure_time TIMESTAMP
);

--flight_passengers table
CREATE TABLE flight_passengers (
    flight_id INT NOT NULL REFERENCES flights(id) ON DELETE CASCADE,
    passenger_id INT NOT NULL REFERENCES passengers(id) ON DELETE CASCADE,
    status VARCHAR(50),
    PRIMARY KEY (flight_id, passenger_id)
);

--to ensure user_id in both companies and passengers tables links back to users table
ALTER TABLE companies
    ADD CONSTRAINT fk_companies_user
    FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE;

ALTER TABLE passengers
    ADD CONSTRAINT fk_passengers_user
    FOREIGN KEY (user_id) REFERENCES users(id)
    ON DELETE CASCADE;

--indexes for faster lookup
CREATE INDEX idx_users_email ON users(email);
CREATE INDEX idx_flights_company_id ON flights(company_id);
CREATE INDEX idx_flight_passengers_flight_id ON flight_passengers(flight_id);
CREATE INDEX idx_flight_passengers_passenger_id ON flight_passengers(passenger_id);


---to check if the flight is completed, then trigger the is_completed column
create or replace function update_flight_completed_status()
returns trigger as $$
begin
    --check if the flight is full
    if NEW.registered_passengers >= NEW.passengers_count then
        NEW.is_completed := TRUE;
    else
        NEW.is_completed := FALSE;
    end if;
    return new;
end;
$$ language plpgsql;
----------------------------------------
create trigger flight_completion_check
before insert or update on flights
for each row
execute function update_flight_completed_status();

select * from users;
select * from flights;
select * from companies;

alter table flights add column is_cancelled boolean default false;
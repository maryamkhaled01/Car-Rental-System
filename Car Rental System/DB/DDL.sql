-- Create Car Rental System Database
create database Car_Rental_System;
use Car_Rental_System;
-- Create Table Car
create table Car(
    car_id INT AUTO_INCREMENT,
    plate_id VARCHAR(10) NOT NULL UNIQUE,
    model VARCHAR(225),
    year YEAR,
    color VARCHAR(225),
    status VARCHAR(225),
    price_per_hour DECIMAL(10,2),
    CONSTRAINT PRIMARY KEY (car_id)
);

create table locations(
    loc_id int AUTO_INCREMENT,
    city varchar(225) Not NULL,
    district varchar(225) Not NULL,
    CONSTRAINT PRIMARY KEY (loc_id)
);

-- Create Table Pickup_Locations
create table Pickup_Locations(
    car_id INT,
    pickup_loc INT,
    CONSTRAINT PRIMARY KEY (car_id, pickup_loc),
	FOREIGN KEY (pickup_loc) REFERENCES locations(loc_id)

);

-- Create Table Reservation
create table Reservation(
    car_id int,
    cust_id int,
    res_date datetime,
    pickup_date datetime,
    picked_up boolean,
    pickup_loc int,
    is_ret boolean,
    ret_date datetime,
    isPaid boolean,
    CONSTRAINT PRIMARY KEY (car_id, cust_id, res_date)
);

-- Create Table Customer 
create table Customer(
    cust_id int AUTO_INCREMENT,
    last_name varchar(225) NOT NULL,
    first_name varchar(225),
    sex varchar(6),
    driving_license_no varchar(225) NOT NULL UNIQUE,
    email varchar(225),
    password varchar(225),
    birth_date date,
    phone_no varchar(225) UNIQUE,
    card_no varchar(225) UNIQUE,
    CONSTRAINT PRIMARY KEY (cust_id)
);


-- Create Table Admin
create table Admin(
    admin_id int AUTO_INCREMENT,
    last_name varchar(225) NOT NULL,
    first_name varchar(225),
    email varchar(225),
    password varchar(225),
    CONSTRAINT PRIMARY KEY (admin_id)
);


-- Create Table Payment
create table Payment(
    car_id int,
    cust_id int,
    res_date datetime,
    pay_date datetime,
    total_amount decimal(10,2),
    CONSTRAINT PRIMARY KEY (car_id, cust_id, res_date, pay_date)
);

-- 1. Add foreign key car_id in the Pickup_Locations table
ALTER TABLE Pickup_Locations
ADD CONSTRAINT FK_CAR_PICK FOREIGN KEY (car_id) REFERENCES CAR(car_id);

-- 2. Add foreign key (car_id, pickup_loc) in the Reservation table
ALTER TABLE Reservation
ADD CONSTRAINT FK_CAR_PICK_RES FOREIGN KEY (car_id, pickup_loc) REFERENCES Pickup_Locations(car_id, pickup_loc);

-- 3. Add foreign key cust_id in the Reservation table
ALTER TABLE Reservation
ADD CONSTRAINT FK_CUST_RES FOREIGN KEY (cust_id) REFERENCES CUSTOMER(cust_id);

-- 4. Add foreign key (car_id,cust_id,res_date) in the Payment table
ALTER TABLE Payment
ADD CONSTRAINT FK_RES_PAY FOREIGN KEY (car_id, cust_id, res_date) REFERENCES Reservation(car_id, cust_id, res_date);


-- Populating DB
INSERT INTO `car` (`plate_id`, `model`, `year`, `color`, `status`, `price_per_hour`) VALUES 
('123456', 'toyota', '2023', 'red', 'available', '5'),
('234567', 'kia', '2024', 'blue', 'available', '5'),
('345678', 'BMW', '2022', 'black', 'available', '15'),
('456789', 'Audi', '2020', 'grey', 'available', '20'),
('567890', 'Ford', '2019', 'red', 'available', '25'),
('678901', 'Honda', '2021', 'blue', 'available', '10'),
('789012', 'porsche', '2023', 'black', 'available', '50'),
('890123', 'Chevrolet', '2018', 'grey', 'available', '15'),
('901234', 'Fiat', '2021', 'red', 'available', '5'),
('012345', 'Hyundai', '2020', 'blue', 'available', '5'),
('135791', 'kia', '2010', 'black', 'available', '5'),
('246802', 'Honda', '2022', 'grey', 'available', '5');

INSERT INTO `locations` (`city`, `district`) VALUES ('Alexandria', 'Smouha');
INSERT INTO `locations` (`city`, `district`) VALUES ('Alexandria', 'Miami');
INSERT INTO `locations` (`city`, `district`) VALUES ('Alexandria', 'El Ebrahimia');
INSERT INTO `locations` (`city`, `district`) VALUES ('Alexandria', 'El Manshia');
INSERT INTO `locations` (`city`, `district`) VALUES ('Cairo', 'Nasr City');
INSERT INTO `locations` (`city`, `district`) VALUES ('Cairo', 'El Maadi');
INSERT INTO `locations` (`city`, `district`) VALUES ('Cairo', '6th of October');
INSERT INTO `locations` (`city`, `district`) VALUES ('Cairo', 'El Zmalak');

INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('1', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('1', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('1', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('1', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('2', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('2', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('2', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('2', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('3', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('3', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('3', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('3', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('4', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('4', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('4', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('4', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('5', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('5', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('5', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('5', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('6', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('6', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('6', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('6', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('7', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('7', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('7', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('7', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('8', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('8', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('8', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('8', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('9', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('9', '2');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('9', '3');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('9', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('10', '5');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('10', '6');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('10', '7');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('10', '8');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('11', '5');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('11', '6');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('11', '7');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('11', '4');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('12', '5');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('12', '6');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('12', '7');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('12', '8');

INSERT INTO `customer` ( `last_name`, `first_name`, `sex`, `driving_license_no`, `email`, `password`, `birth_date`, `phone_no`, `card_no`) VALUES 
('doe', 'john', 'male', '12345', 'johndoe@test.com', 'test', '1998-01-15', '0123456789', '12345'),
('doe', 'jane', 'female', '67890', 'janedoe@test.com', 'test', '1998-01-15', '0123456780', '67890'),
('test', 'test', 'male', '13579', 'test@test.com', 'test', '1998-01-15', '0123456781', '13579'),
('arida', 'sophia', 'female', '24680', 'johndoe@test.com', 'test', '1998-01-15', '0123456782', '24680');

INSERT INTO `admin` ( `last_name`, `first_name`, `email`, `password`) VALUES ( 'admin', 'admin', 'admin@admin.com', 'admin');


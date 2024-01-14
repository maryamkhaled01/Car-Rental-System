INSERT INTO `car` (`car_id`, `plate_id`, `model`, `year`, `color`, `status`, `price_per_hour`) VALUES ('4', '3456', 'porsh', '2023', 'blue', 'available', '5');
UPDATE car SET status = 'available' WHERE car_id=1;
UPDATE car SET status = 'available' WHERE car_id=2;

INSERT INTO `customer` (`last_name`, `first_name`, `sex`, `driving_license_no`, `city`, `state`, `street`, `zipcode`, `email`, `password`, `birth_date`) VALUES ('arida', 'sophia', 'female', '123456', 'alex', 'alex', '50', '1234', 'test@test.com', 'test', '2001-10-22');


INSERT INTO `locations` (`city`, `district`) VALUES ('Alexandria', 'Smouha');
INSERT INTO `locations` (`city`, `district`) VALUES ('Alexandria', 'Miami');
INSERT INTO `locations` (`city`, `district`) VALUES ('Alexandria', 'El Ebrahimia');
INSERT INTO `locations` (`city`, `district`) VALUES ('Alexandria', 'El Manshia');
INSERT INTO `locations` (`city`, `district`) VALUES ('Cairo', 'Nasr City');
INSERT INTO `locations` (`city`, `district`) VALUES ('Cairo', 'El Maadi');
INSERT INTO `locations` (`city`, `district`) VALUES ('Cairo', '6th of October');
INSERT INTO `locations` (`city`, `district`) VALUES ('Cairo', 'El Zmalak');


ALTER TABLE reservation
ADD isPaid boolean DEFAULT '0';


INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('4', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('5', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('6', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('7', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('8', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('10', '1');
INSERT INTO `pickup_locations` (`car_id`, `pickup_loc`) VALUES ('11', '1');
-- Create the database if it does not exist
CREATE DATABASE IF NOT EXISTS hospital;

-- Use the hospital database
USE hospital;

-- Create the registration table
CREATE TABLE IF NOT EXISTS registration (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    passwords VARCHAR(255) NOT NULL,
    name VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    phoneno VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL
);

-- Create the appointment table
CREATE TABLE IF NOT EXISTS appointment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(255) NOT NULL,
    patient_age INT NOT NULL,
    patient_phoneno VARCHAR(20) NOT NULL,
    disease VARCHAR(255) NOT NULL,
    department VARCHAR(255) NOT NULL,
    doctor VARCHAR(255) NOT NULL,
    appointment_date DATETIME DEFAULT CURRENT_TIMESTAMP,
    appointment_type VARCHAR(50) NOT NULL,
    online_meeting_type VARCHAR(50),
    address TEXT,
    slot VARCHAR(10) NOT NULL,
    status VARCHAR(10) NOT NULL DEFAULT 'not Done'
);

-- Create the slot_booking table
CREATE TABLE IF NOT EXISTS slot_booking (
    id INT AUTO_INCREMENT PRIMARY KEY,
    doctor VARCHAR(255) NOT NULL,
    slot VARCHAR(10) NOT NULL,
    appointment_type VARCHAR(50) NOT NULL
);

-- Create the doctor_list table
CREATE TABLE IF NOT EXISTS doctor_list (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create the feedback table
CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    patient_name VARCHAR(255) NOT NULL,
    doctor_name VARCHAR(255) NOT NULL,
    appointment_rating INT NOT NULL,
    checkup_rating INT NOT NULL,
    stars_rating INT NOT NULL,
    wait_time_rating INT NOT NULL,
    communication_rating INT NOT NULL,
    treatment_effectiveness_rating INT NOT NULL,
    feedback_text TEXT
);

-- Insert sample data into the registration table
INSERT INTO registration (username, passwords, name, age, phoneno, email)
VALUES
('user1', 'password1', 'John Doe', 30, '1234567890', 'john.doe@example.com'),
('user2', 'password2', 'Jane Doe', 25, '0987654321', 'jane.doe@example.com'),
('user3', 'password3', 'Alice Smith', 40, '5551234567', 'alice.smith@example.com');

-- Insert sample data into the appointment table
INSERT INTO appointment (patient_name, patient_age, patient_phoneno, disease, department, doctor, appointment_type, online_meeting_type, address, slot, status)
VALUES
('John Doe', 30, '1234567890', 'Cardiovascular disease', 'Cardiology', 'Dr. Anjali Desai', 'online', 'Google Meet', '', '9', 'not Done'),
('Jane Doe', 25, '0987654321', 'Neurology', 'Neurology', 'Dr. Sanjay Gupta', 'normal', '', '', '10', 'not Done'),
('Alice Smith', 40, '5551234567', 'Gynaecology & Obstetrics', 'Gynaecology & Obstetrics', 'Dr. Aarti Sharma', 'doorstep', '', '123 Main St', '11', 'not Done');

-- Insert sample data into the slot_booking table
INSERT INTO slot_booking (doctor, slot, appointment_type)
VALUES
('Dr. Anjali Desai', '9', 'online'),
('Dr. Sanjay Gupta', '10', 'normal'),
('Dr. Aarti Sharma', '11', 'doorstep');

-- Insert sample data into the doctor_list table
INSERT INTO doctor_list (email, password)
VALUES
('dr.rajesh.kumar@gmail.com', 'password1'),
('dr.priya.sharma@gmail.com', 'password2'),
('dr.vivek.patel@gmail.com', 'password3');

-- Insert sample data into the feedback table
INSERT INTO feedback (patient_name, doctor_name, appointment_rating, checkup_rating, stars_rating, wait_time_rating, communication_rating, treatment_effectiveness_rating, feedback_text)
VALUES
('John Doe', 'Dr. Anjali Desai', 5, 5, 5, 5, 5, 5, 'Excellent service'),
('Jane Doe', 'Dr. Sanjay Gupta', 4, 4, 4, 4, 4, 4, 'Good service'),
('Alice Smith', 'Dr. Aarti Sharma', 5, 5, 5, 5, 5, 5, 'Very satisfied');
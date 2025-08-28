-- This script creates the database and the table needed for the web form.

-- It's good practice to check if the database already exists to avoid errors.
-- If it exists, it will be dropped and a new one will be created.
DROP DATABASE IF EXISTS `form_db`;
-- Create a new database named 'form_db'.
-- The character set and collation are set to handle a wide range of characters, including international ones.
CREATE DATABASE `form_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- Switch to the newly created database so the following commands apply to it.
USE `form_db`;

-- Create the main table to store user submissions.
-- We'll name it 'users'.
CREATE TABLE `users` (
    -- `id`: This is the primary key for the table.
    -- `INT` means it's an integer.
    -- `(11)` is the display width.
    -- `NOT NULL` means it must have a value.
    -- `AUTO_INCREMENT` means it will automatically get a new, unique number for each record.
    `id` INT(11) NOT NULL AUTO_INCREMENT,

    -- Common Text-Based Inputs
    `fullName` VARCHAR(255) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL, -- IMPORTANT: Password will be stored as a secure hash (e.g., using password_hash() in PHP), NOT plain text.
    `searchQuery` VARCHAR(255) DEFAULT NULL,
    `website` VARCHAR(255) DEFAULT NULL,
    `phone` VARCHAR(50) DEFAULT NULL,
    `favColor` VARCHAR(10) DEFAULT NULL,

    -- Date and Time Inputs
    `dob` DATE DEFAULT NULL,
    `appointment` DATETIME DEFAULT NULL,
    `meetingTime` TIME DEFAULT NULL,
    `startMonth` VARCHAR(7) DEFAULT NULL, -- Stored as 'YYYY-MM'
    `projectWeek` VARCHAR(8) DEFAULT NULL, -- Stored as 'YYYY-W##'

-- Numeric Inputs
    `age` INT(3) DEFAULT NULL,
    `satisfaction` INT(2) DEFAULT NULL,
-- Choice Inputs
    `interests` VARCHAR(255) DEFAULT NULL, -- Checkbox values will be stored as a comma-separated string.
    `gender` VARCHAR(50) DEFAULT NULL,
    `country` VARCHAR(100) DEFAULT NULL,
    `browser` VARCHAR(100) DEFAULT NULL,

 -- File and Media
    `documents` VARCHAR(255) DEFAULT NULL, -- We'll store the file path, not the file itself.
 -- Hidden / Special Inputs
    `userId` VARCHAR(255) DEFAULT NULL,
    `bio` TEXT DEFAULT NULL, -- TEXT is used for longer strings of text.

 -- `submission_date`: A timestamp that automatically records when the entry was created.
    `submission_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
-- Set the `id` column as the primary key.
    -- A primary key is a unique identifier for each record in the table.
    PRIMARY KEY (`id`)
);

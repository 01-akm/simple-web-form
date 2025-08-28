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
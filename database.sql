-- This script creates the database and the table needed for the web form.

-- It's good practice to check if the database already exists to avoid errors.
-- If it exists, it will be dropped and a new one will be created.
DROP DATABASE IF EXISTS `form_db`;
-- Create a new database named 'form_db'.
-- The character set and collation are set to handle a wide range of characters, including international ones.
CREATE DATABASE `form_db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
-- Switch to the newly created database so the following commands apply to it.
USE `form_db`;

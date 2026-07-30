-- ==========================================
-- Student Portal Database
-- ==========================================

CREATE DATABASE IF NOT EXISTS studentportal;

USE studentportal;

-- ==========================================
-- Users Table
-- ==========================================

CREATE TABLE users (

    id INT AUTO_INCREMENT PRIMARY KEY,

    fullname VARCHAR(100) NOT NULL,

    age INT NOT NULL,

    email VARCHAR(100) NOT NULL UNIQUE,

    phone VARCHAR(15) NOT NULL,

    username VARCHAR(50) NOT NULL UNIQUE,

    password VARCHAR(255) NOT NULL,

    gender VARCHAR(20) NOT NULL,

    department VARCHAR(100) NOT NULL,

    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP

);
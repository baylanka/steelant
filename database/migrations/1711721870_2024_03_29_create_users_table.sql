CREATE TABLE  IF NOT EXISTS   users
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    name VARCHAR(100) NOT NULL,
    type ENUM("user","admin"),
    job_position VARCHAR(100) NOT NULL,
    division VARCHAR(100) NOT NULL,
    company_name VARCHAR(100) NOT NULL,
    country_or_state VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    website VARCHAR(255) NULL,
    phone VARCHAR(100) NOT NULL,
    user_name VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    newsletter BOOLEAN,
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP
);
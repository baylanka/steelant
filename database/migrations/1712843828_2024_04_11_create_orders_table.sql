CREATE TABLE  IF NOT EXISTS  orders
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    project VARCHAR(255) NOT NULL,
    status ENUM('completed','pending','rejected'),
    connector_id INT NOT NULL,
    user_id INT NOT NULL,
    number_of_piles INT NOT NULL,
    sheet_pile_name VARCHAR(255) NULL,
    delivery_address VARCHAR(255) NULL,
    postal_code VARCHAR(255) NULL,
    country VARCHAR(255) NULL,
    delivery_date DATETIME NOT NULL,
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP
);
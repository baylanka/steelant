CREATE TABLE  IF NOT EXISTS  category_contents
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    leaf_category_id BIGINT UNSIGNED,
    display_order_no INT UNSIGNED,
    type ENUM('connector', 'add_on_content'),
    element_id BIGINT UNSIGNED,
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (leaf_category_id) REFERENCES categories(id),
    UNIQUE KEY unique_type_element_id (type, element_id)
);
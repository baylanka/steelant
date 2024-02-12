CREATE TABLE category_contents
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    root_category_id INT UNSIGNED,
    display_order_no INT UNSIGNED,
    type ENUM('connector', 'add_on_content'),
    element_id INT UNSIGNED,
    template_id INT UNSIGNED NULL,
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (root_category_id) REFERENCES categories(id),
    UNIQUE KEY unique_type_element_id (type, element_id),
    CONSTRAINT fk_element_id_connector FOREIGN KEY (element_id) REFERENCES table_A(id),
    CONSTRAINT fk_element_id_add_on_content FOREIGN KEY (element_id) REFERENCES table_B(id)
);
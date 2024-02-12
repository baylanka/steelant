CREATE TABLE category_media
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id INT,
    media_id INT,
    type ENUM('icon', 'banner', 'gallery'),
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (media_id) REFERENCES media(id),
);
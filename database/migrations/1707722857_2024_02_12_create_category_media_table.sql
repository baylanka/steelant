CREATE TABLE  IF NOT EXISTS  category_media
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    category_id BIGINT UNSIGNED,
    media_id  BIGINT UNSIGNED,
    type ENUM('icon', 'banner', 'gallery'),
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (category_id) REFERENCES categories(id),
    FOREIGN KEY (media_id) REFERENCES media(id)
);
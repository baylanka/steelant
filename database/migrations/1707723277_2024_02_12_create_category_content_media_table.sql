CREATE TABLE  IF NOT EXISTS  category_content_media
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content_id  BIGINT UNSIGNED COMMENT 'category_contents table id',
    media_id  BIGINT UNSIGNED,
    placeholder_id VARCHAR(100) COMMENT "Template level, there are unique html custom_attribute string. based on these placeholder_id can able to fix media and template together on user side",
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (content_id) REFERENCES category_content_media(id),
    FOREIGN KEY (media_id) REFERENCES media(id)
);
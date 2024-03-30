CREATE TABLE  IF NOT EXISTS   content_template_media
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content_template_id  BIGINT UNSIGNED,
    media_id  BIGINT UNSIGNED,
    placeholder_id VARCHAR(100) COMMENT "Template level, there are unique html custom_attribute string. based on these placeholder_id can able to fix media and template together on user side",
    title VARCHAR(100) NULL,
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (content_template_id) REFERENCES content_templates(id),
    FOREIGN KEY (media_id) REFERENCES media(id)
);
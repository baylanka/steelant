CREATE TABLE  IF NOT EXISTS   content_templates
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    language VARCHAR(10)  NOT NULL,
    content_id  BIGINT UNSIGNED NOT NULL,
    template_id  BIGINT UNSIGNED NOT NULL,
    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (content_id) REFERENCES category_contents(id),
    FOREIGN KEY (template_id) REFERENCES templates(id)
);
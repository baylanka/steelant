ALTER TABLE  templates
ADD type VARCHAR(255) NOT NULL AFTER path,
ADD thumbnail_media_id BIGINT UNSIGNED AFTER type,
ADD CONSTRAINT FOREIGN KEY(thumbnail_media_id) REFERENCES media(id);
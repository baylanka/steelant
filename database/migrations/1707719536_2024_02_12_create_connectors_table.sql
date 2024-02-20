CREATE TABLE IF NOT EXISTS  connectors
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(35) NOT NULL COMMENT 'store content in json format based on languages',
    grade VARCHAR(25) NOT NULL,
    description TEXT NULL COMMENT 'store content in json format based on languages',

    weight_m DECIMAL(8,2) COMMENT 'metrics: unit kg/m',
    weight_tolerance_m VARCHAR(25) COMMENT 'metrics: ex: +0/-5mg' NULL,
    weight_i DECIMAL(8,2) COMMENT 'imperial: unit lbs/ft',
    weight_tolerance_i VARCHAR(25) COMMENT 'metrics: ex: +0/-5"' NULL,

    thickness_m DECIMAL(8,2) COMMENT 'metrics: unit mm',
    thickness_tolerance_m VARCHAR(25) COMMENT 'metrics: ex: +0.1/-0.5 micro meter' NULL,
    thickness_i DECIMAL(8,2) COMMENT 'imperial: unit inch',
    thickness_tolerance_i VARCHAR(25) COMMENT 'metrics: ex: +0/-5 inch' NULL,

    standard_length_m DECIMAL(8,2) COMMENT 'metrics: unit m',
    standard_length_tolerance_m VARCHAR(25) COMMENT 'metrics: ex: +0.1/-0.5 mm' NULL,
    standard_length_i DECIMAL(8,2) COMMENT 'imperial: unit ft',
    standard_length_tolerance_i VARCHAR(25) COMMENT 'metrics: ex: +0/-5 inch' NULL,


    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP
);
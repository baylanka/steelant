CREATE TABLE IF NOT EXISTS  connectors
(
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(35) NOT NULL COMMENT 'store content in json format based on languages',
    grade VARCHAR(25) NOT NULL,
    description TEXT NULL COMMENT 'store content in json format based on languages',

    weight_m VARCHAR(250) COMMENT 'metrics: unit kg/m >> ie: 5kg/m (+0/-5mg). Note admin can able to split by multiple label and its associated values. ',
    weight_i VARCHAR(250) COMMENT 'imperial: unit lbs/ft >> ie: 5 lbs/ft (+0/-5")',

    thickness_m VARCHAR(250) COMMENT 'metrics: unit mm >> ie: 5mm (+0.1/-0.5)',
    thickness_i VARCHAR(250) COMMENT 'imperial: unit inch >> ie: 5 inch (+0/-5 inch)',

    standard_lengths_m VARCHAR(250) COMMENT 'metrics: unit m >> ie: 5m (+0.1/-0.5 mm). note: here multiple standard lengths can be added by a separator',
    standard_lengths_i VARCHAR(250) COMMENT 'imperial: unit ft >> ie: 15inch (+0/-5 inch). note: here multiple standard lengths can be added by a separator ',

    visibility TINYINT(2) DEFAULT 0,

    created_at DATETIME  DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME  DEFAULT CURRENT_TIMESTAMP
);
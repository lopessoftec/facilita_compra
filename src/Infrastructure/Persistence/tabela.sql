CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(100) NOT NULL,
    state INTEGER(1) default(1) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP
);

CREATE TABLE providers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    cell_phone VARCHAR(15),
    zip_code VARCHAR(10),
    logradouro VARCHAR(50),
    bairro VARCHAR(50),
    city VARCHAR(50),
    number VARCHAR(50),
    description VARCHAR(50),
    cnpj VARCHAR(50),
    state INTEGER(1) default(1) NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP
);

CREATE TABLE packaging (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    state INTEGER(1) default(1) NOT NULL,
    user_id INTEGER UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE brands (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    state INTEGER(1) default(1) NOT NULL,
    user_id INTEGER UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    state INTEGER(1) default(1) NOT NULL,
    brand_id INTEGER UNSIGNED NOT NULL,
    packing_id INTEGER UNSIGNED NOT NULL,
    user_id INTEGER UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP,
    FOREIGN KEY (brand_id) REFERENCES brands(id),
    FOREIGN KEY (packing_id) REFERENCES packaging(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE product_details (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    value DECIMAL(11,2) NOT NULL,
    state INTEGER(1) default(1) NOT NULL,
    product_id INTEGER UNSIGNED NOT NULL,
    provider_id INTEGER UNSIGNED NOT NULL,
    user_id INTEGER UNSIGNED NOT NULL,
    created_at TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    deleted_at TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (provider_id) REFERENCES providers(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);  

pimple php

php-di

1
-- Créer la base de données
CREATE DATABASE boutique;

-- Utiliser la base de données
USE boutique;

-- Table 'user'
CREATE TABLE user (
    id_user INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    username VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    firstname VARCHAR(255) NOT NULL,
    lastname VARCHAR(255) NOT NULL,
    address TEXT,
    postal_code VARCHAR(5),
    city VARCHAR(255),
    status VARCHAR(255)
);

-- Table 'category'
CREATE TABLE category (
    id_category INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR(255) UNIQUE NOT NULL,
    description TEXT
);

-- Table 'size'
CREATE TABLE size (
    id_size INT AUTO_INCREMENT PRIMARY KEY,
    size_name VARCHAR(255) UNIQUE NOT NULL,
    description TEXT
);

-- Table 'product'
CREATE TABLE product (
    id_product INT AUTO_INCREMENT PRIMARY KEY,
    reference VARCHAR(255) UNIQUE NOT NULL,
    product_name VARCHAR(255) NOT NULL,
    description TEXT,
    main_img VARCHAR(255),
    price INT NOT NULL,
    stock INT NOT NULL,
    category_id INT DEFAULT NULL,
    size_id INT DEFAULT NULL,
    active INT NOT NULL,
    INDEX (category_id),
    INDEX (size_id),
    FOREIGN KEY (category_id) REFERENCES category(id_category) ON DELETE SET NULL,
    FOREIGN KEY (size_id) REFERENCES size(id_size) ON DELETE SET NULL
);

-- Table 'orders'
CREATE TABLE orders (
    id_orders INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT DEFAULT NULL,
    orders_date DATETIME NOT NULL,
    total INT NOT NULL,
    active INT NOT NULL,
    INDEX (user_id),
    FOREIGN KEY (user_id) REFERENCES user(id_user) ON DELETE SET NULL
);

-- Table 'orders_details'
CREATE TABLE orders_details (
    id_orders_details INT AUTO_INCREMENT PRIMARY KEY,
    orders_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    unit_price INT NOT NULL,
    INDEX (orders_id),
    INDEX (product_id),
    FOREIGN KEY (orders_id) REFERENCES orders(id_orders) ON DELETE RESTRICT,
    FOREIGN KEY (product_id) REFERENCES product(id_product) ON DELETE RESTRICT
);

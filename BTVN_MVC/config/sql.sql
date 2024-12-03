CREATE DATABASE product_db;

USE product_db;

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
);

-- Thêm dữ liệu mẫu
INSERT INTO products (name, price) VALUES ('Product 1', 100.00);
INSERT INTO products (name, price) VALUES ('Product 2', 150.00);
INSERT INTO products (name, price) VALUES ('Product 3', 200.00);

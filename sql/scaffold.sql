CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(64) NOT NULL,
    hashed_password VARCHAR(128) 
);

CREATE TABLE products(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(64) NOT NULL,
    description VARCHAR(512),
    usd_price DECIMAL(10,2)
);

CREATE TABLE product_images(
    id INT AUTO_INCREMENT PRIMARY KEY,
    url VARCHAR(128),
    is_featured boolean, 
    product_id INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);
CREATE TABLE purchases(
    id INT PRIMARY KEY AUTO_INCREMENT,
    quantity INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

CREATE TABLE orders(
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
);

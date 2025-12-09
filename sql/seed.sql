-- Seed categories
INSERT INTO categories (title, description) VALUES
('Phones', 'Pear’s flagship pocket devices featuring the latest P-Chip processors.'),
('Laptops', 'Portable Pear computing devices designed for power and mobility.'),
('Desktops', 'Pear’s high-performance desktop systems for pros and creators.'),
('Tablets', 'Lightweight Pear tablets for work, creativity, or entertainment.');

-- Seed products
INSERT INTO products (id, name, label, description, usd_price, category_id) VALUES
-- Phones
(1, 'iPear 15', 'The latest and greatest PearPhone', 'The iPear 15 features a stunning PearVision display, P-Fusion chip, and advanced camera system, providing the ultimate mobile experience.', 899.00, 1),
(2, 'iPear 15 Pro', 'Powerful. Sleek. Pro.', 'iPear 15 Pro combines professional-grade photography and ultrafast processing in a sleek design, perfect for power users.', 1099.00, 1),
(3, 'iPear SE', 'Compact and affordable', 'iPear SE offers classic Pear design in a smaller, more affordable form factor without compromising performance.', 399.00, 1),

-- Laptops
(4, 'BoscBook Air', 'Lightweight and portable', 'BoscBook Air delivers all-day battery life and thin design for work and play on the go.', 999.00, 2),
(5, 'BoscBook Pro 14', 'Power in your hands', 'BoscBook Pro 14 features the latest P-Chip, stunning PearScreen display, and enhanced graphics for creators and professionals.', 1999.00, 2),
(6, 'BoscBook Pro 16', 'Big screen, bigger performance', 'BoscBook Pro 16 is designed for heavy workloads, large-scale creative projects, and immersive multimedia experiences.', 2499.00, 2),

-- Desktops
(7,'PearStation Mini', 'Compact performance', 'PearStation Mini packs high-end desktop power into a compact form, perfect for any workspace.', 699.00, 3),
(8,'PearStation', 'All-in-one powerhouse', 'PearStation features an integrated PearView display, advanced processing, and plenty of storage for home or office.', 1599.00, 3),
(9,'PearStation Studio', 'For professional creators', 'PearStation Studio delivers unmatched performance and expandability for professional designers, editors, and engineers.', 3499.00, 3),

-- Tablets
(10, 'PearPad', 'Everyday tablet simplicity', 'PearPad is perfect for casual use, browsing, and media consumption with its responsive touch display.', 499.00, 4),
(11, 'PearPad Air', 'Thin. Light. Powerful.', 'PearPad Air combines ultra-thin design with a P-Chip for smooth multitasking and creative work.', 599.00, 4),
(12,'PearPad Pro', 'Professional creativity tablet', 'PearPad Pro features PearCanvas display, Apple Pencil-style support, and high-speed processing for artists and professionals.', 999.00, 4);


-- Images
INSERT INTO product_images(url, is_featured, product_id) VALUES
("product-images/15/metal.png", false, 1),("product-images/15/orange.png", false, 1),("product-images/15/white.png", false, 1),

("product-images/15pro/orange.png", true, 2), ( "product-images/15pro/blue.png", false, 2), ("product-images/15pro/purple.png", false, 2), (    "product-images/15pro/silver.png", false, 2),

("product-images/se/black.png", true, 3),("product-images/se/white.png", false, 3),

("product-images/BoscBookAir/blue.jpeg", false, 4),

("product-images/BoscBookPro14/silver.jpeg", false, 5),("product-images/BoscBookPro14/black.jpeg", false, 5),


("product-images/BoscBookPro16/silver.jpeg", false, 6),("product-images/BoscBookPro16/black.jpeg", false, 6),

("product-images/PearStationMini/silver.png", false, 7),

("product-images/PearStation/silver.png", false, 8),

("product-images/PearStationStudio/silver.png", false, 9),

("product-images/PearPad/pink.jpg", false, 10),

("product-images/PearPadAir/blue.jpg", false, 11),

("product-images/PearPadPro/black.jpg", false, 12);
-- Seed categories
INSERT INTO categories (title, description) VALUES
('Phones', 'Pear’s flagship pocket devices featuring the latest P-Chip processors.'),
('Laptops', 'Portable Pear computing devices designed for power and mobility.'),
('Desktops', 'Pear’s high-performance desktop systems for pros and creators.'),
('Tablets', 'Lightweight Pear tablets for work, creativity, or entertainment.');

-- Seed products
INSERT INTO products (name, label, description, usd_price, category_id) VALUES
-- Phones
('iPear 15', 'The latest and greatest PearPhone', 'The iPear 15 features a stunning PearVision display, P-Fusion chip, and advanced camera system, providing the ultimate mobile experience.', 899.00, 1),
('iPear 15 Pro', 'Powerful. Sleek. Pro.', 'iPear 15 Pro combines professional-grade photography and ultrafast processing in a sleek design, perfect for power users.', 1099.00, 1),
('iPear SE', 'Compact and affordable', 'iPear SE offers classic Pear design in a smaller, more affordable form factor without compromising performance.', 399.00, 1),

-- Laptops
('BoscBook Air', 'Lightweight and portable', 'BoscBook Air delivers all-day battery life and thin design for work and play on the go.', 999.00, 2),
('BoscBook Pro 14', 'Power in your hands', 'BoscBook Pro 14 features the latest P-Chip, stunning PearScreen display, and enhanced graphics for creators and professionals.', 1999.00, 2),
('BoscBook Pro 16', 'Big screen, bigger performance', 'BoscBook Pro 16 is designed for heavy workloads, large-scale creative projects, and immersive multimedia experiences.', 2499.00, 2),

-- Desktops
('PearStation Mini', 'Compact performance', 'PearStation Mini packs high-end desktop power into a compact form, perfect for any workspace.', 699.00, 3),
('PearStation', 'All-in-one powerhouse', 'PearStation features an integrated PearView display, advanced processing, and plenty of storage for home or office.', 1599.00, 3),
('PearStation Studio', 'For professional creators', 'PearStation Studio delivers unmatched performance and expandability for professional designers, editors, and engineers.', 3499.00, 3),

-- Tablets
('PearPad', 'Everyday tablet simplicity', 'PearPad is perfect for casual use, browsing, and media consumption with its responsive touch display.', 499.00, 4),
('PearPad Air', 'Thin. Light. Powerful.', 'PearPad Air combines ultra-thin design with a P-Chip for smooth multitasking and creative work.', 599.00, 4),
('PearPad Pro', 'Professional creativity tablet', 'PearPad Pro features PearCanvas display, Apple Pencil-style support, and high-speed processing for artists and professionals.', 999.00, 4);

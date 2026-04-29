CREATE TABLE User (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(50),
    password VARCHAR(100)
);

INSERT INTO User (name, email, password)
VALUES ('Mr l’Admin', 'admin@sysinfo.mg', '$2y$10$/l.jD2OCeE02I6s7ObfzWuP3QbL4liRvj403qVFMBnKPL8IrXOi9a')

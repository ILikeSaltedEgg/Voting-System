CREATE TABLE IF NOT EXISTS votes (
    id INTEGER PRIMARY KEY AUTO_INCREMENT,
    candidate VARCHAR(255) NOT NULL,
    timestamp TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

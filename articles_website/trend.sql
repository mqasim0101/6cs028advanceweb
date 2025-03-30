CREATE TABLE article_views (
    id INT AUTO_INCREMENT PRIMARY KEY,
    article_id INT NOT NULL,
    viewed_at DATETIME NOT NULL,
    FOREIGN KEY (article_id) REFERENCES articles(id)
);
CREATE table jobs (
  id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
  title VARCHAR(32) NOT NULL,
  description TEXT NOT NULL,
  city VARCHAR(32),
  state VARCHAR(2),
  instruction VARCHAR(255) NOT NULL
);


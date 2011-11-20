CREATE TABLE lookup
(
	lookup_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	lookup_name VARCHAR(128) NOT NULL,
	lookup_code INTEGER NOT NULL,
	lookup_type VARCHAR(128) NOT NULL,
	lookup_position INTEGER NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE user
(
	user_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	user_name VARCHAR(128) NOT NULL,
	user_password VARCHAR(128) NOT NULL,
	user_salt VARCHAR(128) NOT NULL,
	user_email VARCHAR(128) NOT NULL,
	user_profile TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE book
(
	book_id INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
	book_title VARCHAR(128) NOT NULL,
	book_tags TEXT,
	book_status INTEGER NOT NULL,
	book_create_time INTEGER,
	book_update_time INTEGER,
	owner_id INTEGER NOT NULL,
	CONSTRAINT FK_book_owner FOREIGN KEY (owner_id)
		REFERENCES user (user_id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE book_content
(
	book_id INTEGER NOT NULL,
	book_text LONGTEXT,
        book_short_text TEXT,
	CONSTRAINT FK_book_id FOREIGN KEY (book_id)
		REFERENCES book (book_id) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

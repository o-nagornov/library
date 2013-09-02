DELETE FROM tbl_book_has_type WHERE book_id > 0;
DELETE FROM tbl_book_has_author WHERE book_id > 0;
DELETE FROM tbl_book_has_keyword WHERE book_id > 0;
DELETE FROM tbl_keyword WHERE id_keyword > 0;
DELETE FROM tbl_author WHERE id_author > 0;
DELETE FROM tbl_query WHERE id_query > 0;
DELETE FROM tbl_recommendation WHERE id_recommendation > 0;
DELETE FROM tbl_type WHERE id_type > 0;
DELETE FROM tbl_user WHERE id_user > 0;
DELETE FROM tbl_book WHERE id_book > 0;

INSERT INTO tbl_user VALUES (1, 'Олег', 'Нагорнов', 'Игоревич', 'nagornov.oi@gmail.com', MD5('qwerty'), 'root', MD5('1nagornov.oi@gmail.com1'));
INSERT INTO tbl_user VALUES (2, 'Иван', 'Петров', 'Алексеевич', 'test@test.com', MD5('qwerty'), 'admin', MD5('2test@test.com2'));
INSERT INTO tbl_user VALUES (3, 'Петр', 'Сидоров', 'Александрович', 'test1@test.com', MD5('qwerty'), 'user', MD5('3test1@test.com3'));
INSERT INTO tbl_user VALUES (4, 'Сергей', 'Иванов', 'Иванович', 'test2@test.com', MD5('qwerty'), 'user', MD5('3test2@test.com3'));

INSERT INTO tbl_author VALUES (1, 'Шило В.Л.');
INSERT INTO tbl_author VALUES (2, 'Эрих Гамма');
INSERT INTO tbl_author VALUES (3, 'Ричард Хелм');
INSERT INTO tbl_author VALUES (4, 'Ральф Джонсон');
INSERT INTO tbl_author VALUES (5, 'Джон Влиссидс');

INSERT INTO tbl_type VALUES (1, 'Э/Т');
INSERT INTO tbl_type VALUES (2, 'ООП');

INSERT INTO tbl_keyword VALUES (1, 'C++');
INSERT INTO tbl_keyword VALUES (2, 'микросхема');
INSERT INTO tbl_keyword VALUES (3, 'Pattern');

INSERT INTO tbl_book VALUES (1, 'Популярные цифровые ИС', 'справочник по микросхемам', 1, 1, NULL, 1987, NULL);
INSERT INTO tbl_book VALUES (2, 'Design Patterns', 'справочник по ООП', 1, 2, NULL, 1994, NULL);

INSERT INTO tbl_book_has_author VALUES (1, 1);
INSERT INTO tbl_book_has_author VALUES (2, 2);
INSERT INTO tbl_book_has_author VALUES (2, 3);
INSERT INTO tbl_book_has_author VALUES (2, 4);
INSERT INTO tbl_book_has_author VALUES (2, 5);

INSERT INTO tbl_book_has_keyword VALUES (1, 2);
INSERT INTO tbl_book_has_keyword VALUES (2, 1);
INSERT INTO tbl_book_has_keyword VALUES (2, 3);

INSERT INTO tbl_book_has_type VALUES (1, 1);
INSERT INTO tbl_book_has_type VALUES (2, 2);

INSERT INTO tbl_recommendation VALUES (1, 'это нужно знать', 2, 1, 3);
INSERT INTO tbl_recommendation VALUES (2, 'и это тоже нужно знать', 1, 1, 2);

INSERT INTO tbl_query VALUES (1, '2013-08-15 19:20:38', 'given', 2, 2, NULL);
INSERT INTO tbl_query VALUES (2, '2013-08-15 19:20:39', 'new', 2, 1, NULL);
INSERT INTO tbl_query VALUES (3, '2013-08-15 19:20:40', 'new', 2, 3, NULL);
INSERT INTO tbl_query VALUES (4, '2013-08-15 19:20:41', 'new', 2, 4, NULL);
INSERT INTO tbl_query VALUES (5, '2013-08-15 19:20:41', 'new', 1, 1, NULL);

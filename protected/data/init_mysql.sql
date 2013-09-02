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
INSERT INTO tbl_user VALUES (4, 'Сергей', 'Иванов', 'Иванович', 'test2@test.com', MD5('qwerty'), 'user', MD5('4test2@test.com4'));
INSERT INTO tbl_user VALUES (5, 'Андрей', 'Баракшаев', 'Александрович', 'barap@mail.com', MD5('qwerty'), 'user', MD5('5barap@mail.ru5'));
INSERT INTO tbl_user VALUES (6, 'Николай', 'Куприянов', 'Евгеньевич', 'nikolay@mail.ru', MD5('qwerty'), 'user', MD5('6nikolay@mail.ru6'));
INSERT INTO tbl_user VALUES (7, 'Наталья', 'Шагаева', 'Андреевна', 'shagaeva@email.com', MD5('qwerty'), 'user', MD5('7shagaeva@email.com7'));
INSERT INTO tbl_user VALUES (8, 'Анжелика', 'Морозова', 'Олеговна', 'moroz@email.com', MD5('qwerty'), 'user', MD5('8moroz@email.com8'));
INSERT INTO tbl_user VALUES (9, 'Дмитрий', 'Марасов', 'Сергеевич', 'marasov@mail.ru', MD5('qwerty'), 'user', MD5('9marasov@mail.ru9'));
INSERT INTO tbl_user VALUES (10, 'Маргарита', 'Карасева', 'Алексеевна', 'margarit@mail.ru', MD5('qwerty'), 'user', MD5('10margarit@mail.ru10'));
INSERT INTO tbl_user VALUES (11, 'Полина', 'Николаева', 'Николаевна', 'nikolaeva@email.com', MD5('qwerty'), 'user', MD5('11nikolaeva@email.com11'));


INSERT INTO tbl_author VALUES (1, 'Шило В.Л.');
INSERT INTO tbl_author VALUES (2, 'Эрих Гамма');
INSERT INTO tbl_author VALUES (3, 'Ричард Хелм');
INSERT INTO tbl_author VALUES (4, 'Ральф Джонсон');
INSERT INTO tbl_author VALUES (5, 'Джон Влиссидс');
INSERT INTO tbl_author VALUES (6, 'Мэтт Зандстра');
INSERT INTO tbl_author VALUES (7, 'Черняк В.З.');
INSERT INTO tbl_author VALUES (8, 'Кибанов А.Я.');
INSERT INTO tbl_author VALUES (9, 'Владимир Дронов');
INSERT INTO tbl_author VALUES (10, 'Зеньковский В.А.');
INSERT INTO tbl_author VALUES (11, 'Сырых Ю. А.');
INSERT INTO tbl_author VALUES (12, 'Никита Культин');
INSERT INTO tbl_author VALUES (13, 'Ковалев В.В.');
INSERT INTO tbl_author VALUES (14, 'Ковалев А.В.');
INSERT INTO tbl_author VALUES (15, 'Дэвид Макфарланд');
INSERT INTO tbl_author VALUES (16, 'Кумскова И.А.'); 
INSERT INTO tbl_author VALUES (17, 'Джеффри Рихтер'); 
INSERT INTO tbl_author VALUES (18, 'Попова Н.Ю.'); 
INSERT INTO tbl_author VALUES (19, 'Николай Прохоренок'); 
INSERT INTO tbl_author VALUES (20, 'Роман Клименко'); 
INSERT INTO tbl_author VALUES (21, 'Наталья Сержантова');
INSERT INTO tbl_author VALUES (22, 'Мельников В.П.'); 
INSERT INTO tbl_author VALUES (23, 'Петраков  А.М. '); 
INSERT INTO tbl_author VALUES (24, 'Платонов  В.В.'); 
INSERT INTO tbl_author VALUES (25, 'Проскурин  В.Г.'); 
INSERT INTO tbl_author VALUES (26, 'Майкл Фитцджеральд'); 
INSERT INTO tbl_author VALUES (27, 'Партыка  Т.Л.');
INSERT INTO tbl_author VALUES (28, 'Попов И.И.');  
INSERT INTO tbl_author VALUES (29, 'Клейменов С.А.');

INSERT INTO tbl_type VALUES (1, 'Э/Т');
INSERT INTO tbl_type VALUES (2, 'ООП');
INSERT INTO tbl_type VALUES (3, 'Программирование');
INSERT INTO tbl_type VALUES (4, 'Менеджемент');
INSERT INTO tbl_type VALUES (5, 'Верстка');
INSERT INTO tbl_type VALUES (6, 'Веб-дизайн');
INSERT INTO tbl_type VALUES (7, 'БД');
INSERT INTO tbl_type VALUES (8, 'Веб');
INSERT INTO tbl_type VALUES (9, 'ИБ');



INSERT INTO tbl_keyword VALUES (1, 'C++');
INSERT INTO tbl_keyword VALUES (2, 'микросхема');
INSERT INTO tbl_keyword VALUES (3, 'Pattern');
INSERT INTO tbl_keyword VALUES (4, 'инкапсуляция');
INSERT INTO tbl_keyword VALUES (5, 'абстрактные классы');
INSERT INTO tbl_keyword VALUES (6, 'клонирование объектов');
INSERT INTO tbl_keyword VALUES (7, 'бизнес-проект');
INSERT INTO tbl_keyword VALUES (8, 'инвестиции');
INSERT INTO tbl_keyword VALUES (9, 'кадровое планирование');
INSERT INTO tbl_keyword VALUES (10, 'уровни управления');
INSERT INTO tbl_keyword VALUES (11, 'HTML 5');
INSERT INTO tbl_keyword VALUES (12, 'CSS 3');
INSERT INTO tbl_keyword VALUES (13, 'Веб 3.0');
INSERT INTO tbl_keyword VALUES (14, 'стили веб-сайтов');
INSERT INTO tbl_keyword VALUES (15, 'коммерческий дизайн');
INSERT INTO tbl_keyword VALUES (16, 'событийное программирование');
INSERT INTO tbl_keyword VALUES (17, 'финансовые активы');
INSERT INTO tbl_keyword VALUES (18, 'финансовый риск');
INSERT INTO tbl_keyword VALUES (19, 'технология Ajax');
INSERT INTO tbl_keyword VALUES (20, 'фильтры');
INSERT INTO tbl_keyword VALUES (21, 'язык SQL');
INSERT INTO tbl_keyword VALUES (22, 'ER-модели');
INSERT INTO tbl_keyword VALUES (23, 'Case-системы');
INSERT INTO tbl_keyword VALUES (24, '.NET Framework 4.5');
INSERT INTO tbl_keyword VALUES (25, 'C# 5.0.');
INSERT INTO tbl_keyword VALUES (26, 'язык HTML');
INSERT INTO tbl_keyword VALUES (27, 'JavaScript');
INSERT INTO tbl_keyword VALUES (28, 'язык PHP');
INSERT INTO tbl_keyword VALUES (29, 'MySQL');
INSERT INTO tbl_keyword VALUES (30, 'SQL Server 2005');
INSERT INTO tbl_keyword VALUES (31, 'компьютерный вирусы');
INSERT INTO tbl_keyword VALUES (32, 'криптографическая защита');
INSERT INTO tbl_keyword VALUES (33, 'VPN');
INSERT INTO tbl_keyword VALUES (34, 'сетевые атаки');
INSERT INTO tbl_keyword VALUES (35, 'программные закладки');
INSERT INTO tbl_keyword VALUES (36, 'антивирусная защита');
INSERT INTO tbl_keyword VALUES (37, 'RubyGems');
INSERT INTO tbl_keyword VALUES (38, 'Embedded Ruby');
INSERT INTO tbl_keyword VALUES (39, 'сети ЭВМ');




INSERT INTO tbl_book VALUES (1, 'Популярные цифровые ИС', 'справочник по микросхемам', 1, 1, 'schema.pdf', 1987, '590ba.jpg');
INSERT INTO tbl_book VALUES (2, 'Design Patterns', 'справочник по ООП', 1, 2, NULL, 1994, NULL);
INSERT INTO tbl_book VALUES (3, 'PHP. Объекты, шаблоны и методики программирования', 'а последние десять лет PHP буквально охватила объектно-ориентированная революция, причем это относится как к самим средствам языка, так и к разработчикам, использующим эти средства, и к приложениям, которые они создают. Теперь основной акцент делается на объектах и объектно-ориентированном подходе к проектированию. Существует еще один момент, связанный с этим и также прочно укоренившийся в современные методики разработки объектно-ориентированных приложений. Речь идет об использовании средств и методик, благодаря которым достигается успешное выполнение проекта, осуществляется эффективное управление группами разработчиков и повышается качество кода. ', 1, 1, NULL, 2010, '1002134878.jpg');
INSERT INTO tbl_book VALUES (4, 'Бизнес-планирование', 'Рассматриваются плановый характер деятельности предприятия, выбор и реализация бизнес-проекта, профессиональная поддержка и сопровождение бизнеса, разработка и мониторинг бизнес-плана, финансовое планирование и управление инвестициями, методология выявления и анализ рисков. Теоретический материал подкрепляется практическими задачами по разделам бизнес-плана (с ответами и методикой решения).', 1, 1, NULL, 2012, '1002441632.jpg');
INSERT INTO tbl_book VALUES (5, 'Управление персоналом', 'Обобщены результаты зарубежных и отечественных теоретических исследований и практический опыт в области управления персоналом организаций различных форм собственности и уровней управления, а также опыт образовательных учреждений в преподавании данной дисциплины. Рассматриваются следующие вопросы: концепция, принципы и методы управления и построения системы управления персоналом; цели, функции и организационная структура системы управления персоналом; формирование кадровой политики и стратегия управления персоналом', 1, 1, NULL, 2011, '1001148539.jpg');
INSERT INTO tbl_book VALUES (6, 'Разработка современных Web-сайтов', 'Практическое руководство по созданию современных Web-сайтов, соответствующих концепции Web 2.0. Описаны языки HTML 5 и CSS 3, применяемые, соответственно, для создания содержимого и представления Web-страниц. Даны принципы Web-программирования на языке JavaScript с использованием библиотеки Ext Core. Рассказано о создании интерактивных Web-страниц, приведены примеры интерактивных элементов, позволяющие сделать Web-страницы удобнее для посетителя.', 1, 1, NULL, 2012, '1002023394.jpg');
INSERT INTO tbl_book VALUES (7, 'Современный веб-дизайн', 'Эта книга предназначена для начинающих веб-дизайнеров. Она описывает основные правила и тонкости дизайнерской работы на всех этапах разработки сайта - от постановки задачи, отбора материала и разработки макета, до тестирования готового сайта и публикации его в сети.', 1, 1, NULL, 2013, '1005582897.jpg');
INSERT INTO tbl_book VALUES (8, 'Основы программирования в Delphi', 'В ней в доступной форме изложены принципы визуального проектирования и событийного программирования, на конкретных примерах показана методика создания программ различного назначения, приведено описание среды разработки Delphi XE (Delphi 2011) и базовых компонентов. Рассмотрены вопросы программирования графики, мультимедиа, разработки программ работы с базами данных Microsoft Access. Многочисленные примеры демонстрируют назначение компонентов, раскрывают тонкости программирования в Delphi.', 1, 1, NULL, 2011, '1002281893.jpg');
INSERT INTO tbl_book VALUES (9, 'Финансовый менеджемент', 'Книга представляет собой углубленный курс относительно новой и динамично развивающейся дисциплины, посвященной описанию логики, принципов и техники управления финансами коммерческой организации. Изложен авторский подход к структурированию и сущностному наполнению курса. Подробно охарактеризована эволюция финансового менеджмента, описана его взаимосвязь с неоклассической теорией финансов и бухгалтерским учетом, рассмотрены принципы анализа и финансового планирования, приведены модели оценки финансовых активов, критерии оценки инвестиционных проектов и способы управления оборотными средствами, изложены базовые концепции теорий эффективного рынка капитала, портфельных инвестиций, структуры капитала.', 1, 1, NULL, 2010, '013_small.JPG');
INSERT INTO tbl_book VALUES (10, 'JavaScript. Подробное руководство', 'JavaScript - это основной инструмент веб-разработчиков, позволяющий делать интернет-страницы интерактивными. Перед вами - наиболее полное и качественно структурированное руководство по JavaScript, которое позволит вам в совершенстве овладеть этим столь востребованным ныне языком программирования. Один из разделов книги посвящен быстро развивающейся технологии Ajax.', 1, 1, NULL, 2006, '1001193583.jpg');
INSERT INTO tbl_book VALUES (11, 'Базы данных', 'Основное назначение учебника - помощь студентам в освоении знаний в области теории баз данных и выработки практических навыков применения этих знаний. Особое внимание уделено основным концепциям проектирования и построения баз данных. Подробно рассматриваются вопросы последовательной нормализации отношений, построения ER-модели и использования CASE-систем при проектировании. Описаны технологии организации процессов обработки информации в базе данных с использованием структурного языка программирования, языка SQL и визуальных средств среды Visual FoxPro.', 1, 1, NULL, 2011, '1002967655.jpg');
INSERT INTO tbl_book VALUES (12, 'Программирование на языке C#', 'Эта книга, выходящая в четвертом издании и уже ставшая классическим учебником по программированию, подробно описывает внутреннее устройство и функционирование общеязыковой исполняющей среды (CLR) Microsoft .NET Framework версии 4.5. Написанная признанным экспертом в области программирования Джеффри Рихтером, много лет являющимся консультантом команды разработчиков .NET Framework компании Microsoft, книга научит вас создавать по-настоящему надежные приложения любого вида, в том числе с использованием Microsoft Silverlight, ASP.NET, Windows Presentation Foundation и т.д.', 1, 1, NULL, 2012, '1007028713.jpg');
INSERT INTO tbl_book VALUES (13, 'Джентльменский набор Web-мастера', 'Рассмотрены вопросы создания интерактивных Web-сайтов с помощью HTML, JavaScript, PHP и MySQL. Представлен материал о применении кас-кадных таблиц стилей (CSS) для форматирования Web-страниц. Даны основные конструкции языка PHP, на примерах показаны приемы написания сценариев, наиболее часто используемых при разработке Web-сайтов. Описаны приемы работы с базами данных MySQL при помощи PHP, а также администрирования баз данных с помощью программы phpMyAdmin. Особое внимание уделено созданию программной среды на компьютере разработчика и настройке Web-сервера Apache.', 1, 1, NULL, 2010, '1005566908.jpg');
INSERT INTO tbl_book VALUES (14, 'Веб-мастеринг на 100% ', 'Данная книга предназначена для тех, кто хочет научиться веб-мастерингу и стать специалистом по созданию веб-сайтов на профессиональном уровне. В издании описываются самые популярные и востребованные веб-технологии - HTML5, CSS3, JavaScript, jQuery, Ajax, PHP, а также приемы работы с системой управления содержимым сайта CMS Drupal и секреты раскрутки сайта (SEO). С помощью этих средств вы сможете создавать сайты любого назначения от "визиток" и блогов до интерактивных интернет-магазинов и порталов с непрерывно обновляемыми новостями. Прочитав эту книгу, вы станете настоящим веб-мастером, готовым к работе над любыми проектами на 100 %.', 1, 1, NULL, 2011, '1005574549.jpg');
INSERT INTO tbl_book VALUES (15, 'Базы данных Microsoft SQL Server 2005.', 'Обсуждаются стратегии доступа к данным, проектирование запросов к базам данных, курсоров и транзакций, целостность данных и обработка ошибок в SQL Server 2005, оптимизация производительности SQL Server 2005 и повышение производительности приложений баз данных. Книга не только является ценным руководством для администраторов баз данных и специалистов по внедрению и поддержке Microsoft SQL Server 2005, но и позволяет самостоятельно подготовиться к сдаче сертификационного экзамена Microsoft 70-442.
Прилагаемый компакт-диск содержит тренировочные тесты и лабораторные работы, которые позволят читателю на практике проверить полученные знания.
', 1, 1, NULL, 2008, '1000815298.jpg');
INSERT INTO tbl_book VALUES (16, 'Информационная безопасность', 'Описаны основные положения, понятия и определения информационной безопасности, проанализировано ее место в системе национальной безопасности государства. Рассмотрены модели обеспечения информационной безопасности, вопросы ее организационно-правового, методического и технического обеспечения. Изложены проблемы криптографической защиты информации, а также особенности ее защиты в персональных компьютерах и вычислительных сетях. Описаны разрушающие программные средства класса компьютерных вирусов и методы борьбы с ними.', 1, 1, NULL, 2011, '1005431405.jpg');
INSERT INTO tbl_book VALUES (17, 'Программно-аппаратные средства защиты информации', 'Показано обеспечение безопасности межсетевого взаимодействия. Рассмотрены основные виды вредоносных программ, удаленные сетевые атаки и организация защиты от них. Изложены методы описания атак и основные тенденции их развития. Описаны основные технологии межсетевых экранов, их оценка и тестирование. Проанализированы методы построения систем обнаружения вторжений. Рассмотрены проблемы защиты при организации удаленного доступа, построение и функционирование виртуальных ведомственных сетей (VPN), а также основные отечественные средства для их построения.', 1, 1, NULL, 2013, '1005798085.jpg');
INSERT INTO tbl_book VALUES (18, 'Защита программ и данных', 'Подробно рассмотрены средства и методы анализа программных реализаций, а также защиты программ от анализа. Рассмотрены модели взаимодействия программных закладок с атакуемыми компьютерными системами, предпосылки к внедрению и методы внедрения программных закладок, средства и методы защиты от программных закладок. Отдельно рассмотрен наиболее многочисленный на сегодняшний день класс программных закладок - компьютерные вирусы. Подробно описаны средства и методы реализации комплексного подхода к решению задачи организации антивирусной защиты. Изложение теоретического материала иллюстрируется многочисленными практическими примерами. В конце каждого раздела приведен перечень вопросов для самопроверки, в конце пособия - методические рекомендации по его изучению.', 1, 1, NULL, 2012, '1005559026.jpg');
INSERT INTO tbl_book VALUES (19, 'Изучаем Ruby', 'Книга представляет собой руководство по созданию веб-приложений на языке Ruby. Изучение построено на практических примерах, листинги которых есть почти на каждой странице. Даны основы Ruby, рассмотрены условные операторы, строки и регулярные выражения, операторы, функции, массивы, хэши, работа с файлами, классы. Описаны обработка XML, рефлексия, метапрограммирование, обработка исключений, инструментарий разработчика Tk и другие средства, включая RubyGems, RDoc и Embedded Ruby. Каждая глава завершается списком вопросов по теме. В конце книги для удобства собраны справочные материалы по языку Ruby и даны ответы на контрольные вопросы к главам.', 1, 1, NULL, 2010, '1005872656.jpg');
INSERT INTO tbl_book VALUES (20, 'Информационная безопасность', 'Рассмотрены вопросы информационной безопасности и защиты данных, в том числе в информационно-вычислительных системах и сетях. Дано введение в общие проблемы безопасности, определены роль и место информационной безопасности в системе обеспечения национальной безопасности государства. Рассмотрены проблемы защиты информации в автоматизированных системах обработки данных, криптографические методы защиты информации, вопросы защиты информации и персональных компьютерах, компьютерные вирусы и антивирусные программы, а также проблемы зашиты информации в сетях ЭВМ и организации комплексных систем технического обеспечения безопасности.', 1, 1, NULL, 2012, '1004655093.jpg');


INSERT INTO tbl_book_has_author VALUES (1, 1);
INSERT INTO tbl_book_has_author VALUES (2, 2);
INSERT INTO tbl_book_has_author VALUES (2, 3);
INSERT INTO tbl_book_has_author VALUES (2, 4);
INSERT INTO tbl_book_has_author VALUES (2, 5);
INSERT INTO tbl_book_has_author VALUES (3, 6);
INSERT INTO tbl_book_has_author VALUES (4, 7);
INSERT INTO tbl_book_has_author VALUES (5, 8);
INSERT INTO tbl_book_has_author VALUES (6, 9);
INSERT INTO tbl_book_has_author VALUES (6, 10);
INSERT INTO tbl_book_has_author VALUES (7, 11);
INSERT INTO tbl_book_has_author VALUES (8, 12);
INSERT INTO tbl_book_has_author VALUES (9, 13);
INSERT INTO tbl_book_has_author VALUES (9, 14); 
INSERT INTO tbl_book_has_author VALUES (10, 15);
INSERT INTO tbl_book_has_author VALUES (11, 16);
INSERT INTO tbl_book_has_author VALUES (12, 17);
INSERT INTO tbl_book_has_author VALUES (12, 18);
INSERT INTO tbl_book_has_author VALUES (13, 19);
INSERT INTO tbl_book_has_author VALUES (14, 20);
INSERT INTO tbl_book_has_author VALUES (15, 21);
INSERT INTO tbl_book_has_author VALUES (16, 22);
INSERT INTO tbl_book_has_author VALUES (16, 23);
INSERT INTO tbl_book_has_author VALUES (16, 29);
INSERT INTO tbl_book_has_author VALUES (17, 24);
INSERT INTO tbl_book_has_author VALUES (18, 25);
INSERT INTO tbl_book_has_author VALUES (19, 26);
INSERT INTO tbl_book_has_author VALUES (20, 27);
INSERT INTO tbl_book_has_author VALUES (20, 28);


INSERT INTO tbl_book_has_keyword VALUES (1, 2);
INSERT INTO tbl_book_has_keyword VALUES (2, 1);
INSERT INTO tbl_book_has_keyword VALUES (2, 3);
INSERT INTO tbl_book_has_keyword VALUES (3, 4);
INSERT INTO tbl_book_has_keyword VALUES (3, 5);
INSERT INTO tbl_book_has_keyword VALUES (3, 6);
INSERT INTO tbl_book_has_keyword VALUES (4, 7);
INSERT INTO tbl_book_has_keyword VALUES (4, 8);
INSERT INTO tbl_book_has_keyword VALUES (5, 9);
INSERT INTO tbl_book_has_keyword VALUES (5, 10);
INSERT INTO tbl_book_has_keyword VALUES (6, 11);
INSERT INTO tbl_book_has_keyword VALUES (6, 12);
INSERT INTO tbl_book_has_keyword VALUES (7, 13);
INSERT INTO tbl_book_has_keyword VALUES (7, 14);
INSERT INTO tbl_book_has_keyword VALUES (7, 15);
INSERT INTO tbl_book_has_keyword VALUES (8, 12);
INSERT INTO tbl_book_has_keyword VALUES (8, 16);
INSERT INTO tbl_book_has_keyword VALUES (9, 17);
INSERT INTO tbl_book_has_keyword VALUES (9, 18);
INSERT INTO tbl_book_has_keyword VALUES (9, 4);
INSERT INTO tbl_book_has_keyword VALUES (10, 19);
INSERT INTO tbl_book_has_keyword VALUES (10, 20);
INSERT INTO tbl_book_has_keyword VALUES (11, 21);
INSERT INTO tbl_book_has_keyword VALUES (11, 22);
INSERT INTO tbl_book_has_keyword VALUES (11, 23);
INSERT INTO tbl_book_has_keyword VALUES (12, 24);
INSERT INTO tbl_book_has_keyword VALUES (12, 25);
INSERT INTO tbl_book_has_keyword VALUES (13, 26);
INSERT INTO tbl_book_has_keyword VALUES (13, 27);
INSERT INTO tbl_book_has_keyword VALUES (14, 28);
INSERT INTO tbl_book_has_keyword VALUES (14, 29);
INSERT INTO tbl_book_has_keyword VALUES (15, 30);
INSERT INTO tbl_book_has_keyword VALUES (15, 21);
INSERT INTO tbl_book_has_keyword VALUES (16, 31);
INSERT INTO tbl_book_has_keyword VALUES (16, 32);
INSERT INTO tbl_book_has_keyword VALUES (17, 33);
INSERT INTO tbl_book_has_keyword VALUES (17, 34);
INSERT INTO tbl_book_has_keyword VALUES (18, 35);
INSERT INTO tbl_book_has_keyword VALUES (18, 36);
INSERT INTO tbl_book_has_keyword VALUES (19, 37);
INSERT INTO tbl_book_has_keyword VALUES (19, 38);
INSERT INTO tbl_book_has_keyword VALUES (20, 32);
INSERT INTO tbl_book_has_keyword VALUES (20, 36);
INSERT INTO tbl_book_has_keyword VALUES (20, 39);


INSERT INTO tbl_book_has_type VALUES (1, 1);
INSERT INTO tbl_book_has_type VALUES (2, 2);
INSERT INTO tbl_book_has_type VALUES (3, 3);
INSERT INTO tbl_book_has_type VALUES (4, 4);
INSERT INTO tbl_book_has_type VALUES (5, 4);
INSERT INTO tbl_book_has_type VALUES (6, 5);
INSERT INTO tbl_book_has_type VALUES (7, 6);
INSERT INTO tbl_book_has_type VALUES (8, 3);
INSERT INTO tbl_book_has_type VALUES (9, 4);
INSERT INTO tbl_book_has_type VALUES (10, 5);
INSERT INTO tbl_book_has_type VALUES (11, 7);
INSERT INTO tbl_book_has_type VALUES (12, 3);
INSERT INTO tbl_book_has_type VALUES (13, 8);
INSERT INTO tbl_book_has_type VALUES (14, 8);
INSERT INTO tbl_book_has_type VALUES (15, 7);
INSERT INTO tbl_book_has_type VALUES (16, 9);
INSERT INTO tbl_book_has_type VALUES (17, 9);
INSERT INTO tbl_book_has_type VALUES (18, 9);
INSERT INTO tbl_book_has_type VALUES (19, 3);
INSERT INTO tbl_book_has_type VALUES (20, 9);



INSERT INTO tbl_recommendation VALUES (1, 'это нужно знать', 2, 1, 3);
INSERT INTO tbl_recommendation VALUES (2, 'и это тоже нужно знать', 1, 1, 2); 
INSERT INTO tbl_recommendation VALUES (3, 'это нужно знать', 5, 2, 1);
INSERT INTO tbl_recommendation VALUES (4, 'и это тоже нужно знать', 4, 3, 1);
INSERT INTO tbl_recommendation VALUES (5, 'это нужно знать', 10, 5, 4);
INSERT INTO tbl_recommendation VALUES (6, 'и это тоже нужно знать', 11, 10, 6);
INSERT INTO tbl_recommendation VALUES (7, 'это нужно знать', 13, 7, 8);
INSERT INTO tbl_recommendation VALUES (8, 'и это тоже нужно знать', 17, 9, 5);
INSERT INTO tbl_recommendation VALUES (9, 'это нужно знать', 12, 1, 8);
INSERT INTO tbl_recommendation VALUES (10, 'и это тоже нужно знать', 19, 1, 5); 
INSERT INTO tbl_recommendation VALUES (11, 'это нужно знать', 3, 10, 9);
INSERT INTO tbl_recommendation VALUES (12, 'и это тоже нужно знать', 15, 2, 7);
INSERT INTO tbl_recommendation VALUES (13, 'это нужно знать', 10, 4, 5);
INSERT INTO tbl_recommendation VALUES (14, 'и это тоже нужно знать', 6, 9, 11);
INSERT INTO tbl_recommendation VALUES (15, 'это нужно знать', 14, 5, 3);
INSERT INTO tbl_recommendation VALUES (16, 'и это тоже нужно знать', 10, 6, 7); 
 

INSERT INTO tbl_query VALUES (1, '2013-08-15 19:20:38', 'given', 2, 2, NULL);
INSERT INTO tbl_query VALUES (2, '2013-08-15 19:20:39', 'new', 2, 1, NULL);
INSERT INTO tbl_query VALUES (3, '2013-08-15 19:20:40', 'new', 2, 3, NULL);
INSERT INTO tbl_query VALUES (4, '2013-08-15 19:20:41', 'new', 2, 4, NULL);
INSERT INTO tbl_query VALUES (5, '2013-08-15 19:20:41', 'new', 1, 1, NULL);
INSERT INTO tbl_query VALUES (6, '2013-08-15 19:25:30', 'recived', 4, 11, NULL);
INSERT INTO tbl_query VALUES (7, '2013-08-15 19:30:45', 'recived', 13, 7, NULL);
INSERT INTO tbl_query VALUES (8, '2013-08-15 19:40:40', 'recived', 18, 5, NULL);
INSERT INTO tbl_query VALUES (9, '2013-08-15 19:50:43', 'recived', 4, 8, NULL);
INSERT INTO tbl_query VALUES (10, '2013-08-15 19:55:40', 'recived', 11, 5, NULL);
INSERT INTO tbl_query VALUES (11, '2013-08-15 19:58:43', 'recived', 7, 6, NULL);
INSERT INTO tbl_query VALUES (12, '2013-08-15 20:00:31', 'canceled', 8, 10, NULL);
INSERT INTO tbl_query VALUES (13, '2013-08-15 20:10:39', 'canceled', 12, 4, NULL);
INSERT INTO tbl_query VALUES (14, '2013-08-15 20:20:31', 'canceled', 8, 10, NULL);
INSERT INTO tbl_query VALUES (15, '2013-08-15 20:25:39', 'canceled', 12, 4, NULL);
INSERT INTO tbl_query VALUES (16, '2013-08-15 20:30:46', 'canceled', 14, 3, NULL);
INSERT INTO tbl_query VALUES (17, '2013-08-15 20:35:21', 'given', 19, 4, NULL);
INSERT INTO tbl_query VALUES (18, '2013-08-15 20:40:39', 'given', 5, 7, NULL);
INSERT INTO tbl_query VALUES (19, '2013-08-15 20:50:39', 'given', 8, 10, NULL);
INSERT INTO tbl_query VALUES (20, '2013-08-16 09:40:39', 'given', 3, 7, NULL);
INSERT INTO tbl_query VALUES (21, '2013-08-16 09:50:39', 'given', 2, 4, NULL);





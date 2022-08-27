SQL
1. Создание таблицы 
```
CREATE TABLE `contacts` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(40) DEFAULT '',
PRIMARY KEY (`id`)
);
```

Создание таблицы друзей 
```
CREATE TABLE `friends` (
  `who` int(11) NOT NULL,
  `whoam` int(11) NOT NULL,
  PRIMARY KEY (`who`, `whoam`)
);
```

1.1. Список >5 друзей
```
SELECT friends.who, contacts.name, count(*) as cnt
 FROM friends
 LEFT JOIN contacts ON friends.who = contacts.id
 GROUP BY friends.who
 HAVING cnt > 5;
 ```
 
 1.2 Уникальные пары контактов
 ```
 SELECT f.id1, c1.name as name1, f.id2, c2.name as name2
 FROM (
   (SELECT who as id1, whom as id2 FROM friends where who < whoam)
   UNION
   (SELECT whom as id1, who as id2 FROM friends where who >= whoam)
  ) f
 LEFT JOIN contacts c1 ON f.id1 = c1.id
 LEFT JOIN contacts c2 ON f.id2 = c2.id
 ```
2.[Задание 2](Task_2.php).

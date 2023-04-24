## Сортирока по оценке

```sql
SELECT s.name, g.grade, s.marks
FROM students s
JOIN grades g ON s.marks BETWEEN g.min_mark AND g.max_mark
ORDER BY s.marks DESC;
```

```
 name  | grade | marks 
-------+-------+-------
 Maria |    10 |    95
 John  |    10 |    95
 Liam  |     9 |    87
 Robert|     8 |    83
 James |     7 |    64
 Olivia|     6 |    65
....
```

## Сортировка по именам для тех, у кого оценка от 8 и до 10.

```sql
SELECT s.name, g.grade, s.marks
FROM students s
JOIN grades g ON s.marks BETWEEN g.min_mark AND g.max_mark
ORDER BY 
  s.marks DESC,
  (CASE 
    WHEN g.grade BETWEEN 8 AND 10 THEN s.name 
  END) DESC;
```

Заменить имя у студентов, оценка которых ниже 8

```sql
SELECT 
	CASE WHEN s.marks < 8 THEN 'low' ELSE s.name END as name, 
	g.grade, 
	s.marks
FROM students s
JOIN grades g ON s.marks BETWEEN g.min_mark AND g.max_mark
ORDER BY 
  s.marks DESC,
  (CASE 
    WHEN g.grade BETWEEN 8 AND 10 THEN s.name
  END) ASC;
```

## Сортировка по оценкам у тех, у кого оценка между 1 и 7.

```sql
SELECT s.name, g.grade, s.marks
FROM students s
JOIN grades g ON s.marks BETWEEN g.min_mark AND g.max_mark
ORDER BY
  s.marks DESC, 
  (CASE 
    WHEN g.grade BETWEEN 1 AND 7 THEN s.marks
  END) ASC;
```


Если записей может быть много, то:
1. Надо создать индексы на столбцы, которые чаще всего используются (grades, marks).
2. Для стлбцов из таблицы Grade, вместо int лучше использовать smallint, т.к. диапазон данных в этих столбцах не такой уж и широкий.
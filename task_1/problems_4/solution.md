## Решение этой таски может быть разным, зависит как от используемой БД, так и от желаемых выходных результатов

### Первое решение
Обычный join.
```sql
select firstName, lastName, city.city from user
join city on city.id = user.city
```

### Второе решение 
Связать таблицы правым join'ом, тогда получим в дополнение список городов, которые никак не связаны с пользователями
```sql
select 
    case
    when firstName is Null then 'Нет пользователя'
    end as firstName,
    
    case
    when lastName is Null then 'Нет пользователя'
    end as lastName, 
    
    city.city from user
right join city on city.id = user.city
```

### Третье решение
Аналогичная история с левым join'ом и городами.<br>
Но этот запрос сработает только в том случае, если поле city в таблице user необязательно к заполнению.
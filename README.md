# Доброе утро и чудесного дня! (ветка с поддержкой нескольких источников)

Всю основную информацию читайте в ветке master.

Отличия этой версии бота: вы можете использовать несколько источников вместо одного.

Для этого используются файлы `pictures_[source].txt` и `used_[source].txt`, где `[source]` — любая строка, передаваемая в бота.

Запуск скрипта изменяется, вы должны добавить `[source]` третьим аргументом, например:

```
node out/index.js morning
```

или

```
node out/index.js evening
```

В cron меняется соответственно.

В `out/utils/scrapePostcards.js` тоже изменения: теперь вы можете передать третьим аргументом slug для API сайта otkritki ok, например:

```
node out/utils/scrapePostcards.js "ejednevnie/dobroe-utro"
```

или

```
node out/utils/scrapePostcards.js "ejednevnie/spokoynoy-nochi"
```

Слаги, судя по всему, это адрес страницы на сайте после части хоста: https://otkritkiok.ru/ejednevnie/spokoynoy-nochi
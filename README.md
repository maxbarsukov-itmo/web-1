# Лабораторная работа 1

> [!WARNING]
> С прошлого (2024/25) года **задание лабораторной работы №1 изменилось**, и теперь этот репозиторий не актуален. В [rmntim/ITMO](https://github.com/rmntim/ITMO/tree/main/Semester3/WebProgramming/Labwork1) можно найти пример выполненной ЛР для текущего задания, а также [гайд по ЛР1](https://github.com/rmntim/ITMO/tree/main/Semester3/WebProgramming/Labwork1/guide) и [видео-туториал по деплою](https://www.youtube.com/watch?v=URdECcC25vY&ab_channel=frizyy).

## Вариант `367088`

<img alt="anime" src="https://github.com/maxbarsukov-itmo/web-1/blob/master/.resources/anime.gif" height="200">

> PHP doesn't suck (anymore)?!!

![Build Status](https://github.com/maxbarsukov-itmo/web-1/workflows/PHP%20Composer/badge.svg)

|.pdf|.docx|
|-|-|
| [report](./docs/report.pdf) | [report](./docs/report.docx) |

Разработать PHP-скрипт, определяющий попадание точки на координатной плоскости в заданную область, и создать HTML-страницу, которая формирует данные для отправки их на обработку этому скрипту.

Параметр R и координаты точки должны передаваться скрипту посредством HTTP-запроса. Скрипт должен выполнять валидацию данных и возвращать HTML-страницу с таблицей, содержащей полученные параметры и результат вычислений - факт попадания или непопадания точки в область. Предыдущие результаты должны сохраняться между запросами и отображаться в таблице.

Кроме того, ответ должен содержать данные о текущем времени и времени работы скрипта.

### Разработанная HTML-страница должна удовлетворять следующим требованиям:

- Для расположения текстовых и графических элементов необходимо использовать **табличную верстку**.
- Данные формы должны передаваться на обработку посредством **GET-запроса**.
- Таблицы стилей должны располагаться в **отдельных файлах**.
- При работе с CSS должно быть продемонстрировано использование **селекторов дочерних элементов**, **селекторов элементов**, **селекторов потомств**, **селекторов псевдоклассов** а также такие свойства стилей CSS, как наследование и каскадирование.
- HTML-страница должна иметь "шапку", содержащую ФИО студента, номер группы и номер варианта. При оформлении шапки необходимо явным образом задать шрифт (**fantasy**), его цвет и размер в каскадной таблице стилей.
- Отступы элементов ввода должны задаваться в **пикселях**.
- Страница должна содержать сценарий на языке JavaScript, осуществляющий валидацию значений, вводимых пользователем в поля формы. Любые некорректные значения (например, буквы в координатах точки или отрицательный радиус) должны блокироваться.

<img alt="Areas" src="https://github.com/maxbarsukov-itmo/web-1/blob/master/.resources/areas.png" height="350">

### Вопросы к защите лабораторной работы:

**Ответы**: [*новые*](https://github.com/EgorMIt/ITMO/blob/master/2%20-%20%D0%92%D0%B5%D0%B1-%D0%9F%D1%80%D0%BE%D0%B3%D1%80%D0%B0%D0%BC%D0%BC%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD%D0%B8%D0%B5/Lab1.md) и [*старые*](https://github.com/AppLoidx/Web-Development-Cheats/blob/master/itmo-university/labs/Lab1.md)

1. Протокол `HTTP`. Структура запросов и ответов, методы запросов, коды ответов сервера, заголовки запросов и ответов.
2. Язык разметки `HTML`. Особенности, основные теги и атрибуты тегов.
3. Структура HTML-страницы. Объектная модель документа (`DOM`).
4. `HTML-формы`. Задание метода HTTP-запроса. Правила размещения форм на страницах, виды полей ввода.
5. Каскадные таблицы стилей (`CSS`). Структура - правила, селекторы. Виды селекторов, особенности их применения. Приоритеты правил. Преимущества CSS перед непосредственным заданием стилей через атрибуты тегов.
6. `LESS`, `Sass`, `SCSS`. Ключевые особенности, сравнительные характеристики. Совместимость с браузерами, трансляция в "обычный" CSS.
7. Клиентские сценарии. Особенности, сферы применения. Язык `JavaScript`.
8. Версии `ECMAScript`, новые возможности `ES6` и `ES7`.
9. Синхронная и асинхронная обработка HTTP-запросов. `AJAX`.
10. Библиотека `jQuery`. Назначение, основные API. Использование для реализации AJAX и работы с DOM.
11. Реализация AJAX с помощью `SuperAgent`.
12. Серверные сценарии. `CGI` - определение, назначение, ключевые особенности.
13. `FastCGI` - особенности технологии, преимущества и недостатки относительно CGI.
14. Язык `PHP` - синтаксис, типы данных, встраивание в веб-страницы, правила обработки HTTP-запросов. Особенности реализации принципов ООП в PHP.

### Как запустить?

#### Локально

`php -S localhost:3000 -t src`, чтобы запустить лабораторную на http://localhost:3000.

#### Helios

[Гайд](https://github.com/AppLoidx/Web-Development-Cheats/blob/master/itmo-university/deploy.md) по деплою на helios.

#### Тестирование

Используйте

    composer install
    vendor/bin/phpunit tests

чтобы запустить тесты.

## Лицензия <a name="license"></a>

Проект доступен с открытым исходным кодом на условиях [Лицензии MIT](https://opensource.org/licenses/MIT).
*Авторские права 2023 Max Barsukov*

**Поставьте звезду :star:, если вы нашли этот проект полезным.**

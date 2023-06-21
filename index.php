<?php 
include 'insert.php';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Заявка на услуги</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
    <div class="form-container">
        <h2>Заявка на услуги</h2>
        <form id="form" action="index.php" method="post">
        
            <label for="services">Выберите услугу</label>

            <div class="main-content col-md-9 col-12">
                <select id="services" name="services">
                    <option value="" selected disabled hidden>Выберите услугу</option>
                    <option id="workspace" value="workspace">Рабочее место</option>
                    <option id ="conference-hall" value="conference-hall">Конференц-зал</option>
                    <option id ="meeting-room" value="meeting-room">Переговорка</option>
                </select><br>
                <div class="pole" id="tariff_workspace">
                    <div class="tariffs"><h1 class ='tariffs_2'>Тариф "Гость"</h1>
                        <div class="buttons">
                            <button id="guest_4h" type="button" name="">4 часа</button>
                            <button id="guest_1d" type="button" name="">1 день</button>
                            <button id="guest_1m" type="button" name="">1 месяц</button>
                            <button id="guest_3m" type="button" name="">3 месяца</button>
                        </div>
                    </div>
                    <div class="tariffs"><h1 class ='tariffs_2'>Тариф "Резидент"</h1>
                        <div class="buttons">
                            <button id="resident_1m" type="button" name="">1 месяц</button>
                            <button id="resident_3m" type="button" name="">3 месяца</button>
                        </div>
                    </div>
                    <div class="tariffs"><h1 class ='tariffs_2'>Тариф "Агентство"</h1>
                        <div class="buttons">
                            <button id="agency" type="button" name="">Выбрать</button>
                        </div>
                    </div>
                    
                </div>
                <div class = "pole" id="tariff_conference-hall">
                    <div class="tariffs"><h1 class ='tariffs_2'>Конференц-зал</h1>
                    <div class ='tariffs_2'>1 час = 500 руб.</div>
                        <select class="notification" id="meeting_room" name="meeting_room">
                        <option value="" selected disabled hidden>Срок аренды</option>
                        <option id ="">1</option>
                        <option id ="">2</option>
                        <option id ="">3</option>
                        <option id ="">4</option>
                        <option id ="">5</option>
                        <option id ="">6</option>
                        <option id ="">7</option>
                        <option id ="">8</option>
                        </select><br>
                    </div>
                </div>
            </div>  
            <div class = "pole" id="tariff_meeting-room">
            <div class="tariffs"><h1 class ='tariffs_2'>Переговорка</h1>
                        <div class="buttons">
                            <button id="conf_room1h" type="button" name="">1 час</button>
                            <button id="conf_room4h" type="button" name="">Пол дня (4 часа)</button>
                            <button id="conf_room1d" type="button" name="">День</button>
                        </div>
                    </div>
            </div>
            <div><h4>Ваш выбор: </h4></div>
            <div id="hidden_div" class="hidden_field">
                <input name="tariff" id="hidden_f" type="text" value="Ваш тариф">
                <input name="duration" id="hidden_f2" type="text" value="Срок">
            </div>
                <label name="first-name"for="first-name">Имя</label>
            <input type="text" id="first-name" name="first-name" required>

            <label name="last-name"for="last-name">Фамилия</label>
            <input type="text" id="last-name" name="last-name" required>

            <label name="middle-name"for="middle-name">Отчество</label>
            <input type="text" id="middle-name" name="middle-name" required>

            <label for="email" for="middle-name">E-mail</label>
            <input type="email" id="email" name="email"  placeholder="email@example.com" required>

            <div class="row">
                <label name="phone" for="phone" id="phone-mask">Телефон:</label>
            </div>
            <div class="row" id="phone-mask">
            <input type="text" id="phone-input" name="phone_number" placeholder="+7 (___) ___-__-__">
            </div>
            <label for="activity">Вид деятельности</label>
            <input type="text" id="activity" name="activity" required>
            <div class="pay_button"><h3><b>Сумма к оплате: </b></h3></div>
            <div id="price" class="pay_button"></div>
            <div class="pay_button"><button name="add_record" id ="myButton" type="submit">Оплатить</button></div>
        </form>
    </div>
    <script src="https://unpkg.com/imask"></script>
    <script src="js/script.js"></script>
</body>
</html>
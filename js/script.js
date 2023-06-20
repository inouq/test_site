var selectBox = document.getElementById("services");
var meeting_room = document.getElementById("meeting_room");

var divBox = document.getElementById("tariff_workspace");
var divBox2 = document.getElementById("tariff_conference-hall");
var divBox3 = document.getElementById("tariff_meeting-room");

var guest_4h = document.getElementById("guest_4h");
var guest_1d = document.getElementById("guest_1d");
var guest_1m = document.getElementById("guest_1m");
var guest_3m = document.getElementById("guest_3m");
var resident_1m = document.getElementById("resident_1m");
var resident_3m = document.getElementById("resident_3m");
var agency = document.getElementById("agency");
var conf_room1h = document.getElementById("conf_room1h");
var conf_room4h = document.getElementById("conf_room4h");
var conf_room1d = document.getElementById("conf_room1d");

var hidden_f = document.getElementById("hidden_f");
var hidden_f2 = document.getElementById("hidden_f2");
var hidden_div = document.getElementById("hidden_div");
var price = document.getElementById("price");

var phone_input = document.getElementById('phone-input');
var maskOptions = {
  mask: '+7(000)000-00-00',
  lazy: false
}

var mask = new IMask(phone_input, maskOptions);

var myButton = document.getElementById('myButton');
  myButton.disabled = true;
  myButton.style.backgroundColor = 'gray';

// Добавляем обработчик событий "изменение"
selectBox.addEventListener("change", function() {
  // Получаем выбранное значение списка
  var selectedValue = selectBox.options[selectBox.selectedIndex].value;
  // Показываем или скрываем блок <div>
  if (selectedValue == "workspace") {
    divBox.style.display = "block";
    divBox2.style.display = "none";
    divBox3.style.display = "none";
  } else if (selectedValue == "conference-hall") {
    divBox2.style.display = "block";
    divBox.style.display = "none";
    divBox3.style.display = "none";
  } else if (selectedValue == "meeting-room") {
    divBox3.style.display = "block";
    divBox.style.display = "none";
    divBox2.style.display = "none";
  }
});

meeting_room.addEventListener("change", function() {
  var selectedValue = meeting_room.options[meeting_room.selectedIndex].value;

  hidden_div.style.display = "block";
  hidden_f.value = "'Конференц-Зал'";
  hidden_f2.value = selectedValue + " часа";
  price.innerHTML = "<h3><b>" + selectedValue * 500 + " руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

guest_4h.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Тариф 'Гость'";
  hidden_f2.value = "4 часа";
  price.innerHTML = "<h3><b>300 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

guest_1d.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Тариф 'Гость'";
  hidden_f2.value = "1 день";
  price.innerHTML = "<h3><b>400 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

guest_1m.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Тариф 'Гость'";
  hidden_f2.value = "1 месяц";
  price.innerHTML = "<h3><b>3500 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

guest_3m.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Тариф 'Гость'";
  hidden_f2.value = "3 месяца";
  price.innerHTML = "<h3><b>9000 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

// резидент
resident_1m.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Тариф 'Резидент'";
  hidden_f2.value = "1 месяц";
  price.innerHTML = "<h3><b>4500 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

resident_3m.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Тариф 'Резидент'";
  hidden_f2.value = "3 месяца";
  price.innerHTML = "<h3><b>12000 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

agency.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Тариф 'Агентство'";
  hidden_f2.value = "-";
  price.innerHTML = "<h3><b>-</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

// переговорка
conf_room1h.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Переговорка";
  hidden_f2.value = "1 час";
  price.innerHTML = "<h3><b>200 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

conf_room4h.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Переговорка";
  hidden_f2.value = "Пол дня (4 часа)";
  price.innerHTML = "<h3><b>500 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

conf_room1d.addEventListener("click", function() {
  hidden_div.style.display = "block";
  hidden_f.value = "Переговорка";
  hidden_f2.value = "День";
  price.innerHTML = "<h3><b>900 руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

phone_input.addEventListener("change", function() {
  const phoneRegex = /^\+7\s?\(?\d{3}\)?[-.\s]?\d{3}[-.\s]?\d{2}[-.\s]?\d{2}$/;
  var phone_value = phone_input.value;
  if (phoneRegex.test(phone_value)) {
    alert('Номер телефона корректен:', phone_value);
  } else {
    alert('Номер телефона некорректен:', phone_value);
  }
});

var selectBox = document.getElementById("services");
var meeting_room = document.getElementById("meeting_room");

var divBox = document.getElementById("tariff_workspace");
var divBox2 = document.getElementById("tariff_conference-hall");
var divBox3 = document.getElementById("tariff_meeting-room");

var hidden_f = document.getElementById("hidden_f");
var hidden_f2 = document.getElementById("hidden_f2");
var hidden_div = document.getElementById("hidden_div");
var total_price = document.getElementById("price");

var emailInput = document.getElementById("email");

var form = document.getElementById("form");

//Маска для поля ввода телефона --->
var phone_input = document.getElementById('phone-input');
var maskOptions = {
  mask: '+7(000)000-00-00',
  lazy: false
}

var mask = new IMask(phone_input, maskOptions);
//<---

var myButton = document.getElementById('myButton');
myButton.disabled = true;
myButton.style.backgroundColor = 'gray';

//Получение объектов кнопок
const buttons = document.querySelectorAll(".tariffs_button");

for (let button of buttons) {
  button.addEventListener("click", function() {
    setTariff(button.name);
  })
}

//Установка выбранного тарифа в поля информации.
function setInfo(tariffName, duration, price) {
  hidden_f.value = tariffName;
  hidden_f2.value = duration;
  total_price.innerHTML = "<h3><b>" + price + " руб.</b></h3>";
  return 0;
}

function setTariff(buttonName) {

  hidden_div.style.display = "block";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;

  switch (buttonName) {
    case "guest_4h":
      setInfo("Тариф 'Гость'", "4 часа", 300);
      break;

    case "guest_1d":
      setInfo("Тариф 'Гость'", "1 день", 400);
      break;

    case "guest_1m":
      setInfo("Тариф 'Гость'", "1 месяц", 3500);
      break;

    case "guest_3m":
      setInfo("Тариф 'Гость'", "3 месяца", 9000);
      break;
    
    case "agency":
      setInfo("Тариф 'Агентство'", "-", 0);
      break;
    
    case "resident_1m":
      setInfo("Тариф 'Резидент'", "1 месяц", 4500);
      break;

    case "resident_3m":
      setInfo("Тариф 'Резидент'", "3 месяца", 12000);
      break;

    case "conf_room1h":
      setInfo("Переговорка", "1 час", 200);
      break;

    case "conf_room4h":
      setInfo("Переговорка", "Пол дня (4 часа)", 500);
      break;

    case "conf_room1d":
      setInfo("Переговорка", "День", 900);
      break;

    default:
      hidden_div.style.display = "hide";
      myButton.style.backgroundColor = 'gray';
      myButton.disabled = true;
      alert("Ошибка выбора тарифа! Обратитесь к разработчику!");
  }
}

meeting_room.addEventListener("change", function() {
  var selectedValue = meeting_room.options[meeting_room.selectedIndex].value;

  hidden_div.style.display = "block";
  hidden_f.value = "'Конференц-Зал'";
  hidden_f2.value = selectedValue + " часа";
  price.innerHTML = "<h3><b>" + selectedValue * 500 + " руб.</b></h3>";
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

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

// function validateEmail(email) {
//   const re = /[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$/;
//   return re.test(String(email).toLowerCase());
// }

// emailInput.addEventListener('change', function() {
//   var b = validateEmail(emailInput.value);
//   if (b) {

//   } else {
//     const message = 'Введите корректный e-mail адрес';
//     emailInput.setCustomValidity(message);
//     emailInput.reportValidity();
//   }
// })


// // Находим форму и поле email
// const form = document.querySelector('form');
// // const emailInput = form.querySelector('email'); // #
// console.log(emailInput.value);
// // Обрабатываем событие отправки формы
// form.addEventListener('submit', function(event) {
//   // Предотвращаем отправку формы
//   event.preventDefault();

//   // Получаем значение email и проверяем его
//   const email = emailInput.value;
//   if (!validateEmail(email)) {
//     // Если email не валидный, то выводим сообщение с ошибкой
//     const message = 'Введите корректный email адрес';
//     emailInput.setCustomValidity(message);
//     emailInput.reportValidity();
//   } else {
//     // Если email валидный, то отправляем форму
//     // form.submit();
//   }
// });
const selectBox = document.getElementById("services");
const meetingRoom = document.getElementById("meeting_room");

const divBox = document.getElementById("tariff_workspace");
const divBox2 = document.getElementById("tariff_conference-hall");
const divBox3 = document.getElementById("tariff_meeting-room");

const hiddenF = document.getElementById("hidden_f");
const hiddenF2 = document.getElementById("hidden_f2");
const hiddenDiv = document.getElementById("hidden_div");
const totalPrice = document.getElementById("price");

const emailInput = document.getElementById("email");
const form = document.getElementById("form");

// Маска для поля ввода телефона
const phoneInput = document.getElementById('phone-input');
const maskOptions = {
  mask: '+7(000)000-00-00',
  lazy: false
};
const mask = new IMask(phoneInput, maskOptions);

const myButton = document.getElementById('myButton');
myButton.disabled = true;
myButton.style.backgroundColor = 'gray';

// Получение объектов кнопок
const buttons = document.querySelectorAll(".tariffs_button");
buttons.forEach(button => {
  button.addEventListener("click", () => {
    setTariff(button.name);
  });
});

// Установка выбранного тарифа в поля информации.
function setInfo(tariffName, duration, price) {
  hiddenF.value = tariffName;
  hiddenF2.value = duration;
  totalPrice.innerHTML = `<h3><b>${price} руб.</b></h3>`;
}

function setTariff(buttonName) {
  hiddenDiv.style.display = "block";
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
      hiddenDiv.style.display = "hide";
      myButton.style.backgroundColor = 'gray';
      myButton.disabled = true;
      alert("Ошибка выбора тарифа! Обратитесь к разработчику!");
  }
}

meetingRoom.addEventListener("change", () => {
  const selectedValue = meetingRoom.options[meetingRoom.selectedIndex].value;
  hiddenDiv.style.display = "block";
  hiddenF.value = "'Конференц-Зал'";
  hiddenF2.value = selectedValue + " часа";
  price.innerHTML = `<h3><b>${selectedValue * 500} руб.</b></h3>`;
  myButton.style.backgroundColor = '';
  myButton.disabled = false;
});

// Добавляем обработчик события "изменение"
selectBox.addEventListener("change", () => {
  const selectedValue = selectBox.options[selectBox.selectedIndex].value;
  // Показываем или скрываем блок <div>
  divBox.style.display = selectedValue === "workspace" ? "block" : "none";
  divBox2.style.display = selectedValue === "conference-hall" ? "block" : "none";
  divBox3.style.display = selectedValue === "meeting-room" ? "block" : "none";
});
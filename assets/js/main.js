// отображение мобильного меню
document.addEventListener("DOMContentLoaded", function () {
	document.getElementById("burger").addEventListener("click", function () {
		document.querySelector('.header').classList.toggle("open")
	})
})
// запрет скрола для мобильного меню
document.getElementById("burger").addEventListener("click", function () {
	document.querySelector('.bodySett').classList.toggle("burgerBodySettings")
})
// отключение кнопки
function addToCartBtn(button) {
  var originalText = button.innerText;

  button.innerText = 'Успешно добавлено';
  button.classList.add('disabled');
  button.disabled = true;

  setTimeout(function() {
    button.innerText = originalText;
    button.classList.remove('disabled');
    button.disabled = false;
  }, 10000);
}

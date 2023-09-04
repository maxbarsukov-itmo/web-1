"use strict";

let x, y, r;

window.onload = function () {
  function setOnClick(element) {
    element.onclick = function () {
      r = this.value;
      buttons.forEach(function (element) {
        element.style.boxShadow = "";
        element.style.transform = "";
      });
      this.style.boxShadow = "0 0 40px 5px #f41c52";
      this.style.transform = "scale(1.05)";
    }
  }

  let buttons = document.querySelectorAll("input[name=R-button]");
  buttons.forEach(setOnClick);
};

document.getElementById("checkButton").onclick = function () {
  if (validateX() && validateY() && validateR()) {
    const coords = "x=" + encodeURIComponent(x) + "&y=" + encodeURIComponent(y) + "&r=" + encodeURIComponent(r) +
      "&timezone=" + encodeURIComponent(Intl.DateTimeFormat().resolvedOptions().timeZone);

    fetch("./php/script.php?" + coords, {
      method: "GET",
      headers: { "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8" }
    }).then(response => response.text()).then(function (serverAnswer) {
      setPointer();
      document.getElementById("outputContainer").innerHTML = serverAnswer;
    }).catch(err => createNotification("Ошибка HTTP " + err.status + ". Повторите попытку позже." + err));
  }
};

function setPointer() {
  let pointer = document.getElementById("pointer");
  pointer.style.visibility = "visible";
  console.log(y);
  pointer.setAttribute("cx", x * 60 * 2/r + 150);
  pointer.setAttribute("cy", -y * 60 * 2/r + 150);
}

function createNotification(message) {
  let outputContainer = document.getElementById("outputContainer");
  if (outputContainer.contains(document.querySelector(".notification"))) {
    let stub = document.querySelector(".notification");
    stub.textContent = message;
    stub.classList.replace("outputStub", "errorStub");
  } else {
    let notificationTableRow = document.createElement("h4");
    notificationTableRow.innerHTML = "<span class='notification errorStub'></span>";
    outputContainer.prepend(notificationTableRow);
    let span = document.querySelector(".notification");
    span.textContent = message;
  }
}

function validateX() {
  try {
    x = document.querySelector("input[type=radio]:checked").value;
    return true;
  } catch (err) {
    createNotification("Значение X не выбрано");
    return false;
  }
}

function validateY() {
  y = document.querySelector("input[name=Y-input]").value.replace(",", ".");
  if (y === undefined) {
    createNotification("Y не введён");
    return false;
  } else if (!isNumeric(y)) {
    createNotification("Y не число");
    return false;
  } else if (!((y > -5) && (y < 3))) {
    createNotification("Y не входит в область допустимых значений");
    return false;
  } else return true;
}

function validateR() {
  if (isNumeric(r)) return true;
  else {
    createNotification("Значение R не выбрано");
    return false;
  }
}

function isNumeric(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}

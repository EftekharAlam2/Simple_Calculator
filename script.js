let display = document.getElementById("display");

function appendToDisplay(value) {
  const lastChar = display.value.slice(-1);

  const isLastCharOperator = /[\+\-\*\/\.]/.test(lastChar);

  if (/[\+\-\*\/]/.test(value) && isLastCharOperator) {
    return;
  }

  if (display.value === "Error") {
    display.value = value;
  } else {
    display.value += value;
  }
}

function clearDisplay() {
  display.value = "";
}

function calculate() {
  try {
    display.value = eval(display.value);
  } catch (error) {
    display.value = "Error";
  }
}

let display = document.getElementById("display");
let errorOccurred = false;

function appendToDisplay(value) {
  const lastChar = display.value.slice(-1);

  const isLastCharOperator = /[\+\-\*\/\.]/.test(lastChar);

  if (/[\+\-\*\/]/.test(value) && isLastCharOperator) {
    return;
  }

  if (errorOccurred) {
    display.value = value;
    errorOccurred = false;
  } else {
    display.value += value;
    errorOccurred = false;
  }
}

function clearDisplay() {
  display.value = "";
}

function calculate() {
  try {
    if (!errorOccurred) {
      display.value = eval(display.value);
    }
  } catch (error) {
    display.value = "Error";
    errorOccurred = true;
  }
}

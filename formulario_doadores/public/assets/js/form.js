document.addEventListener("DOMContentLoaded", function () {
  const inputs = document.querySelectorAll("input");

  inputs.forEach(input => {
    input.addEventListener("input", function () {
      const errorDiv = this.nextElementSibling;
      if (errorDiv && errorDiv.classList.contains("error")) {
        errorDiv.remove();
      }
    });
  });
});

function toggleInput() {
  var paymentType = document.querySelector('input[name="payment_type"]:checked')?.value;
  var debitField = document.getElementById('debit_field');
  var creditField = document.getElementById('credit_field');

  console.log(paymentType)

  if (paymentType === 'credit') {
    creditField.style.display = 'block'
    debitField.style.display = 'none';
  } else {
    creditField.style.display = 'none'
    debitField.style.display = 'block';
  }
}
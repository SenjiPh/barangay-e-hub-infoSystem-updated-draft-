"use strict";

(function () {
  // Fetch the form we want to apply custom validation to
  const form = document.getElementById("signupForm");

  form.addEventListener("submit", function (event) {
    if (!form.checkValidity()) {
      event.preventDefault();
      event.stopPropagation();
    }

    form.classList.add("was-validated");
  });
})();

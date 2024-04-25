const passField = document.querySelector(" input[type='password']");
const toggleIcon = document.querySelector(" .my-4 #password+i");
toggleIcon.onclick = function () {
  if (passField.type == "password") {
    passField.type = "text";
    toggleIcon.classList.add("active");
  } else {
    passField.type = "password";
    toggleIcon.classList.remove("active");
  }
};

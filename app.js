const sign_in_btn = document.querySelector("#sign-in-btn");
const sign_up_btn = document.querySelector("#sign-up-btn");
const container = document.querySelector(".container");

sign_up_btn.addEventListener("click", () => {
  container.classList.add("sign-up-mode");
});

sign_in_btn.addEventListener("click", () => {
  container.classList.remove("sign-up-mode");
});

// Password check
const form = document.querySelector('.sign-up-form');
const passwordInput = form.querySelector('input[name="password"]');

form.addEventListener('submit', (event) => {
  const password = passwordInput.value;

  if (!isPasswordValid(password)) {
    event.preventDefault();
    alert('Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one number.');
  }
});

function isPasswordValid(password) {
  const regex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
  return regex.test(password);
}
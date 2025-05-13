
const container = document.getElementById("container");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");


registerBtn.addEventListener("click", () => {
  container.classList.add("active");
});


loginBtn.addEventListener("click", () => {
  container.classList.remove("active");
});


document.querySelectorAll(".inputSubmit, .hidden").forEach(btn => {
  btn.onmousemove = function(e) {
      var rect = btn.getBoundingClientRect();
      var x = e.clientX - rect.left;
      var y = e.clientY - rect.top;

      btn.style.setProperty('--eixoX', x + 'px');
      btn.style.setProperty('--eixoY', y + 'px');
  };
});

gsap.from(".container", {
  x: -60,
  opacity: 0,
});

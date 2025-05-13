var btn = document.querySelector(".inputSubmit");

btn.onmousemove = function(e) {
    var x = e.pageX - btn.offsetLeft;
    var y = e.pageY - btn.offsetTop;

    btn.style.setProperty('--eixoX', x + 'px')
    btn.style.setProperty('--eixoY', y + 'px')
}

gsap.from(".container", {
    x:-60,
    opacity: 0,
}, "-=0")
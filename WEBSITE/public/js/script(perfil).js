document.addEventListener("DOMContentLoaded", function () {
    const alturaInput = document.getElementById("altura");
    const pesoInput = document.getElementById("peso");

    alturaInput.addEventListener("input", function (e) {
        let valor = e.target.value.replace(/\D/g, "");

        if (valor.length > 3) {
            valor = valor.substring(0, 3);
        }

        let formatado = valor;
        if (valor.length > 1) {
            formatado = valor.charAt(0) + "." + valor.slice(1);
        }

        e.target.value = formatado;
    });

    pesoInput.addEventListener("input", function (e) {
        let valor = e.target.value.replace(/[^0-9.]/g, "");
        let partes = valor.split(".");

        if (partes.length > 2) {
            valor = partes[0] + "." + partes.slice(1).join("");
        }
    
        if (partes.length === 2 && partes[1].length > 2) {
            valor = partes[0] + "." + partes[1].slice(0, 2);
        }
    
        if (partes[0].length > 3) {
            valor = partes[0].slice(0, 3) + (partes[1] ? "." + partes[1] : "");
        }
    
        e.target.value = valor;
    });

    gsap.registerPlugin(ScrollTrigger);

    gsap.to(".perfil__menu", {
        scrollTrigger: {
            trigger: ".container",
            start: "-20px top",
            scrub: true,
            pin: ".perfil__menu",
        }
    })

    document.querySelectorAll(".inputSubmit").forEach(btn => {
        btn.onmousemove = function(e) {
            var rect = btn.getBoundingClientRect();
            var x = e.clientX - rect.left;
            var y = e.clientY - rect.top;

            btn.style.setProperty('--eixoX', x + 'px');
            btn.style.setProperty('--eixoY', y + 'px');
        };
    });

    const tl = gsap.timeline({defaults:{}});

    tl.from("#navbar", {
        x:-60,
        opacity:0
    }, "-=0")
    .from(".perfil__menu", {
        x:-60,
        opacity:0
    }, "-=.2")

    .from(".perfil__data", {
        x:-60,
        opacity:0
    }, "-=.2")
});

document.addEventListener("DOMContentLoaded", function () {
    // Animação GSAP
    const tl = gsap.timeline({defaults: {}});

    tl.from("#navbar", {
        x: -60,
        opacity: 0
    })
    .from(".track", {
        y: -60,
        opacity: 0
    }, "-=.2")
    .from(".ranking__container", {
        x: 60,
        opacity: 0
    }, "-=.2")
    .from(".user, .logoff", {
        y: 60,
        opacity: 0
    }, "-=.2");

    // Efeito de movimento do mouse no botão "Entrar" ou "Logoff"
    let btn1 = document.querySelector(".offbutton");

    if (btn1) {
        btn1.onmousemove = function (e) {
            let rect = btn1.getBoundingClientRect();
            let x = e.clientX - rect.left;
            let y = e.clientY - rect.top;

            btn1.style.setProperty("--eixoX", x + "px");
            btn1.style.setProperty("--eixoY", y + "px");
        };
    }

    let btn2 = document.querySelector(".inputSubmit");

    if (btn2) {
        btn2.onmousemove = function (e) {
            let rect = btn2.getBoundingClientRect();
            let x = e.clientX - rect.left;
            let y = e.clientY - rect.top;

            btn2.style.setProperty("--eixoX", x + "px");
            btn2.style.setProperty("--eixoY", y + "px");
        };
    }

    // Animação para o botão "Entrar"
    if (document.querySelector('.logoff')) {
        const logoffBtn1 = document.querySelector('.logoff .offbutton');
        if (logoffBtn1) {
            gsap.from(logoffBtn1, {
                scale: 0.1,
                opacity: 0,
                duration: 1
            });
        }
    }

    if (document.querySelector('.addtracktime__container')) {
        const logoffBtn2 = document.querySelector('.addtracktime__container .inputSubmit');
        if (logoffBtn2) {
            gsap.from(logoffBtn2, {
                scale: 0.1,
                opacity: 0,
                duration: 1
            });
        }
    }


    // Formatação de tempo no input
    document.getElementById("tempoInput").addEventListener("input", function (e) {
        let valor = e.target.value.replace(/\D/g, "");  

        if (valor.length > 10) {
            valor = valor.substring(0, 10);
        }

        let formatado = "";
        if (valor.length > 6) {
            formatado = valor.slice(0,2) + ":" + valor.slice(2,4) + ":" + valor.slice(4,6) + "." + valor.slice(6,8);
        } else if (valor.length > 4) {
            formatado = valor.slice(0,2) + ":" + valor.slice(2,4) + ":" + valor.slice(4,6);
        } else if (valor.length > 2) {
            formatado = valor.slice(0,2) + ":" + valor.slice(2,4);
        } else {
            formatado = valor;
        }

        e.target.value = formatado; 
    });
});




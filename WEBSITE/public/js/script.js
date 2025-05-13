const tl = gsap.timeline({defaults: {}});

    tl.from("#navbar", {
        x: -60,
        opacity: 0
    })
    .from(".animated__text", {
        y: -60,
        opacity: 0
    }, "-=.2")
    .from(".about__container, .pistas__container, .com__container", {
        opacity: 0
    }, "-=.2");



gsap.registerPlugin(ScrollTrigger);

gsap.to(".tittle__about", {
    scrollTrigger: {
        trigger: ".about__container",
        start: "top top",
        end: "bottom 27%",
        scrub: 4,
        pin: ".tittle__about",
        pinSpacing: false,
    }
})

var btn = document.querySelector(".intro__container button");

btn.onmousemove = function(e) {
    var x = e.pageX - btn.offsetLeft;
    var y = e.pageY - btn.offsetTop;

    btn.style.setProperty('--eixoX', x + 'px')
    btn.style.setProperty('--eixoY', y + 'px')
}

document.querySelectorAll('.list-container .item').forEach(item => {
    item.addEventListener('click', function () {
        const link = item.getAttribute('data-link');
        if (link) {
            window.location.href = link;
        }
    })
})
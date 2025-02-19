function tornarEditavel(idCampo, tipo) {
    let span = document.getElementById(idCampo);
    let valorAtual = span.innerText;
    
    let input = document.createElement("input");
    input.type = tipo;
    input.value = valorAtual;
    input.id = "input" + idCampo;
    input.setAttribute("data-nr", "<?php echo $nr; ?>");
    
    input.addEventListener("blur", function() {
        salvarAlteracao(idCampo, tipo);
    });

    input.addEventListener("keydown", function(event) {
        if (event.key === "Enter") {
            salvarAlteracao(idCampo, tipo);
        }
    });

    span.replaceWith(input);
    input.focus();
}

document.addEventListener("DOMContentLoaded", function () {
    const title = document.querySelector(".title h1");
    const textWidth = title.offsetWidth;

    
    const styleSheet = document.styleSheets[0];
    styleSheet.insertRule(`
        @keyframes autoRun {
            from {
                left: 100%;
            }
            to {
                left: -${textWidth}px;
            }
        }
    `, styleSheet.cssRules.length);

    
    title.setAttribute("data-text", title.textContent);

    
    title.style.animation = "none";
    void title.offsetWidth; 
    title.style.animation = "autoRun 10s linear infinite";
});
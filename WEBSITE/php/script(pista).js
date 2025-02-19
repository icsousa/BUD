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
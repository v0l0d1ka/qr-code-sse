document.addEventListener("DOMContentLoaded", function() {
    const eventSource = new EventSource(qrCodeStream.sseUrl);
    const qrCodeElement = document.getElementById("qr-code");
    const qrTextElement = document.getElementById("qr-code-text");
    const qr = new QRCode(qrCodeElement, {
        text: "Loading...",
        width: 128,
        height: 128
    });

    eventSource.onmessage = function(event) {
        try {
            const data = JSON.parse(event.data);
            qrTextElement.innerText = data.code;
            qr.makeCode(data.code);
        } 
        catch (e) {
            console.error("Failed to parse event data:", e);
        }
    };
});

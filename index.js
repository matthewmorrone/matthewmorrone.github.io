document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('link[rel="import"]')
        .forEach(link => fetch(link.href)
        .then(res => res.text())
        .then(html => link.outerHTML = html));
});

$(() => {
    $(document).on("click", "a", function(e) {
        if ($(this).hasClass("email")) {
            window.open("znvygb:znggurjzbeebar1@tznvy.pbz".replace(/[A-Z]/gi, c =>
                "NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm"[
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".indexOf(c)]))
        }
    });
    $("#year").text(new Date().getFullYear()-2);
});
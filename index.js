document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('link[rel="import"]')
        .forEach(link => fetch(link.href)
        .then(res => res.text())
        .then(html => link.outerHTML = html));

    document.addEventListener("click", function(e) {
        if (e.target && e.target.matches("a.email")) {
            e.preventDefault();
            window.open("znvygb:znggurjzbeebar1@tznvy.pbz".replace(/[A-Z]/gi, c =>
                "NOPQRSTUVWXYZABCDEFGHIJKLMnopqrstuvwxyzabcdefghijklm"[
                "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz".indexOf(c)]));
        }
    });
});


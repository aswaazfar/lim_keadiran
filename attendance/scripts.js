// Fungsi untuk menu aktif
var url = window.location.href.split('?')[0];
var menu_items = document.getElementByClassName("menu-item");
for (let i = 0; i < menu_items.length; i++) {
    let link = menu_items[i].children[0].href;
    if (link == url) {
        menu_items[i].classList.add("menu-active");
    }
}

// Fungsi untuk mengubah saiz teks
function ubahSaizFont(saiz) {
    txt = document.getElementByClassName("teks");
    for (let i = 0; i < txt.length; i++) {
        style = window.getComputedStyle(txt[i], null).getPropertyValue("font-size");
        saizSekarang = parseFloat(style);
        txt[i].style.fontsize = (saizSekarang + saiz) + 'px';
    }
}
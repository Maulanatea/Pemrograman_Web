const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

//menghilangkan tombol cari
tombolCari.style.display = 'none';

//event ketika kita menuliskan keyword
keyword.addEventListener('keyup', function() {
    //menjalankan ajax (ada 2 cara)
    //ajax adalah bagaimana cara kita untuk melakukan request terhadap sebuah sumber(halaman/website lain) tanpa melakukan refresh pada halaman halaman
    //1.xmlhttpRequest
    // const xhr = new XMLHttpRequest();

    // xhr.onreadystatechange = function () {
    //     if (xhr.readyState == 4 && xhr.status == 200) {
    //         container.innerHTML = xhr.responseText;
    //     }
    // };

    // xhr.open('get', 'ajax/ajax_cari.php?keyword=' + keyword.value);
    // xhr.send();

    //2. fetch
    fetch('ajax/ajax_cari.php?keyword=' + keyword.value)
    .then((Response) => Response.text())
    .then((Response) => (container.innerHTML = Response));

});
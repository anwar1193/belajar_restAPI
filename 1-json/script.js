// 1. Dari Object Ke JSON (JSON.stringify)

// let mahasiswa = {
//     nama : "Munawar Ahmad",
//     nim : "1201065",
//     email : "anwarahmad391@gmail.com"
// }

// console.log(JSON.stringify(mahasiswa));


// 2. Dari JSON ke Object (Dengan JQUERY / $.getJSON() )
$.getJSON('coba.json', function(data) {
    console.log(data);
});

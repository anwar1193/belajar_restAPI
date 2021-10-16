// Tampil Data Keseluruhan
function tampilSemuaMenu(){
	$.getJSON('pizza.json',function(data){
		let menu = data.menu; 								//bikin variable menu -> .menu dari nama object di pizza.json
		$.each(menu, function (i, data){ //$.each() -> pengulangan object di jquery
			$('#daftar-menu').append(`<div class="col-md-4">
					<div class="card">
					  <img src="` + data.gambar + `" class="card-img-top" alt="...">
					  <div class="card-body">
						<h5 class="card-title">` + data.nama + `</h5>
						<p class="card-text">`+ data.deskripsi +`</p>
						<h5 class="card-title">` + data.harga + `</h5>
						<a href="#" class="btn btn-primary">Pesan Sekarang</a>
					  </div>
					</div>
					
				</div>`);
		});
	});
}

tampilSemuaMenu();  // panggil function tampil semua menu



//Saat Menu Di Klik
$('.nav-link').on('click', function(){				// kalo class navlink di klik, maka
	$('.nav-link').removeClass('active');			// semua class active dihilangkan (remove)
	$(this).addClass('active');						// this (yang di klik) di tambah class active
	
	let kategori = $(this).html(); // variable ketegori = tulis (berubah menjadi) kata/menu yang di klik
	$('#judul').html(kategori); 	   // (setiap id judul akan berubah jadi kategori / tulisan(menu) yang di klik)
	
	if(kategori == 'All Menu'){
		tampilSemuaMenu();
		return; //supaya keluar dari function
	}
	
	//tampil data berdasarkan kategori (menu yang di klik)
	$.getJSON('pizza.json', function(data){
		let menu = data.menu;
		let content = '';
		
		$.each(menu, function(i, data){
			if(data.kategori == kategori.toLowerCase()){ //to lower case karena data kategori yang ada di pizza.json huruf kecil, sedangkan kategori di menu huruf besar
				content += `<div class="col-md-4">
				<div class="card">
				  <img src="` + data.gambar + `" class="card-img-top" alt="...">
				  <div class="card-body">
					<h5 class="card-title">` + data.nama + `</h5>
					<p class="card-text">` + data.deskripsi + `</p>
					<h5 class="card-title">` + data.harga + `</h5>
					<a href="#" class="btn btn-primary">Pesan Sekarang</a>
				  </div>
				</div>
				
			</div>`;
			}
		});
		
		$('#daftar-menu').html(content); // semua di id daftar-menu ditimpa dengan content (berdasarkan kategori yang di klik)
		
	});
});
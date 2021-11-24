$(document).ready(function () {
  tampil_provinsi();

  function tampil_provinsi() {
    $.ajax({
      url: "https://api.rajaongkir.com/starter/province",
      type: "get",
      dataType: "json",
      data: {
          key: 'b4a17c5ab4ec8196e29f63b00ae95bc6'
      },
      success: function(hasil){
        let provinsis = hasil.rajaongkir;
        let provinsi = provinsis.results;
        $.each(provinsi, function(i, data){
            $('#provinsi_asal').append(
                `
                  <option value="`+data.province_id+`">`+data.province+`</option>
                `
            );
        });

        $.each(provinsi, function(i, data){
          $('#provinsi_tujuan').append(
              `
                <option value="`+data.province_id+`">`+data.province+`</option>
              `
          );
      });
      }
    });
  }


  function tampil_kota(id_provinsi){
    $.ajax({
      url: "https://api.rajaongkir.com/starter/city",
      type: "get",
      dataType: "json",
      data: {
        key: 'b4a17c5ab4ec8196e29f63b00ae95bc6',
        province: id_provinsi
      },
      success: function(hasil){
        let kotas = hasil.rajaongkir;
        let kota = kotas.results;
        $.each(kota, function(i, data){
          $('#kota_asal').append(
            `
              <option value="`+data.city_id+`">`+data.city_name+`</option>
            `
          );
        });
      }
    });
  }

  function tampil_kota_tujuan(id_provinsi){
    $.ajax({
      url: "https://api.rajaongkir.com/starter/city",
      type: "get",
      dataType: "json",
      data: {
        key: 'b4a17c5ab4ec8196e29f63b00ae95bc6',
        province: id_provinsi
      },
      success: function(hasil){
        let kotas = hasil.rajaongkir;
        let kota = kotas.results;
        $.each(kota, function(i, data){
          $('#kota_tujuan').append(
            `
              <option value="`+data.city_id+`">`+data.city_name+`</option>
            `
          );
        });
      }
    });
  }


  function tampil_cost(){
    let origin = $('#kota_asal').val();
    let destination = $('#kota_tujuan').val();
    let weight = $('#berat').val();
    let courier = $('#kurir').val();

    $.ajax({
      url: "https://api.rajaongkir.com/starter/cost",
      type: "post",
      dataType: "json",
      data: {
        key: 'b4a17c5ab4ec8196e29f63b00ae95bc6',
        origin: origin,
        destination: destination,
        weight: weight,
        courier: courier
      },
      success: function(hasil){
        let cost = ((hasil.rajaongkir).results[0]).costs;

        $.each(cost, function(i, data){

          $('#data_cost').append(
            `
              <tr>
                <td>`+data.service+`</td>
                <td>`+data.description+`</td>
                <td>`+(data.cost[0]).value+`</td>
              </tr>
            `
          )
        });
      }
    });

    $('#nama_kurir').text(courier.toUpperCase());

  }


  $(document).on('change', '#provinsi_asal', function(){
    // Refresh dulu kota asal bekas pemanggilan sebelumnya
    $('#kota_asal').html(`<option value="">- Pilih Kota Asal -</option>`);
    let id_provinsi = $(this).val();
    tampil_kota(id_provinsi);
  });

  $(document).on('change', '#provinsi_tujuan', function(){
    // Refresh dulu kota asal bekas pemanggilan sebelumnya
    $('#kota_tujuan').html(`<option value="">- Pilih Kota Tujuan -</option>`);
    let id_provinsi = $(this).val();
    tampil_kota_tujuan(id_provinsi);
  });

  $(document).on('click', '#tombol-proses', function(){
    $('#data_cost').html('');
    tampil_cost();
  });


});

$( document ).ready(function() {

  $('.product').each(calculate);
  $('.product').change(calculate);

//------calculate subtotal in the main table------
  function calculate(){
    if($('.quantity', this).val() != 0){
        var subtotal = $('.price', this).text() * $('.quantity', this).val();
        subtotal = parseFloat(subtotal).toFixed(2);
        $('.subtotal', this).text(subtotal);
        var total = 0;
        $('.subtotal').each(function() {
            total += Number($(this).text());
        });
        total = parseFloat(total).toFixed(2);
        $('.total').text(total);
    }else{
        var price = parseFloat($('.price', this).text()).toFixed(2);
        $('.price', this).text(price);
        $('.subtotal', this).text('');
        $('.total').text('');
    }
  }
//--------------------------------------------


//---------------show shop cart modal-------------------
  $('#shopCartModal').on('shown.bs.modal', function () {
    $('.cart').remove();
    var n = 0;
    $('.product').each(toCart);
    function toCart(){
      if($('.quantity', this).val() != 0){
          n = n + 1;
          var item = ($('.name', this).text() != '') ? $('.name', this).text() :'';
          var item_id = ($('.name', this).attr('id') != '') ? $('.name', this).attr('id') :'';
          var code = ($('.price', this).prev().text() != '') ? $('.price', this).prev().text() :'';
          var price = ($('.price', this).text() != '') ? $('.price', this).text() :'';
          var quantity = ($('.quantity', this).val() != '') ? $('.quantity', this).val() :'';
          var subtotal = ($('.subtotal', this).text() != '') ? $('.subtotal', this).text() :'';
          var table_row = "";
          table_row = '<tr class="cart">\n <td scope="row" style="width: 20px !important;">' + n + '</td>\n <td id="' + item_id + '">' + item
          + '</td>\n <td>' + code + '</td>\n <td>' + price + '</td>\n <td>' + quantity
          + '</td>\n <td>' + subtotal + '</td>\n </tr>';
          $('.tbody-modal').append(table_row);
      }
    }

    if (n == 0) {
      $('.tbody-modal').append('<tr class="cart">\n <td>Your Shopping Cart Is Empty! <i class="fa fa-frown-o" aria-hidden="true" style="font-size:20px;"></i></td>\n </tr>');
    } else {
      var total = $('.total').text();
      var total_row = '<tr class="cart">\n <td scope="row" style="width: 20px !important;"></td>\n <td></td>\n <td></td>\n <td></td>\n <td style="font-weight: bold">TOTAL:</td>\n <td style="font-weight: bold;">'
      + total + '</td>\n </tr>';
      $('.tbody-modal').append(total_row);
    }
  })
//---------------------------------------------------------------------------------

});
$(document).ready(function(){
  let precio = 0;
  $("#idCategorySales").change(function(){
    var categoria = $(this).val();
    console.log(categoria);
    $.get('productByCategory/'+categoria, 
    function(data){
        idProductSales = '<option>Seleccione</option>';
        for (var i=0; i < data.length;i++)
        {
          idProductSales += '<option id="'+data[i].price+'" value="'+data[i].id+'" data-avaliable="'+data[i].total+'">'+data[i].name+'</option>';
        }
        $("#idProductSales").html(idProductSales);
        $("#cantSales").attr('readOnly','readOnly');
    });
  });
  
  $("#idProductSales").change(function(){
    $("#cantSales").removeAttr('readOnly');
    var cantidad = $('#idProductSales').children(":selected").attr("data-avaliable");
    $('#available').val(cantidad);
  });

  $("#cantSales").keyup(function(){
    var price = $('#idProductSales').children(":selected").attr("id");
    var a = $(this).val();
    var b = $('#available').val();
    $('#priceSales').val(parseFloat(price*a, 10).toFixed(2).replace(/(\d)(?=(\d{3})+\.)/g, "$1,").toString());
    //$('#priceSales').val(parseFloat(price*cant));
    if(a > (b))
    {
      $(this).val('');
      $('#priceSales').val('0,00');
    }
  });
});
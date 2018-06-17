function UpdateCart(json, status, xhr){
  if(json.bucket) {
      $('#bucket').html(json.bucket);
      $('#bucket .addProduct').click( AddProduct );
      $('#bucket .delProduct').click( DeleteProduct );
  }
}

function AddProduct(e){
  var product_id = $(e.target).data('product'); //Get the product id

  var DataToSend = { "id": product_id, "command": "add" };  //get json ready to send with AJAX
  $.ajax({
    url: 'http://localhost/webshop_final/app/ajax.php',
    type: "post",
    data: { json: JSON.stringify(DataToSend) },
    dataType: "json",
    success: UpdateCart
  });
}


function DeleteProduct(e){
  var product_id = $(e.target).data('product');

  var DataToSend = { "id": product_id, "command": "del" };
  $.ajax({
    url: 'http://localhost/webshop_final/app/ajax.php',
    type: "post",
    data: { json: JSON.stringify(DataToSend) },
    dataType: "json",
    success: UpdateCart
  });
}

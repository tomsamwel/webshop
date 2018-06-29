var RemoteBase = window.location.hostname;
var isPublic = false;
// change this on the page with
// echo 'var RemoteBase = ' . Http::webroot();
// <script src="cart.js"> before this line ^

function UpdateCart(json, status, xhr){
  if(json.bucket) {
      $('#bucket').html(json.bucket);
      $('#bucket .addProduct').click( AddProduct );
      $('#bucket .delProduct').click( DeleteProduct );
  }
}

//add
function AddProduct(e){
  var product_id = $(e.target).data('product'); //Get the product id

  var DataToSend = { "id": product_id, "command": "add" };  //get json ready to send with AJAX
  $.ajax({
    url: RemoteBase + (isPublic ? '../':'')+'app/ajax.php',
    type: "post",
    data: { json: JSON.stringify(DataToSend) },
    dataType: "json",
    success: UpdateCart
  });
}

//delete
function DeleteProduct(e){
  var product_id = $(e.target).data('product');

  var DataToSend = { "id": product_id, "command": "del" };
  $.ajax({
    url: RemoteBase + (isPublic ? '../':'')+'app/ajax.php',
    type: "post",
    data: { json: JSON.stringify(DataToSend) },
    dataType: "json",
    success: UpdateCart
  });
}

// jQuery skripta provjerava da li postoje nepročitane narudžbe
function notification() {
    $.get("http://infostudio.test/orders/new", function(data){
        notification = data[0]
        notify = Object.values(data)
        if (notify == "0") {
            $('.orders').html('<p>(New)</p>')
        }
   })
  }
  setInterval(notification, 3000)
      

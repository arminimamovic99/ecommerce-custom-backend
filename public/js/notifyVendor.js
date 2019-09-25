function notification() {
    $.get("http://infostudio.test/pending/new", function(data){
        notification = data[0]
        approved = Object.values(data)
        if (approved == "1") {
            $('.notification').html('<p>Your request to publish a product has been approved</p>').addClass('alert alert-success')
        }
   })
  }
  setInterval(notification, 3000)
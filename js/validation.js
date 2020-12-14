
function checkempty(id) {
  var idValue = document.getElementById(id).value;
  if (idValue.length == 0) {
    var msgId = id + "1";
    $('#submit').prop("disabled", true);
    document.getElementById(id).style.border = "4px solid red";
    document.getElementById(msgId).innerHTML = "This Field is Required";
  } else {
    var msgId = id + "1";
    $('#submit').prop("disabled", false);
    document.getElementById(id).style.border = "4px solid green";
    document.getElementById(msgId).innerHTML = "";
  }
}


$(document).ready(function() {
  $("#mailbox").on('keyup',function() {
    let v = $(this).val();
    let reg = new RegExp('((^[0-9]*$)|(^[A-Za-z]+$))');
    if (reg.test(v)) {
      $("#mailbox1").html("");
    } else {
      $('#submit').prop("disabled", true);
      $("#mailbox1").html("Please Enter Valid Character(Only numeric/ only alphabetic,No white spaces,No '.' allowed)");
    }

  })

  $("#language").on('keyup',function() {
    let v = $(this).val();
    let reg = new RegExp('(^[a-zA-Z0-9]*[a-zA-Z]+[0-9]*(,?([a-zA-Z0-9]*[a-zA-Z]+[0-9]*)+)*$)');
    if (reg.test(v)) {
      $("#language1").html("");
    } else {
      $('#submit').prop("disabled", true);
      $("#language1").html("Please Enter Valid Character");
    }

  })




  $("#freedomain").on('keyup',function() {
    let v = $(this).val();
    let reg = new RegExp('((^[0-9]*$)|(^[A-Za-z]+$))');
    if (reg.test(v)) {
      $("#freedomain1").html("");
    } else {
      $('#submit').prop("disabled", true);
      $("#freedomain1").html("Please Enter Valid Character(Only numeric/ only alphabetic,No white spaces,No '.' allowed)");
    }
  })


  $("#webspace").on('keyup',function() {
    let v = $(this).val();
    let reg = new RegExp('([0-9]+(.[0-9]+)?)');
    if ($.isNumeric(v)) {
      $("#webspace1").html("");

    } else {
      $('#submit').prop("disabled", true);
      $("#webspace1").html("Please Enter Valid Character,Only Numeric And Single . Allowed, Maximum Length Will Be 5");
    }
  })


  $("#bandwidth").on('keyup',function() {
    let v = $(this).val();
    if ($.isNumeric(v)) {
      $("#bandwidth1").html("");

    } else {
      $('#submit').prop("disabled", true);
      $("#bandwidth1").html("Please Enter Valid Character,Only Numeric And Single. Allowed, Maximum Length Will Be 15");
    }
  })

  $("#sku").on('keyup',function() {
    var v = $(this).val();
    var reg = new RegExp('^[a-zA-Z0-9#](?:[a-zA-Z0-9_-]*[a-zA-Z0-9])?$');
    if (reg.test(v)) {
      $("#sku1").html("");
    } else {
      $('#submit').prop("disabled", true);
      $("#sku1").html("Not only special character ,only '#', ' - ' special char allowed But Only on First Position");

    }
  });

  $("#annualprice").on('keyup',function() {
    var v = $(this).val();
    if ($.isNumeric(v)) {
      $("#annualprice1").html("");
    } else {
      $('#submit').prop("disabled", true);
      $("#annualprice1").html("Only Numeric And Single . Allowed");

    }
  });



  $("#monthlyPrice").on('keyup',function() {
    var v = $(this).val();
    if ($.isNumeric(v)) {
      $("#monthlyPrice1").html("");
    } else {
      $('#submit').prop("disabled", true);
      $("#monthlyPrice1").html("Only Numeric And Single . Allowed");

    }
  });

  $("#productName").on('keyup',function() {
    let v = $(this).val();
    let reg = new RegExp(/^[a-zA-Z]*[-\s]?[a-zA-Z]+[-\s]?[0-9]*(([a-zA-Z0-9]*[-\s]?[a-zA-Z]+[-\s]?[0-9]*)+)*$/);
    if (reg.test(v)) {
      $("#productName1").html("");
    } else {
      $('#submit').prop("disabled", true);
      $("#productName1").html("Invalid Input, should be Alpha numeric/ alphabetic,Not only numeric,Only - special char allowed ,No White Spaces");
    }

  })

})

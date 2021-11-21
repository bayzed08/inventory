$(document).ready(function() {
    //TOGGLE Add Stock Product Model
    $("#StockEntryForm").click(function() {
            $("#addStockDataform").toggle(600);
        })
    $("#stockListHead").click(function() {
            $("#stockList").toggle(600);
        })
});

//product Search//Product Category Search In StockEntry
$("#productnamesearch").on("input", function() {
    $productnamesearch = $("#productnamesearch").val();
    if ($productnamesearch.length > 0) {
        $.get("resproductname_ack.php", {
            "productnamesearch": $productnamesearch
        }, function($data1) {
            $("#resultproduct").fadeIn();
            $("#resultproduct").html($data1);
        });
    } else {
        $("#resultproduct").fadeOut();
    }
    $(document).on('click', 'li', function() {
        $('#productnamesearch').val($(this).text());
        $('#resultproduct').fadeOut();
    });
});

  //product brand Search
  $("#brand").on("input", function() {
    $brand = $("#brand").val();
    $productnamesearch = $("#productnamesearch").val();
      if ($brand.length > 0) {
        $.get("resBrandName.php", {
            "productnamesearch": $productnamesearch,
          }, function ($data2) {
            $("#resultBrand").fadeIn();
            $("#resultBrand").html($data2);
          });
      } else {
        $("#resultBrand").fadeOut();
      }
    $(document).on('click', 'ol', function() {
        $('#brand').val($(this).text());
        $('#resultBrand').fadeOut();
    });
});

 //product MODEL Search
 $("#modelname").on("input", function() {
    $modelname = $("#modelname").val();
    $productnamesearch = $("#productnamesearch").val();
    if ($modelname.length > 0) {
        $.get("resmodelname.php", {
            "productnamesearch": $productnamesearch,
            "modelname": $modelname
        }, function($data1) {
            $("#resultmodel").fadeIn();
            $("#resultmodel").html($data1);
        });
    } else {
        $("#resultmodel").fadeOut();
    }
    $(document).on('click', 'ul', function() {
        $('#modelname').val($(this).text());
        $('#resultmodel').fadeOut();
    });
 });




//Insert Stock Entry To DB
$('#addStockDataform').on('submit', function(e) {
    e.preventDefault();
    $("#msg").html("");
    //console.log( $( this ).serialize() );
    $.ajax({
        url: 'stockEntry_InsertDB.php',
        type: 'post',
        data: $('#addStockDataform').serialize(),
        success: function(data) {
            if (data = 'OK') {
                $("#msg").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong><span class="glyphicon glyphicon-ok-sign"></span> </strong>' + "Successfully Inserted" +
                    '</div>').fadeIn(3000).fadeOut(1000);
                $('#addStockDataform')[0].reset();
                setTimeout(function() {
                    window.location.href = 'stockEntry.php';
                }, 2000);

            } else {
                $("#msg").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong><span class="glyphicon glyphicon-ok-sign"></span> </strong>' + "NOT Inserted" +
                    '</div>').fadeIn(1000).fadeOut(2000);
                setTimeout(function() {
                    window.location.href = 'stockEntry.php';
                }, 2000);
            }
        }
    });
    return false;
});


 // search in stockEntry Table
 function searchStock() {
    var input, filter, table, tr, td, cell, i, j;
    input = document.getElementById("mysearch");
    filter = input.value.toUpperCase();
    table = document.getElementById("StockEntryTable");
    tr = table.getElementsByTagName("tr");
    for (i = 1; i < tr.length; i++) {
        // Hide the row initially.d
        tr[i].style.display = "none";

        td = tr[i].getElementsByTagName("td");
        for (var j = 0; j < td.length; j++) {
            cell = tr[i].getElementsByTagName("td")[j];
            if (cell) {
                if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                }
            }
        }
    }
}
$(document).ready(function() {
    //TOGGLE Add Stock Product Model
    $("#ProductModelEntryHead").click(function() {
            $("#AddModelBody").toggle(600);
        })
        //TOGGLE স্টক প্রোডাক্ট লিস্ট
    $("#stockProductHead").click(function() {
            $("#stockProductBody").toggle(600);
        })
        //Toggle productBrand List
    $("#ProductBrandHead").click(function() {
        $("#ProductBrandBody").toggle(600);
    })

    //Toggle Add productBrand
    $("#AddBrandHead").click(function() {
        $("#AddBrandBody").toggle(600);
    })
});

//product Search//Product Category Search In Model part
$("#productnamesearch").on("input", function() {
    $productnamesearch = $("#productnamesearch").val();
    if ($productnamesearch.length > 0) {
        $.get("ack_search_Productname.php", {
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

//product Search//Product Category Search In Brand Part
$("#productnamesearch2").on("input", function() {
    $productnamesearch2 = $("#productnamesearch2").val();
    if ($productnamesearch2.length > 0) {
        $.get("resproductname.php", {
            "productnamesearch": $productnamesearch2
        }, function($data1) {
            $("#resultproduct2").fadeIn();
            $("#resultproduct2").html($data1);
        });
    } else {
        $("#resultproduct2").fadeOut();
    }
    $(document).on('click', 'li', function() {
        $('#productnamesearch2').val($(this).text());
        $('#resultproduct2').fadeOut();
    });
});

//Insert AddBrand To DB
$('#brandDataform').on('submit', function(e) {
    e.preventDefault();
    $("#msg2").html("");
    //console.log( $( this ).serialize() );
    $.ajax({
        url: 'stockproduct_brand_Insert.php',
        type: 'post',
        data: $('#brandDataform').serialize(),
        success: function(data) {
            if (data = 'OK') {
                $("#msg2").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong><span class="glyphicon glyphicon-ok-sign"></span> </strong>' + "Successfully Inserted" +
                    '</div>').fadeIn(3000).fadeOut(1000);
                $('#brandDataform')[0].reset();
                setTimeout(function() {
                    window.location.href = 'stockproduct.php';
                }, 2000);

            } else {
                $("#msg2").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong><span class="glyphicon glyphicon-ok-sign"></span> </strong>' + "NOT Inserted" +
                    '</div>').fadeIn(1000).fadeOut(2000);
                setTimeout(function() {
                    window.location.href = 'stockproduct.php';
                }, 2000);
            }
        }
    });
    return false;
});

//Insert AddModel To DB
$('#addModelDataform').on('submit', function(e) {
    e.preventDefault();
    $("#msg").html("");
    //console.log( $( this ).serialize() );
    $.ajax({
        url: 'stockproduct_Model_Insert.php',
        type: 'post',
        data: $('#addModelDataform').serialize(),
        success: function(data) {
            if (data = 'OK') {
                $("#msg").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong><span class="glyphicon glyphicon-ok-sign"></span> </strong>' + "Successfully Inserted" +
                    '</div>').fadeIn(2000).fadeOut(2000);
                $('#brandDataform')[0].reset();
                setTimeout(function() {
                    //$('#ackshowprintandDelete').load(' #ackshowprintandDelete'); // for only reload ackshowprintandDelete ...but some problem
                    window.location.href = 'stockproduct.php';
                }, 2000);

            } else {
                $("#msg").html('<div class="alert alert-success alert-dismissible" role="alert">' +
                    '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>' +
                    '<strong><span class="glyphicon glyphicon-ok-sign"></span> </strong>' + "NOT Inserted" +
                    '</div>').fadeIn(1000).fadeOut(2000);
                setTimeout(function() { // wait for 5 secs(2)
                    //  $('#ackshowprintandDelete').load(' #ackshowprintandDelete'); // then reload the page.(3)
                    window.location.href = 'stockproduct.php';
                }, 2000);
            }
        }
    });
    return false;
});


 // search in
 function searchFromModelname() {
    var input, filter, table, tr, td, cell, i, j;
    input = document.getElementById("myinput1");
    filter = input.value.toUpperCase();
    table = document.getElementById("ModelTable");
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
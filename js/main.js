$('#dodajForm').submit(function(){
    event.preventDefault();
    console.log("Dodavanje");
    const $form =$(this);
    const $input = $form.find('input, select, button, textarea');

    const serijalizacija = $form.serialize();
    console.log(serijalizacija);

    $input.prop('disabled', true);

    req = $.ajax({
        url: 'handler/add.php',
        type:'post',
        data: serijalizacija
    });
    /* Unesen komentar */

    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
            alert("Uspešno naručivanje");
            console.log("Dodata narudžbina");
            location.reload(true);
        }else console.log("Narudžbina nije dodata "+res);
        console.log(res);
    });

    req.fail(function(jqXHR, textStatus, errorThrown){
        console.error('Sledeca greska se desila> '+textStatus, errorThrown)
    });
});


$('#btn-izmeni').click(function () {
    const checked = $('input[name=checked-donut]:checked');

    request = $.ajax({
        url: 'handler/get.php',
        type: 'post',
        data: {'id': checked.val()},
        dataType: 'json'
    });

    request.done(function (response, textStatus, jqXHR) {
        console.log('Popunjena');

        $('#food').val(response[0]['food']);
        console.log(response[0]['food']);

        $('#price').val(response[0]['price'].trim());
        console.log(response[0]['price'].trim());

        $('#quantity').val(response[0]['quantity'].trim());
        console.log(response[0]['quantity'].trim());

        $('#order_date').val(response[0]['order_date'].trim());
        console.log(response[0]['order_date'].trim());

        $('#customer_name').val(response[0]['customer_name']);
        console.log(response[0]['customer_name']);

        $('#customer_contact').val(response[0]['customer_contact']);
        console.log(response[0]['customer_contact']);

        $('#id').val(checked.val());

        console.log(response);
    });

   request.fail(function (jqXHR, textStatus, errorThrown) {
       console.error('The following error occurred: ' + textStatus, errorThrown);
   });

});


$('#izmeniForm').submit(function () {
    event.preventDefault();
    console.log("Izmene");
    const $form = $(this);
    const $inputs = $form.find('input, select, button, textarea');
    const serializedData = $form.serialize();
    console.log(serializedData);
    $inputs.prop('disabled', true);

 

    request.done(function (response, textStatus, jqXHR) {


        if (response === 'Success') {

            console.log('Porudžbina je izmenjena');
            location.reload(true);

        }
        else console.log('Porudžbina nije izmenjena' + response);
        console.log(response);
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('The following error occurred: ' + textStatus, errorThrown);
    });



});



$('#btn-obrisi').click(function(){
    console.log("Brisanje");

    const checked = $('input[name=checked-donut]:checked');

    req = $.ajax({
        url: 'handler/delete.php',
        type:'post',
        data: {'id':checked.val()}
    });

    req.done(function(res, textStatus, jqXHR){
        if(res=="Success"){
           checked.closest('tr').remove();
           alert('Order deleted');
           console.log('Obrisana');
        }else {
        console.log("Neuspesno brisanje "+res);
        alert("Order is not deleted");

        }
        console.log(res);
    });

});




$('#btn-pretraga').click(function () {

    var para = document.querySelector('#myInput');
    console.log(para);
    var style = window.getComputedStyle(para);
    console.log(style);
    if (!(style.display === 'inline-block') || ($('#myInput').css("visibility") ==  "hidden")) {
        console.log('block');
        $('#myInput').show();
        document.querySelector("#myInput").style.visibility = "";
    } else {
       document.querySelector("#myInput").style.visibility = "hidden";
    }
});


$('#btn').click(function () {
    $('#pregled').modal('toggle');
});

$('#btnDodaj').submit(function () {
    $('#myModal').modal('toggle');
    return false;
});

$('#btnIzmeni').submit(function () {
    $('#myModal').modal('toggle');
    return false;
});
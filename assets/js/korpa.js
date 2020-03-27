$(document).ready(function(){
    $('#korpa').click(function(){
        let idKorisnik = $(this).data('user');
        let idProizvod = $(this).data('id');

        $.ajax({
            url: "models/unoskorpa.php",
            method : "POST",
            dataType : 'json',
            data : {
                korisnik : idKorisnik,
                proizvod : idProizvod
            },
            success : function(){
                console.log('uspeh!!');
            },
            error : function(xhr){
                console.log(xhr);
            }
        });
    });
});
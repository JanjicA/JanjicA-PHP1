
//CRUD PROIZVOD
$(document).on("click", ".izbrisi-proizvod", function(e){
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
       url: "models/proizvodi/brisanje-proizvoda.php",
       method: "get",
       dataType: 'json',
       data:{
           id: id
       },
       success: function(data){
            osveziProizvode();
       },
       error: function(xhr,status){
           console.log(xhr);
       }
    });
});

$(document).on("click", ".promeni-proizvod", function(e){
    let id = $(this).data('id');

    $.ajax({
        url: "models/proizvodi/dohvati-jedan.php",
        method: "get",
        dataType: "json",
        data:{
            id: id
        },
        success: function(data){
            fillFormWithProducts(data);
        },
        error: function(xhr,status,responseText){
            console.log(xhr);
        }
    });
});

function fillFormWithProducts(data){
    $("#hdnIdProdChange").val(data.id);
    $("#opis").val(data.opis);
    $("#nameProdChange").val(data.name);
    $("#cena").val(data.cena);
    $("#vrsta").val(data.idVrsta);
    $("#pol").val(data.idPol);
}

function osveziProizvode(){
    $.ajax({
        url: "models/proizvodi/dohvati-sve.php",
        method: "get",
        dataType: "json",
        success: function(data){
            ispisiProizvode(data);
        },
        error: function(xhr, status, responseText){
            console.log(xhr);
        }
    });
}

function ispisiProizvode(proizvodi){
    let prod = '', count =  1;
    for(let proizvod of proizvodi){
        prod += ispisiProizvod(proizvod, count);
        count++;
    }
    $("#ispis").html(prod);
}

function ispisiProizvod(proizvod){
    return `<tr>
                <td>${proizvod.name}</td>
                <td>${proizvod.opis}</td>
                <td><img src="assets/images/${proizvod.slika}" width="80" height="60"></td>
                <td>${proizvod.cena}din</td>
                <td>
                    <a href="#" class="btn btn-info promeni-proizvod" data-id="${proizvod.id}" data-toggle="modal" data-target="#myModal">Edit</a>
                    <a href="#" class="btn btn-danger izbrisi-proizvod" data-id="${proizvod.id}">Delete</a>
                </td>
            </tr>`;
}





//CRUD Korisnika
$(document).on("click", ".izbrisi-korisnika", function(e){
    e.preventDefault();
    let id = $(this).data('id');

    $.ajax({
       url: "models/korisnik/brisanje-korisnika.php",
       method: "get",
       dataType: 'json',
       data:{
           id: id
       },
       success: function(data){
          osveziKorisnike();
       },
       error: function(xhr,status,responseText){
           console.log(xhr);
       }
    });
});



$(document).on("click", ".promeni-korisnika", function(e){
        let id = $(this).data('id');

         $.ajax({
            url: "models/korisnik/dohvati-jedan.php",
            method: "get",
            dataType: "json",
            data:{
                id: id
            },
            success: function(data){
                popuniFormu(data);
            },
            error: function(xhr,status,responseText){
                console.log(xhr);
            }
         });
    });

    $("#sacuvaj").click(function(){
       let id = $("#hdnId").val();

       if(id !== ""){
           $.ajax({
              url: "models/korisnik/izmeni-korisnika.php",
              method: "post",
              dataType: "json",
              data:{
                  id: id,
                  name: $("#name").val(),
                  username: $("#username").val(),
                  email: $("#email").val(),
                  password: $("#password").val(),
                  uloga: $("#uloge").val()
              },
              success: function(data){
                  ocistiFormu();
                  osveziKorisnike();
              },
               error: function(xhr, status, responseText){
                   console.log(xhr);
               }
           });
       }
       else{
           $.ajax({
               url: 'models/korisnik/dodaj-korisnika.php',
               method: 'post',
               dataType: 'html',
               data: {
                   name: $("#name").val(),
                   username: $("#username").val(),
                   email: $("#email").val(),
                   password: $("#password").val(),
                   uloga: $("#uloge option:selected").val()
               },
               success: function(data){
                   ocistiFormu();
                   osveziKorisnike();
               },
               error: function(xhr, status, responseText){
                   console.log(responseText);
               }
           })
       }
    })

    function popuniFormu(data){
        $("#hdnId").val(data.id_korisnik);
        $("#name").val(data.name);
        $("#username").val(data.username);
        $("#email").val(data.email);
        $("#password").val(data.password);
        $("#uloge").val(data.ulogaId);
        $("#form-heading").html("Update user");
    }

    function ocistiFormu(){
        $("#hdnId").val("");
        $("#name").val("");
        $("#username").val("");
        $("#email").val("");
        $("#password").val("");
        $("#uloge").val("0");
        $("#form-heading").html("Add user");
    }

    function osveziKorisnike(){
      $.ajax({
          url: "models/korisnik/dohvati-sve-korisnike.php",
          method: "get",
          dataType: "json",
          success: function(data){
              ispisiKorisnike(data);
          },
          error: function(xhr, status, responseText){
              console.log(xhr,status);
          }
      });
  }

    function ispisiKorisnike(korisnici){
        let prod = '';
        for(let korisnik of korisnici){
            prod += ispisiKorisnika(korisnik);
        }
        $("#ispisKorisnika").html(prod);
    }

    function ispisiKorisnika(korisnik){
        return `<tr>

                    <td>${korisnik.username}</td>
                    <td>${korisnik.email}</td>
                    <td>${korisnik.name}</td>
                    <td>
                        <a href="#" class="btn btn-info  promeni-korisnika" data-id="${korisnik.id}">Edit</a>
                        <a href="#" class="btn btn-danger izbrisi-korisnika" data-id="${korisnik.id}">Delete</a>
                    </td>
                </tr>`;
    }







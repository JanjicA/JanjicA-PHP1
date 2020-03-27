$(document).ready(function(){

    osveziProizvode();
    
    $("#dropdownMenu").click(sortirajPoGodinamanadole);
    $("#dropdownMenu1").click(sortirajPoGodinamanagore);
    $("#search1").blur(filtriranjeProizvoda);
});



function osveziProizvode(){
    $.ajax({
        url: "models/proizvodi/dohvati-sve.php",
        method: "get",
        dataType: "json",
        success: function(data){
            ispisiProizvode(data);
        },
        error: function(xhr, status, responseText){
            console.log(xhr,status);
        }
    });
}

function sortirajPoGodinamanadole() {
    $.ajax({
        url : "models/proizvodi/dohvati-sve.php",
        method : "post",
        type : "json",
        success : function(data) {
            data.sort(function(a,b) {
                if(a.cena == b.cena){
                    return 0;
				}else{
                return a.cena > b.cena ? -1 : 1;
					}
            });
            ispisiProizvode(data);
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}


function sortirajPoGodinamanagore() {
    $.ajax({
        url : "models/proizvodi/dohvati-sve.php",
        method : "post",
        type : "json",
        success : function(data) {
            data.sort(function(a,b) {
                if(a.cena == b.cena){
                    return 0;
				}else{
                return a.cena < b.cena ? -1 : 1;
					}
            });
            ispisiProizvode(data);
        },
        error : function(xhr, error, status) {
            alert(status);
        }
    });
}

function filtriranjeProizvoda() {
    const unosKorisnika = this.value;

    $.ajax({
      url: 'models/proizvodi/dohvati-sve.php',
      method: 'GET',
      dataType: 'json',
      success: function (proizvod) {
        const filtriraniProizvodi = proizvod.filter(el => {
          if (el.name.toLowerCase().indexOf(unosKorisnika.toLowerCase()) !== -1) {
            return true;
          }
        });
        ispisiProizvode(filtriraniProizvodi);
      },
      error: function (err) {
        console.error(err);
      }
    });
  }



function ispisiProizvode(proizvodi){
    let prod = '';
    for(let proizvod of proizvodi){
        prod += ispisiProizvod(proizvod);
    }
    $("#products").html(prod);
}



function ispisiProizvod(proizvod){
    return ` 
        <div class="col-lg-3 col-md-3 col-xs-12  gallery">
        <a href="index.php?page=proizvodi&id=${proizvod.id}"><img src="assets/images/${proizvod.slika}" alt="slika"/></a>
            <h4 class="name">${proizvod.name}</h4>
            <h3 class="cena">${proizvod.cena}din</h3>
        </div>`;
}


  
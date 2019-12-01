function buscaInscricoes (){
    var xhttp = new XMLHttpRequest();
    var objJson
    var inner="";
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {    
     objJson = JSON.parse(this.responseText)     
     console.log( objJson);
     for (var key in objJson) {
      
      if (objJson.hasOwnProperty(key)) {
          inner = inner  + gridPalestra(objJson[key]);
         // console.log( objJson);
        }        
     }
     
    document.getElementById("painel").innerHTML = 
      "<p><a class='btn btn-primary btn-lg' href='#' role='button' onclick='novoInscricao();'>Novo</a></p>"+
      "<table class='table table-striped'>"+
      "  <thead>"+
      "    <tr>"+
      "      <th>del</th>"+
      "      <th>upd</th>"+
      "      <th>id</th>"+
      "      <th>Pessoa</th>"+
      "      <th>Palestra</th>"+      
      "    </tr>"+
      "  </thead>"+
      "  <tbody>"+
          inner +
      "  </tbody>"+
      "</tbody>";

    return objJson;
    }
  };  
  xhttp.open("GET", "http://localhost:8000/api/inscricao", true);
  xhttp.setRequestHeader("Authorization", "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
  xhttp.send();
}

function gridPalestra(prObjJson){
var strMain = "";
var objJson = prObjJson;
var pessoa = buscaPessoa(objJson.idPessoa);
//alert(pessoa)

console.log("inscricaos: "+ retornaJson(buscaPessoa(objJson.idPessoa)) );

//console.log(pessoa);
let html = 
          `<tr>
              <td onclick="deletaInscricao(${objJson.id})" style="cursor:pointer;">[  DEL  ]</td>
              <td onclick="novoInscricao('${objJson.nomePalestra}','${objJson.palestrante}','${objJson.inicio}','${objJson.fim}','${objJson.id}')" style="cursor:pointer">[  UPD  ]</td>
              <td>${objJson.id}</td>
              <td>${pessoa}</td>
              <td>${objJson.idPalestra}</td>
              
          </tr>`;
  return html;

}
///fim das operacoes com dom

function salvaInscricao(inscricao){
  
  var xhttp = new XMLHttpRequest();
  var elements = document.querySelectorAll( "input, select, textarea" );
  console.log(palestra);
  
  obj = JSON.stringify( inscricao );
  if (inscricao.id == ""){
    console.log(obj);
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 201) {         
        buscaInscricoes();
      }
    };
    xhttp.open("post", "http://localhost:8000/api/inscricao", true);
    xhttp.setRequestHeader("Content-Type","application/json");
    xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
    xhttp.send(obj);
    
  }else{
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {    
      buscaInscricoes();
      }
    };
    xhttp.open("put", "http://localhost:8000/api/inscricao/"+inscricao.id, true);
    xhttp.setRequestHeader("Content-Type","application/json");
    xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
    xhttp.send(obj);
    //console.log(obj);

  }
}

function deletaInscricao(prId){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {    
     buscaInscricoes();
    }
  };
  xhttp.open("delete", "http://localhost:8000/api/inscricao/"+prId, true);
  xhttp.setRequestHeader("Content-Type","application/json");
  xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
  xhttp.send();

}


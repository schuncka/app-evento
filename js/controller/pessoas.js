function buscaPessoas(){
    var xhttp = new XMLHttpRequest();
    var objJson
    var inner="";
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {    
     objJson = JSON.parse(this.responseText)     
     
     for (var key in objJson) {
      
      if (objJson.hasOwnProperty(key)) {
          inner = inner  + gridPessoas(objJson[key]);
          //console.log( objJson);
        }        
     }
    document.getElementById("painel").innerHTML = 
      "<p><a class='btn btn-primary btn-lg' href='#' role='button' onclick='novoPessoa();'>Novo</a></p>"+
      "<table class='table table-striped'>"+
      "  <thead>"+
      "    <tr>"+
      "      <th>del</th>"+
      "      <th>upd</th>"+
      "      <th>id</th>"+
      "      <th>Nome</th>"+
      "      <th>CPF</th>"+
      "      <th>Tipo</th>"+
      "    </tr>"+
      "  </thead>"+
      "  <tbody>"+
          inner +
      "  </tbody>"+
      "</tbody>";

     //+"</div></div></div>";
     //alert(inner)
     //$('#buscaPessoas').dialog('show'); 
     //console.log( objJson)
    //alert(this.responseText)
    return objJson;
    }
  };  
  xhttp.open("GET", "http://localhost:8000/api/pessoa", true);
  xhttp.setRequestHeader("Authorization", "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
  xhttp.send();
}

function gridPessoas(prObjJson){
var strMain = "";
var objJson = prObjJson;
let html = 
          `<tr>
              <td onclick="deletaPessoa(${objJson.id})" style="cursor:pointer;">[  DEL  ]</td>
              <td onclick="novoPessoa('${objJson.nome}','${objJson.cpf}','${objJson.cidade}','${objJson.tipo}','${objJson.id}')" style="cursor:pointer">[  UPD  ]</td>
              <td>${objJson.id}</td>
              <td>${objJson.nome}</td>
              <td>${objJson.cpf}</td>
              <td>${objJson.tipo}</td>
          </tr>`;
  return html;

}
///fim das operacoes com dom

function salvaPessoa(pessoa){
  
  var xhttp = new XMLHttpRequest();
  var elements = document.querySelectorAll( "input, select, textarea" );
  console.log(pessoa);
  
  obj = JSON.stringify( pessoa );
  if (pessoa.id == ""){
   // console.log(obj);
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 201) {    
     
      buscaPessoas();
      }
    };
    xhttp.open("post", "http://localhost:8000/api/pessoa", true);
    xhttp.setRequestHeader("Content-Type","application/json");
    xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
    xhttp.send(obj);
    //console.log(obj);
  }else{
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {    
      buscaPessoas();
      }
    };
    xhttp.open("put", "http://localhost:8000/api/pessoa/"+pessoa.id, true);
    xhttp.setRequestHeader("Content-Type","application/json");
    xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
    xhttp.send(obj);
    //console.log(obj);

  }
}

function deletaPessoa(prId){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {    
     buscaPessoas();
    }
  };
  xhttp.open("delete", "http://localhost:8000/api/pessoa/"+prId, true);
  xhttp.setRequestHeader("Content-Type","application/json");
  xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
  xhttp.send();

}


function buscaPessoa(prId){
  var xhttp = new XMLHttpRequest();
 // console.log("busca pessoa: "+ prId)
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {          
      return JSON.parse(this.responseText);        
    }
  };
  xhttp.open("get", "http://localhost:8000/api/pessoa/"+prId, true);
  xhttp.setRequestHeader("Content-Type","application/json");
  xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
  //xhttp.send();
  
}
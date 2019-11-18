var myVar;

var body = document.querySelector("body");
body.onload = function(){
  start();
    interval();
}
function interval() {
    myVar = setInterval(start  , 10000);
  }

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
          </tr>`

        /*`<div class="row" style=''>
          <div class="col-1">${objJson.id}</div>
          <div class="col-3">${objJson.nome}</div>
          <div class="col-2">${objJson.cpf}</div>
          <div class="col-2">${objJson.tipo}</div>
        </div>`*/

  return html;

}
///fim das operacoes com dom
function novoPessoa(prNome="",prCpf="",prCidade="",prTipo="", prId=""){
let html = 
      `<form id="novaPessoa">
         <div class="form-group">
            <label for="exampleInputEmail1">Nome</label>
            <input class="form-control" id="nomePessoa" value="${prNome}" placeholder="Digite seu nome completo">            
          </div>
          <div class="form-group">
            <label for="cpf">CPF</label>
            <input class="form-control" id="cpf" value="${prCpf}" placeholder="Sua CPF">
          </div>
          <div class="form-group">
            <label for="cidade">Cidade</label>
            <input class="form-control" id="cidade" value="${prCidade}" placeholder="Sua cidade">
          </div>
          <div class="form-group">
          <label for="cidade">Tipo</label>
          <select class="custom-select" id="tipo">
           <option selected>Selecione ..</option>
            <option value="congressista" value="">Congressista</option>
            <option value="palestrante" value="">Palestrante</option>            
          </select>
          </div>
          <button type="submit" class="btn btn-primary" onclick="salvaPessoa(${prId});">Salvar</button>
          <button type="submit" class="btn btn-primary" onclick="buscaPessoas();">Cancelar</button>
        </form>`;
        document.getElementById("painel").innerHTML = html;   
}

function salvaPessoa(prID=""){
  var obj = {};
  var xhttp = new XMLHttpRequest();
  var elements = document.querySelectorAll( "input, select, textarea" );
  for( var i = 0; i < elements.length; ++i ) {
      var element = elements[i];
      var id = element.id;
      var value = element.value;
      if( id ) {
          obj[ id ] = value;
      }
  }
  obj = JSON.stringify( obj );
  if (prID == ""){
    //console.log(obj);
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 201) {    
      //objJson = JSON.parse(this.responseText)
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
      //objJson = JSON.parse(this.responseText)
      buscaPessoas();
      }
    };
    xhttp.open("put", "http://localhost:8000/api/pessoa/"+prID, true);
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
     //objJson = JSON.parse(this.responseText)
     buscaPessoas();
    }
  };
  xhttp.open("delete", "http://localhost:8000/api/pessoa/"+prId, true);
  xhttp.setRequestHeader("Content-Type","application/json");
  xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
  xhttp.send();

}


function start(){   
 // buscaPessoas();
}

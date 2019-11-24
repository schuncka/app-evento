function buscaPalestras(){
    var xhttp = new XMLHttpRequest();
    var objJson
    var inner="";
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {    
     objJson = JSON.parse(this.responseText)     
     
     for (var key in objJson) {
      
      if (objJson.hasOwnProperty(key)) {
          inner = inner  + gridPalestra(objJson[key]);
          //console.log( objJson);
        }        
     }
     
    document.getElementById("painel").innerHTML = 
      "<p><a class='btn btn-primary btn-lg' href='#' role='button' onclick='novoPalestra();'>Novo</a></p>"+
      "<table class='table table-striped'>"+
      "  <thead>"+
      "    <tr>"+
      "      <th>del</th>"+
      "      <th>upd</th>"+
      "      <th>id</th>"+
      "      <th>Palestra</th>"+
      "      <th>Palestrante</th>"+
      "      <th>Inicio</th>"+
      "      <th>Fim</th>"+
      "    </tr>"+
      "  </thead>"+
      "  <tbody>"+
          inner +
      "  </tbody>"+
      "</tbody>";

    return objJson;
    }
  };  
  xhttp.open("GET", "http://localhost:8000/api/palestra", true);
  xhttp.setRequestHeader("Authorization", "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
  xhttp.send();
}

function gridPalestra(prObjJson){
var strMain = "";
var objJson = prObjJson;
let html = 
          `<tr>
              <td onclick="deletaPalestra(${objJson.id})" style="cursor:pointer;">[  DEL  ]</td>
              <td onclick="novoPalestra('${objJson.nomePalestra}','${objJson.palestrante}','${objJson.inicio}','${objJson.fim}','${objJson.id}')" style="cursor:pointer">[  UPD  ]</td>
              <td>${objJson.id}</td>
              <td>${objJson.nomePalestra}</td>
              <td>${objJson.palestrante}</td>
              <td>${objJson.inicio}</td>
              <td>${objJson.fim}</td>
          </tr>`;
  return html;

}
///fim das operacoes com dom

function salvaPalestra(palestra){
  
  var xhttp = new XMLHttpRequest();
  var elements = document.querySelectorAll( "input, select, textarea" );
  console.log(palestra);
  
  obj = JSON.stringify( palestra );
  if (palestra.id == ""){
    console.log(obj);
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 201) {         
        buscaPalestras();
      }
    };
    xhttp.open("post", "http://localhost:8000/api/palestra", true);
    xhttp.setRequestHeader("Content-Type","application/json");
    xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
    xhttp.send(obj);
    //console.log(obj);
  }else{
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {    
      buscaPalestras();
      }
    };
    xhttp.open("put", "http://localhost:8000/api/palestra/"+palestra.id, true);
    xhttp.setRequestHeader("Content-Type","application/json");
    xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
    xhttp.send(obj);
    //console.log(obj);

  }
}

function deletaPalestra(prId){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {    
     buscaPalestras();
    }
  };
  xhttp.open("delete", "http://localhost:8000/api/palestra/"+prId, true);
  xhttp.setRequestHeader("Content-Type","application/json");
  xhttp.setRequestHeader("Authorization","eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VyIjoiNiIsIm5vbWUiOiJnYWJyaWVsMyJ9.t-kwptDpayMaIrZS2XqG6_cHAqteGpvghuvZEg-k2NM", true);
  xhttp.send();

}


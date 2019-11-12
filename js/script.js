var myVar;

var body = document.querySelector("body");
body.onload = function(){
  start();
    interval();
}
function interval() {
    myVar = setInterval(start  , 10000);
  }

function buscaMotores(){
    var xhttp = new XMLHttpRequest();
    var objJson
    var strMain="";
    xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    // document.getElementById("demo").innerHTML = this.responseText;
     objJson = JSON.parse(this.responseText)
     var node
     var textnode 
     var i = 0;
     var inner="";
     document.querySelector("main").innerHTML="";
     for (var key in objJson) {
        if (objJson.hasOwnProperty(key)) {
          //inner = viewMotor(objJson[key]) + inner
          viewMotorDom(objJson[key]);

          //  console.log(objJson[key].nome);
            //console.log(objJson[key].imagem);
            //console.log(objJson[key].descricao);
            //console.log(objJson[key].uso);

        }
        //document.querySelector("main").innerHTML =inner;
     }

   //  console.log( objJson)
    //alert(this.responseText)
    return objJson;
    }
  };
  xhttp.open("GET", "http://localhost:8000/api.php/", true);
  xhttp.send();

}

function TabelaCadsatro(prObjJson){
var strMain = "";
var objJson = prObjJson;
let html = `  <dl>
                <dd> 
                    <figure> 
                        <img src='${objJson.imagem}' alt='${objJson.nome}' /> 
                    </figure> 
                </dd> 
                <dt> 
                    <a href="#"> ${objJson.nome} </a> 
                </dt> 
                <dd> 
                ${objJson.descricao}
                </dd>
                <dd>
                    Uso: ${objJson.uso}
                </dd>
              </dl>`
  

  return html;

}
//inicio operacoes com
function viewMotorDom(prObjJson){
 
 
  var objMAIN = document.querySelector("main");
  var objDL = document.createElement("dl");
  
  //objDD = document.createElement("dd");
  //objFIGURE = document.createElement("figure");
  //objIMG = document.createElement("img");
  //objDT = document.createElement("dt");
  
  //objIMG.src = prObjJson.imagem;
  //objIMG.alt = prObjJson.nome;

  //objFIGURE.appendChild(createImage(prObjJson.imagem,prObjJson.nome));
  //objDD.appendChild(objFIGURE);
  objDL.appendChild(createImage(prObjJson.imagem,prObjJson.nome));
  objDL.appendChild(createHref(prObjJson.nome));
  objDL.appendChild(createDd(prObjJson.descricao));
  objDL.appendChild(createDd(prObjJson.uso));
  objMAIN.appendChild(objDL);
  
  //var element = document.getElementById("div1");
  //element.appendChild(para);
 
 
  //var element = document.querySelector("main");
 // element.createElement('dl');

}
function createImage(prImage,prNome){

  objDD = document.createElement("dd");
  objFIGURE = document.createElement("figure");
  objIMG = document.createElement("img");
  objIMG.src = prImage;
  objIMG.alt = prNome;

  objFIGURE.appendChild(objIMG);
  objDD.appendChild(objFIGURE);
  return objDD;
  
}
function createHref(prNome){
  objDT = document.createElement("dt");
  objA = document.createElement("a");
  objA.href="#";
  objA.innerHTML = prNome;
  objDT.appendChild(objA);

  return objDT;
}

function createDd(prTexto){

objDD = document.createElement("dd");
objDD.innerHTML = 'Uso: '+prTexto;
return objDD;

}
///fim das operacoes com dom

function start(){
   
    buscaMotores();
}

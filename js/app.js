function enviaPessoa(){
    var form = document.querySelector("#novaPessoa");
    form.onsubmit  = function(event){
        event.preventDefault();
        var pessoa = new Pessoa();
        pessoa.id         = document.querySelector("#id").value;
        pessoa.nomePessoa = document.querySelector("#nomePessoa").value;
        pessoa.cpf        = document.querySelector("#cpf").value;
        pessoa.tipo       = document.querySelector("#tipo").value;
        pessoa.cidade     = document.querySelector("#cidade").value;
        salvaPessoa(pessoa);
        carregaGridPessoa();
        }
}
function enviaPalestra(){
    var form = document.querySelector("#novaPalestra");
    form.onsubmit  = function(event){
        event.preventDefault();
        var palestra = new Palestra();
        palestra.id         = document.querySelector("#id").value;
        palestra.nomePalestra = document.querySelector("#nomePalestra").value;
        palestra.palestrante        = document.querySelector("#palestrante").value;        
        palestra.inicio       = document.querySelector("#inicio").value.replace('T', ' ');
        palestra.fim     = document.querySelector("#fim").value.replace('T', ' ');
        salvaPalestra(palestra);
        carregaGridPalestra();
        }
}

function carregaGridPessoa(){
    buscaPessoas();
}
function carregaGridPalestra(){
    buscaPalestras();
}

function retornaJson(prJson){
    if (prJson ){
    console.log(prJson.nome);
    return prJson;
}
    
}



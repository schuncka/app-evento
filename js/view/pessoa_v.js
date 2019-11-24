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
              <input class="form-control" type="hidden" id="id" value="${prId}" >
              <button type="submit" class="btn btn-primary" id="salvaPessoa" onclick="enviaPessoa();"   >Salvar</button>
              <button type="submit" class="btn btn-primary" id="cancelaPessoa" onclick="carregaGridPessoa();" >Cancelar</button>
            </form>`;
            document.getElementById("painel").innerHTML = html;   
    }
    
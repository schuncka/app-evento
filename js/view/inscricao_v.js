function novoInscricao(prPessoas="",prPalestras="",prPessoaSelect="",prPalestraSelect="", prId=""){
    let html = 
          `<form id="novaPessoa">
             <div class="form-group">
                <label for="exampleInputEmail1">Nome</label>
                <input class="form-control" id="nomePessoa" value="${prNome}" placeholder="Digite seu nome completo">            
              </div>
              <div class="form-group">
                <label for="pessoa">Pessoa</label>
                <select id="pessoa" name="pessoa">
                  <option value="">Selecione</option>
                </select>
              </div>
              <div class="form-group">
                <label for="palestra">Palestra</label>
                <select id="palestra" name="palestra">
                  <option value="">Selecione</option>
                </select>
              </div>
              <input class="form-control" type="hidden" id="id" value="${prId}" >
              <button type="submit" class="btn btn-primary" id="salvaPessoa" onclick="enviaPalestra();"   >Salvar</button>
              <button type="submit" class="btn btn-primary" id="cancelaPessoa" onclick="carregaGridPalestra();" >Cancelar</button>
            </form>`;
            document.getElementById("painel").innerHTML = html;   
    }
    
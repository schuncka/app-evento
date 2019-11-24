function novoPalestra(prNome="",prPalestrante="",prInicio="",prFim="", prId=""){
    prInicio = prInicio.replace(' ', 'T');
    prFim =   prFim.replace(' ', 'T');
  let html = 
          `<form id="novaPalestra">
             <div class="form-group">
                <label for="nomePalestra">Palestra</label>
                <input class="form-control" id="nomePalestra" value="${prNome}" placeholder="Título da palestra">            
              </div>
              <div class="form-group">
                <label for="palestrante">Palestrante</label>
                <input class="form-control" id="palestrante" value="${prPalestrante}" >
              </div>
              <div class="form-group">
                <label for="cidade">Inicio</label>
                <input class="form-control" id="inicio" type="datetime-local" value="${prInicio}" placeholder="Data/Hora Inicio">
              </div>
              <div class="form-group">
                <label for="fim">Fim</label>
                <input class="form-control" id="fim" type="datetime-local" value="${prFim}" placeholder="Data/Hora Fim">
              </div>
              
              <input class="form-control" type="hidden" id="id" value="${prId}" >
              <button type="submit" class="btn btn-primary" id="salvaPessoa" onclick="enviaPalestra();"   >Salvar</button>
              <button type="submit" class="btn btn-primary" id="cancelaPessoa" onclick="carregaGridPalestra();" >Cancelar</button>
            </form>`;
            document.getElementById("painel").innerHTML = html;   
    }
    
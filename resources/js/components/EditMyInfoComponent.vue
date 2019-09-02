<template>

<div class="modal fade" id="edit-modal" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header bg-primary">
            <h5 class="modal-title">Editar minhas informaçõese</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form>
              <div class="modal-body row">
                <div class="form-group col-lg-12">
                    <label>Email: </label>
                    <input type="email" name="email" class="form-control" value="agostinho@taxicarraroucarrarataxi.com" placeholder="Email">
                </div>
                <div class="form-group col-lg-12">
                    <label>Nome Fantasia: </label>
                    <input type="text" name="nome-fantasia" class="form-control" value="Taxi Carrara ou Carrara Taxi" placeholder="Nome Fantasia">
                </div>
                <div class="form-group col-lg-12">
                    <label>Categoria: </label>
                    <select class="form-control">
                        <option>Categoria</option>
                        <option>Loja</option>
                        <option selected>Companhia de Taxi</option>
                    </select>
                </div>
                    <div class="form-group col-lg-12">
                    <label>Bairro: </label>
                    <input type="text" name="bairro" class="form-control" value="Onde mora o Lineu, todo mundo sabe onde é" placeholder="Bairro">
                </div>
                    <div class="form-group col-lg-12">
                    <label>Rua: </label>
                    <input type="text" name="rua" class="form-control" value="Rua onde mora o lineu" placeholder="Rua">
                </div>
                <div class="form-group col-lg-12">
                    <label>Número: </label>
                    <input type="number" name="numero" class="form-control" value="999" placeholder="Número">
                </div>
                <div class="form-group col-lg-12">
                    <label>Estado: </label>
                    <select class="form-control">
                        <option>Estado</option>
                        <option>Rio Grande do Sul</option>
                        <option selected>Rio de Janeiro</option>
                    </select>
                </div>
                <div class="form-group col-lg-12">
                    <label>Cidade: </label>
                    <select class="form-control">
                        <option>Cidade</option>
                        <option>Porto Alegre</option>
                        <option selected>Rio de Janeiro</option>
                    </select>
                </div>
                <div class="form-group col-lg-12">
                    <label>Telefone 1: </label>
                    <input type="text" name="telefone-1" value="(21)9999-9999" class="form-control" placeholder="Telefone 1">
                </div>
                <div class="form-group col-lg-12">
                    <label>Telefone 2: </label>
                    <input type="text" name="telefone-2" value="(21)0000-0000" class="form-control" placeholder="Telefone 2">
                </div>
                <div class="form-group col-lg-12">
                    <label>Logo: </label>
                    <input type="file" class="col-lg-12" name="logo">
                </div>
                <div class="form-group col-lg-12">
                    <button type="button" class="btn btn-primary col-lg-12">Salvar</button>
                </div>
              </div>
        </form>
        </div>
      </div>
    </div>
</template>

<script>
    export default {
    	data() {
    		return { 
    			
    		}
    	},
        mounted() {
           
        },
        methods: {
        	
        }
    };
</script>


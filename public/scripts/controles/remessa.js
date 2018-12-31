//Instancia da classe 
remessa = new Remessa();

/*
 * Executa apos carregar a pagina
 */
$(document).ready(function () {

    remessa.init();

});

/*
 * Classe de remessa
 */
function Remessa() {
    this.init = function () {
this.validaForm();

    };
    
        /**
     * valida o formulario
     */
    this.validaForm = function () {

        $('#data_inicial').mask('99/99/9999');
        $('#data_final').mask('99/99/9999');
    };

    this.popularConta = function (objCampo) {

        //Popula a grid de paramclientes
        var url_popula = baseUrl + '/remessa/listar-contas-cedente';
        var objData = {
            cedente_id: objCampo.value
        };

        geral.populaFiltering('conta_id', url_popula, objData, objCampo);
    }

}
//Instancia da classe 
boleto = new Boleto();

/*
 * Executa apos carregar a pagina
 */
$(document).ready(function () {

    boleto.init();

});

/*
 * Classe de boleto
 */
function Boleto() {
    this.init = function () {

        this.validaForm();

    };

    /**
     * valida o formulario
     */
    this.validaForm = function () {

        $('#boleto_dtvenc').mask('99/99/9999');
        //Adiciona mascara no campo valor 

        $('#boleto_valor').maskMoney({
            symbol: 'R$ ',
            thousands: '.',
            decimal: ',',
            symbolStay: true
        });

        //ValidaÃ§Ã£o
        $("form").validate(
                {
                    rules: {
                        cedente_id: {
                            required: true
                        },
                        sacado_id: {
                            required: true
                        },
                        conta_id: {
                            required: true
                        },
                        boleto_valor: {
                            required: true
                        },
                        boleto_dtvenc: {
                            required: true
                        },
                        boleto_obs: {
                            required: true
                        },
                        boleto_obscaixa: {
                            required: true
                        }
                    },
                    messages: {
                        cedente_id: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_id: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_id: {
                            required: 'Preenchimento Obrigatório'
                        },
                        boleto_valor: {
                            required: 'Preenchimento Obrigatório'
                        },
                        boleto_dtvenc: {
                            required: 'Preenchimento Obrigatório'
                        },
                        boleto_obs: {
                            required: 'Preenchimento Obrigatório'
                        },
                        boleto_obscaixa: {
                            required: 'Preenchimento Obrigatório'
                        }
                    }
                });

    };

    this.popularConta = function (objCampo) {

        //Popula a grid de paramclientes
        var url_popula = baseUrl + '/boleto/listar-contas-cedente';
        var objData = {
            cedente_id: objCampo.value
        };

        geral.populaFiltering('conta_id', url_popula, objData, objCampo);
    }

}
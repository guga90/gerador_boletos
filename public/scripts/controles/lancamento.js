//Instancia da classe 
lancamento = new Lancamento();

/*
 * Executa apos carregar a pagina
 */
$(document).ready(function () {

    lancamento.init();

});

/*
 * Classe de lancamento
 */
function Lancamento() {
    this.init = function () {

        this.validaForm();

    };

    /**
     * valida o formulario
     */
    this.validaForm = function () {

        $('#lancamento_dtvenc').mask('99/99/9999');
        //Adiciona mascara no campo valor 

        $('#lancamento_valor').maskMoney({
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
                        lancamento_valor: {
                            required: true
                        },
                        lancamento_dtvenc: {
                            required: true
                        },
                        lancamento_demonstrativo: {
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
                        lancamento_valor: {
                            required: 'Preenchimento Obrigatório'
                        },
                        lancamento_dtvenc: {
                            required: 'Preenchimento Obrigatório'
                        },
                        lancamento_demonstrativo: {
                            required: 'Preenchimento Obrigatório'
                        }
                    }
                });

    };

    this.popularConta = function (objCampo) {

        //Popula a grid de paramclientes
        var url_popula = baseUrl + '/lancamento/listar-contas-cedente';
        var objData = {
            cedente_id: objCampo.value
        };

        geral.populaFiltering('conta_id', url_popula, objData, objCampo);
    }

    this.visualizar = function (lancamentoId, bancoCodigo) {

        var largura = 1024;
        var altura = 768;
        var esquerda = (screen.width - largura) / 2;
        var topo = (screen.height - altura) / 2;

        var boleto = '';        
        switch (bancoCodigo) {

            case '341':
                boleto = 'imprimirboletoitau';
                break;
            case '033':
                boleto = 'imprimirboletosantander';
                break;
            case '001':
                boleto = 'imprimirboletobb';
                break;
            case '237':
                boleto = 'imprimirboletobradesco';
                break;
            case '107':
                boleto = 'imprimirboletocef';
                break;
        }

        window.open(boleto + '/cod/' + lancamentoId,
                'Visualizar', 'scrollbars=yes,width=' + largura + ',height=' + altura + ',top=' + topo + ',left=' + esquerda);

    }

}
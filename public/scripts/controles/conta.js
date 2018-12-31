//Instancia da classe 
conta = new Conta();

/*
 * Executa apos carregar a pagina
 */
$(document).ready(function () {

    conta.init();

});

/*
 * Classe de conta
 */
function Conta() {
    this.init = function () {

        this.validaForm();
    };


    /**
     * valida o formulario
     */
    this.validaForm = function () {

        //ValidaÃ§Ã£o
        $("form").validate(
                {
                    rules: {
                        conta_nome: {
                            required: true
                        },
                        conta_numero: {
                            required: true
                        },
                        conta_agencia: {
                            required: true
                        },
                        conta_banco: {
                            required: true
                        },
                        cedente_id: {
                            required: true
                        },
                        conta_status: {
                            required: true
                        },
                        conta_contrato: {
                            required: true
                        },
                        conta_convenio: {
                            required: true
                        },
                        conta_obscaixa: {
                            required: true
                        },
                        conta_numerodigito: {
                            required: true
                        },
                        conta_agenciadigito: {
                            required: true
                        }
                    },
                    messages: {
                        conta_nome: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_numero: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_agencia: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_banco: {
                            required: 'Preenchimento Obrigatório'
                        },
                        cedente_id: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_status: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_contrato: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_convenio: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_obscaixa: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_numerodigito: {
                            required: 'Preenchimento Obrigatório'
                        },
                        conta_agenciadigito: {
                            required: 'Preenchimento Obrigatório'
                        }
                    }
                });

    };

}
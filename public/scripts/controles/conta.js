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

        //Validação
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
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_numero: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_agencia: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_banco: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_id: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_status: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_contrato: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_convenio: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_obscaixa: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_numerodigito: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        conta_agenciadigito: {
                            required: 'Preenchimento Obrigat�rio'
                        }
                    }
                });

    };

}
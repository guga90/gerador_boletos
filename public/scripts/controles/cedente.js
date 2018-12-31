//Instancia da classe 
cedente = new Cedente();

/*
 * Executa apos carregar a pagina
 */
$(document).ready(function() {

    cedente.init();

});

/*
 * Classe de cedente
 */
function Cedente() {
    this.init = function() {

        this.validaForm();
        
        this.validaTipoPessoa();

    };

    this.consultarCep = function(cep) {

        geral.loading(true);
        //Popula a grid de paramclientes
        $.ajax({
            type: "GET",
            url: "http://gustavomendanha/consultacep/index.php?cep=" + cep + "&tipo=json",
            dataType: "json",
            success: function(object) {

                $('#cedente_setor').val(object.bairro);
                $('#cedente_cidade').val(object.cidade);
                $('#cedente_logradouro').val(object.rua);
                $('#cedente_estado').val(object.estado);

                geral.loading(false);
            },
            error: function(erro) {
                geral.loading(false);
                console.log(erro);
            }
        });
    };

    this.validaTipoPessoa = function() {

        if ($('#cedente_tipopessoa').val() == 'F') {
            $("#cedente_cpfcnpj").mask("999.999.999-99");
            $("#cedente_cpfcnpj").rules("add", {
                verificaCNPJ: false,
                verificaCPF: true,
                required: true
            });
        } else {
            $("#cedente_cpfcnpj").mask("99.999.999/9999-99");
            $("#cedente_cpfcnpj").rules("add", {
                verificaCNPJ: true,
                verificaCPF: false,
                required: true
            });
        }
    };

    /**
     * valida o formulario
     */
    this.validaForm = function() {

        $("#cedente_cep").mask("99999-999");
        $("#cedente_dtnasc").mask("99/99/9999");
        $("#cedente_telefone").mask("(99) 9999-9999");

        //Validação
        $("form").validate(
                {
                    rules: {
                        cedente_nome: {
                            required: true
                        },
                        cedente_cpf: {
                            required: true,
                            verificaCPF: true
                        },
                        cedente_telefone: {
                            required: true
                        },
                        cedente_senha: {
                            required: true
                        },
                        cedente_email: {
                            required: true,
                            email: true
                        },
                        cedente_status: {
                            required: true
                        },
                        cedente_logradouro: {
                            required: true
                        },
                        cedente_cep: {
                            required: true
                        },
                        cedente_cidade: {
                            required: true
                        },
                        cedente_estado: {
                            required: true
                        },
                        cedente_setor: {
                            required: true
                        },
                        confirma_senha: {
                            required: true,
                            equalTo: "#cedente_senha"
                        }


                    },
                    messages: {
                        cedente_nome: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_cpf: {
                            required: 'Preenchimento Obrigat�rio',
                            verificaCPF: 'CPF inv�lido'
                        },
                        cedente_telefone: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_senha: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_email: {
                            required: 'Preenchimento Obrigat�rio',
                            date: 'Email inv�lido'
                        },
                        cedente_status: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_logradouro: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_cep: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_cidade: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_estado: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        cedente_setor: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        confirma_senha: {
                            required: 'Preenchimento Obrigat�rio',
                            equalTo: "As senhas n�o conferem"
                        }
                    }
                });

    };

}
//Instancia da classe 
sacado = new Sacado();

/*
 * Executa apos carregar a pagina
 */
$(document).ready(function() {

    sacado.init();

});

/*
 * Classe de sacado
 */
function Sacado() {
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

                $('#sacado_setor').val(object.bairro);
                $('#sacado_cidade').val(object.cidade);
                $('#sacado_logradouro').val(object.rua);
                $('#sacado_estado').val(object.estado);

                geral.loading(false);
            },
            error: function(erro) {
                geral.loading(false);
                console.log(erro);
            }
        });
    };
    this.validaTipoPessoa = function() {

        if ($('#sacado_tipopessoa').val() == 'F') {
            $("#sacado_cpfcnpj").mask("999.999.999-99");
            $("#sacado_cpfcnpj").rules("add", {
                verificaCNPJ: false,
                verificaCPF: true,
                required: true
            });
        } else {
            $("#sacado_cpfcnpj").mask("99.999.999/9999-99");
            $("#sacado_cpfcnpj").rules("add", {
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

        $("#sacado_cep").mask("99999-999");
        $("#sacado_cpf").mask("999.999.999-99");
        $("#sacado_dtnasc").mask("99/99/9999");
        $("#sacado_telefone").mask("(99) 9999-9999");

        //ValidaÃ§Ã£o
        $("form").validate(
                {
                    rules: {
                        sacado_nome: {
                            required: true
                        },
                        sacado_cpf: {
                            required: true,
                            verificaCPF: true
                        },
                        sacado_telefone: {
                            required: true
                        },
                        sacado_senha: {
                            required: true
                        },
                        sacado_email: {
                            required: true,
                            email: true
                        },
                        sacado_status: {
                            required: true
                        },
                        sacado_logradouro: {
                            required: true
                        },
                        sacado_cep: {
                            required: true
                        },
                        sacado_cidade: {
                            required: true
                        },
                        sacado_estado: {
                            required: true
                        },
                        sacado_setor: {
                            required: true
                        },
                        confirma_senha: {
                            required: true,
                            equalTo: "#sacado_senha"
                        }


                    },
                    messages: {
                        sacado_nome: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_cpf: {
                            required: 'Preenchimento Obrigatório',
                            verificaCPF: 'CPF inválido'
                        },
                        sacado_telefone: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_senha: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_email: {
                            required: 'Preenchimento Obrigatório',
                            date: 'Email inválido'
                        },
                        sacado_status: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_logradouro: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_cep: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_cidade: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_estado: {
                            required: 'Preenchimento Obrigatório'
                        },
                        sacado_setor: {
                            required: 'Preenchimento Obrigatório'
                        },
                        confirma_senha: {
                            required: 'Preenchimento Obrigatório',
                            equalTo: "As senhas não conferem"
                        }
                    }
                });

    };

}
//Instancia da classe 
usuario = new Usuario();

/*
 * Executa apos carregar a pagina
 */
$(document).ready(function() {

    usuario.init();

});

/*
 * Classe de usuario
 */
function Usuario() {
    this.init = function() {

        this.validaForm();

    };

    this.consultarCep = function(cep) {

        geral.loading(true);
        //Popula a grid de paramclientes
        $.ajax({
            type: "GET",
            url: "http://gustavomendanha.com/consultacep/index.php?cep=" + cep + "&tipo=json",
            dataType: "json",
            success: function(object) {

                $('#usuario_setor').val(object.bairro);
                $('#usuario_cidade').val(object.cidade);
                $('#usuario_logradouro').val(object.rua);
                $('#usuario_estado').val(object.estado);

                geral.loading(false);
            },
            error: function(erro) {
                geral.loading(false);
                console.log(erro);
            }
        });
    };


    /**
     * valida o formulario
     */
    this.validaForm = function() {

        $("#usuario_cep").mask("99999-999");
        $("#usuario_cpf").mask("999.999.999-99");
        $("#usuario_dtnasc").mask("99/99/9999");
        $("#usuario_telefone").mask("(99) 9999-9999");

        //ValidaÃ§Ã£o
        $("form").validate(
                {
                    rules: {
                        usuario_nome: {
                            required: true
                        },
                        usuario_cpf: {
                            required: true,
                            verificaCPF: true
                        },
                        usuario_telefone: {
                            required: true
                        },
                        usuario_senha: {
                            required: true
                        },
                        usuario_dtnasc: {
                            required: true,
                            date: true
                        },
                        usuario_status: {
                            required: true
                        },
                        usuario_logradouro: {
                            required: true
                        },
                        usuario_cep: {
                            required: true
                        },
                        usuario_cidade: {
                            required: true
                        },
                        usuario_estado: {
                            required: true
                        },
                        usuario_setor: {
                            required: true
                        },
                        confirma_senha: {
                            required: true,
                            equalTo: "#usuario_senha"
                        }


                    },
                    messages: {
                        usuario_nome: {
                            required: 'Preenchimento Obrigatório'
                        },
                        usuario_cpf: {
                            required: 'Preenchimento Obrigatório',
                            verificaCPF: 'CPF inválido'
                        },
                        usuario_telefone: {
                            required: 'Preenchimento Obrigatório'
                        },
                        usuario_senha: {
                            required: 'Preenchimento Obrigatório'
                        },
                        usuario_dtnasc: {
                            required: 'Preenchimento Obrigatório',
                            dateFormat: "dd/mm/yy",
                            date: 'Data inválida'
                        },
                        usuario_status: {
                            required: 'Preenchimento Obrigatório'
                        },
                        usuario_logradouro: {
                            required: 'Preenchimento Obrigatório'
                        },
                        usuario_cep: {
                            required: 'Preenchimento Obrigatório'
                        },
                        usuario_cidade: {
                            required: 'Preenchimento Obrigatório'
                        },
                        usuario_estado: {
                            required: 'Preenchimento Obrigatório'
                        },
                        usuario_setor: {
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
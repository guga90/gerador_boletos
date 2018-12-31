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

        //Validação
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
                            required: 'Preenchimento Obrigat�rio'
                        },
                        usuario_cpf: {
                            required: 'Preenchimento Obrigat�rio',
                            verificaCPF: 'CPF inv�lido'
                        },
                        usuario_telefone: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        usuario_senha: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        usuario_dtnasc: {
                            required: 'Preenchimento Obrigat�rio',
                            dateFormat: "dd/mm/yy",
                            date: 'Data inv�lida'
                        },
                        usuario_status: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        usuario_logradouro: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        usuario_cep: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        usuario_cidade: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        usuario_estado: {
                            required: 'Preenchimento Obrigat�rio'
                        },
                        usuario_setor: {
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
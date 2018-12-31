//Instancia da classe 
login = new Login();

/*
 * Executa apos carregar a pagina
 */
$(document).ready(function() {

    login.init();

});

/*
 * Classe de login
 */
function Login() {
    this.init = function() {

        this.validaForm();

    };


    /**
     * valida o formulario
     */
    this.validaForm = function() {

        $("#usuario_cpf").mask("999.999.999-99");

    };
}
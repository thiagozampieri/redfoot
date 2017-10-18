<?php
/**
 * Created by PhpStorm.
 * User: thiagozampieri
 * Date: 16/10/17
 * Time: 15:15
 */
?>

<?php include "../../app/autoload.php"; ?>

<?php
if (isset($_POST['action']) && $_POST['action'] != '') {
    new RegisterStartupController();
}

?>

<div id="fh5co-startup-register">
    <div id="contanier" class="startup-register-form">
        <?php Message::showMessage(); ?>

        <form class="col-sm-12 register-form center-align" enctype="multipart/form-data" method="POST" action="">
            <input type="hidden" name="action" value="save"/>


            <h3>Dados pessoais </h3>
            <hr/>


            <div class="row">
                <div class="col-sm-6 inline-block "><input type="text" name="ent_name" placeholder="Nome"
                                                           class="form-control" required/></div>
                <div class="col-sm-6 inline-block "><input type="email" name="ent_email" placeholder="Email"
                                                           class="form-control" required/>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 inline-block "><input type="text" name="ent_document1" placeholder="CPF"
                                                           class="form-control cpf" required/></div>
                <div class="col-sm-6 inline-block "><input type="text" name="graduation" placeholder="Graduação"
                                                           class="form-control" required/>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 inline-block">
                    <label> Gostaria de ser voluntário Redfoot ?</label>
                    <select id="voluntary" name="voluntary" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 inline-block "><input type="password" name="password" placeholder="Senha"
                                                           class="form-control cpf" required/></div>
                <div class="col-sm-6 inline-block "><input type="password" name="confirm_password" placeholder="Confirmar senha"
                                                           class="form-control" required/>
                </div>
            </div>

            <br/>
            <br/>
            <h3>Dados da startup </h3>

            <hr/>

            <div class="row">
                <div class="col-md-12">
                    <label>Logo da startup</label><br/>
                    <div class="inline-block "><input type="file" name="file" placeholder="Logo da Startup" class="form-control" required/></div>

                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 inline-block "><input type="text" name="name" placeholder="Nome da Startup"
                                                           class="form-control" required/></div>
                <div class="col-sm-6 inline-block "><input type="text" name="url" placeholder="Site "
                                                           class="form-control" required/>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 inline-block "><input type="number" name="partners_number"
                                                           placeholder="Número de sócios" class="form-control"/></div>
                <div class="col-sm-6 inline-block "><input type="number" name="employees_number"
                                                           placeholder="Número de empregados" class="form-control"/>
                </div>
            </div>


            <div class="row">
                <div class="col-sm-6 inline-block "><input type="text" name="start_date" placeholder="Início"
                                                           class="form-control date"/></div>
            </div>


            <div class="row">
                <div class="col-sm-6 inline-block ">
                    <label> É formalizada ? </label>
                    <select id="is_formalized" name="is_formalized" class="form-control">
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>

                </div>


                <div id="not_formalized" class="col-sm-6 " style="display: block">
                    <label> Motivo da não formalização </label>
                    <select id="reason_formalized" name="reason_formalized" class="form-control " required>
                        <option value="">Selecione um motivo</option>
                        <option value="0">Estou em processo de formalização</option>
                        <option value="1">Pretendo me formalizar ainda esse ano</option>
                        <option value="2">Isso é uma decisão futura</option>
                    </select>
                </div>

            </div>


            <div id="only_formalized" style="display:none;">

                <div class="row">
                    <div class="col-sm-6 inline-block "><input type="text" name="fullname" placeholder="Razão Social"
                                                               class="form-control"/></div>
                    <div class="col-sm-6 inline-block "><input type="text" name="document1" placeholder="CNPJ"
                                                               class="form-control cnpj"/></div>
                </div>

                <div class="row">
                    <div class="col-sm-6 inline-block "><input type="text" name="foundation_date"
                                                               placeholder="Data de fundação"
                                                               class="form-control date"/>
                    </div>
                    <div class="col-sm-6 inline-block "><input type="text" name="contact_name"
                                                               placeholder="Nome de contato"
                                                               class="form-control "/></div>

                </div>

            </div>


            <div class="row ">
                <div class="col-sm-6">
                    <label> Qual é a sua faixa de faturamento mensal? </label>
                    <select id="billing_range" name="billing_range" class="form-control " required>
                        <option value="">Selecione uma faixa</option>
                        <option value="0">Até R$ 1.000,00</option>
                        <option value="1">De R$ 1.000,00 a R$ 10.000,00</option>
                        <option value="2">Acima de R$ 10.000,00</option>
                    </select>
                </div>

                <div class="col-sm-6">
                    <label> Marque nas opções a seguir o que se refere a sua startup:</label>
                    <br/>
                    <input name="options_data[]" value="0" id="options_data_1" type="checkbox"/> <label class="options"
                                                                                                        for="options_data_1">Faço
                        ou já fiz parte de um processo de aceleração </label> <br/>
                    <input name="options_data[]" value="1" id="options_data_2" type="checkbox"/> <label class="options"
                                                                                                        for="options_data_2">Já
                        fui contemplado em algum edital </label><br/>
                    <input name="options_data[]" value="2" id="options_data_3" type="checkbox"/> <label class="options"
                                                                                                        for="options_data_3">Estou
                        ou já estive instalado em uma incubadora </label><br/>
                    <input name="options_data[]" value="3" id="options_data_4" type="checkbox"/> <label class="options"
                                                                                                        for="options_data_4">Estou
                        ou já estive instalado em um coworking </label><br/>
                    <input name="options_data[]" value="4" id="options_data_5" type="checkbox"/> <label class="options"
                                                                                                        for="options_data_5">Tenho
                        parceria ou contrato com Grande Empresa </label><br/>
                    <input name="options_data[]" value="5" id="options_data_6" type="checkbox"/> <label class="options"
                                                                                                        for="options_data_6">
                        Nenhuma das anteriores </label><br/>

                </div>


            </div>

            <div class="row">
                <div class="col-sm-12">
                    <label>Quais são as suas principais necessidades para o avanço do seu projeto?</label>
                    <br/>
                    <textarea style="width: 100%" name="needs_text" id="needs_text"></textarea>
                </div>

            </div>

            <br/>
            <br/>
            <h3>O negócio </h3>
            <hr/>


            <div class="row">
                <div class="col-sm-6 inline-block ">
                    <label> Mercado Principal </label>
                    <select id="main_market" name="main_market" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="1">Advertising</option>
                        <option value="2">Agronegócio</option>
                        <option value="3">Automobilismo</option>
                        <option value="4">BigData</option>
                        <option value="5">Biotecnologia</option>
                        <option value="6">Casa e Família</option>
                        <option value="7">Cloud Computing</option>
                        <option value="8">CRM</option>
                        <option value="9">Direito</option>
                        <option value="10">E-commerce</option>
                        <option value="11">Educação</option>
                        <option value="12">Entretenimento</option>
                        <option value="13">Esportes</option>
                        <option value="14">Eventos e Turismo</option>
                        <option value="15">Finanças</option>
                        <option value="16">Games</option>
                        <option value="17">Hardware</option>
                        <option value="18">Infantil</option>
                        <option value="19">Logística e Mobilidade Urbana</option>
                        <option value="20">Meio Ambiente</option>
                        <option value="21">Mobile</option>
                        <option value="22">Moda e Beleza</option>
                        <option value="23">Nanotecnologia</option>
                        <option value="24">Pets</option>
                        <option value="25">Recrutamento</option>
                        <option value="26">Recursos Humanos</option>
                        <option value="27">Saúde e bem-estar</option>
                        <option value="28">Seguranca e Defesa</option>
                        <option value="29">Seguros</option>
                        <option value="30">TIC e Telecom</option>
                        <option value="31">Transportes</option>
                        <option value="32">Varejo/Atacado</option>
                        <option value="33">Vendas e Marketing</option>
                        <option value="34">Vídeo</option>
                        <option value="35">Imobiliário</option>
                        <option value="36">Produtos de Consumo</option>
                        <option value="37">Serviços Profissionais, científicos ou técnicos</option>
                        <option value="38">Indústria</option>
                        <option value="39">Energia</option>
                        <option value="40">Outros</option>
                    </select>

                </div>

                <div class="col-sm-6 inline-block ">
                    <label> Mercado Complementar </label>
                    <select id="complementary_market" name="complementary_market" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="1">Advertising</option>
                        <option value="2">Agronegócio</option>
                        <option value="3">Automobilismo</option>
                        <option value="4">BigData</option>
                        <option value="5">Biotecnologia</option>
                        <option value="6">Casa e Família</option>
                        <option value="7">Cloud Computing</option>
                        <option value="8">CRM</option>
                        <option value="9">Direito</option>
                        <option value="10">E-commerce</option>
                        <option value="11">Educação</option>
                        <option value="12">Entretenimento</option>
                        <option value="13">Esportes</option>
                        <option value="14">Eventos e Turismo</option>
                        <option value="15">Finanças</option>
                        <option value="16">Games</option>
                        <option value="17">Hardware</option>
                        <option value="18">Infantil</option>
                        <option value="19">Logística e Mobilidade Urbana</option>
                        <option value="20">Meio Ambiente</option>
                        <option value="21">Mobile</option>
                        <option value="22">Moda e Beleza</option>
                        <option value="23">Nanotecnologia</option>
                        <option value="24">Pets</option>
                        <option value="25">Recrutamento</option>
                        <option value="26">Recursos Humanos</option>
                        <option value="27">Saúde e bem-estar</option>
                        <option value="28">Seguranca e Defesa</option>
                        <option value="29">Seguros</option>
                        <option value="30">TIC e Telecom</option>
                        <option value="31">Transportes</option>
                        <option value="32">Varejo/Atacado</option>
                        <option value="33">Vendas e Marketing</option>
                        <option value="34">Vídeo</option>
                        <option value="35">Imobiliário</option>
                        <option value="36">Produtos de Consumo</option>
                        <option value="37">Serviços Profissionais, científicos ou técnicos</option>
                        <option value="38">Indústria</option>
                        <option value="39">Energia</option>
                        <option value="40">Outros</option>
                    </select>

                </div>

            </div>


            <div class="row">
                <div class="col-sm-6 inline-block ">
                    <label> Momento atual </label>
                    <select id="current_moment" name="current_moment" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="0">Estou vendendo e ganhando escala</option>
                        <option value="1">O MVP está pronto e sendo validado com o mercado</option>
                        <option value="2">Estou na fase de operação: desenvolvendo minha solução e estudando o mercado
                        </option>
                        <option value="3">Estou apenas com a ideia, mas ainda pretendo avançar com o modelo de negócio
                        </option>
                        <option value="4">Foi descontinuado e não pretendo avançar com o projeto</option>
                    </select>

                </div>

                <div class="col-sm-6 inline-block ">
                    <label> Público alvo principal </label>
                    <select id="target_audience" name="target_audience" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="0">B2B</option>
                        <option value="1">B2C</option>
                        <option value="2">C2C</option>
                        <option value="2">B2G</option>
                    </select>
                </div>

            </div>


            <div class="row">
                <div class="col-sm-6 inline-block ">
                    <label> Modelo de Negócios </label>
                    <select id="business_model" name="business_model" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="0">SAAS (Software as a service)</option>
                        <option value="1">Aplicativo</option>
                        <option value="2">Marketplace</option>
                        <option value="3">Software ou Hardware</option>

                    </select>

                </div>

                <div class="col-sm-6 inline-block ">
                    <label> Modelo de receita </label>
                    <select id="revenue_model" name="revenue_model" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="0">Premium (pagou, levou)</option>
                        <option value="1">Freemium (parte gratís, parte paga)</option>
                        <option value="2">Assinatura</option>
                        <option value="2">Publicidade</option>
                    </select>
                </div>

            </div>


            <br/>
            <br/>

            <h3>Investimento </h3>

            <hr/>


            <div class="row">
                <div class="col-sm-6 inline-block ">
                    <label> Sua startup já recebeu investimento? </label>
                    <select id="is_invested" name="is_invested" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="0">Não</option>
                        <option value="1">Sim</option>
                    </select>

                </div>

                <div class="col-sm-6 inline-block ">
                    <label> Busca investimento para avanço da startup?</label>
                    <select id="looking_for_investment" name="looking_for_investment" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="0">No momento não, pretendo trabalhar com recursos próprios</option>
                        <option value="1">Sim, mas caso não aconteça continuarei com recursos próprios</option>
                        <option value="2"> Sim, sem investimento não tenho como perseverar.</option>
                    </select>
                </div>

            </div>

            <div class="row">
                <div class="col-sm-6 inline-block ">
                    <label> No caso de ser investido, como pretende aplicar o recurso?
                    </label>
                    <select id="investment_data" name="investment_data" class="form-control" required>
                        <option>Selecione...</option>
                        <option value="0">Aplicar em marketing para aquisição de clientes </option>
                        <option value="1">Pretendo aumentar minha equipe</option>
                        <option value="2">Vou investir em pesquisa e desenvolvimento que melhore meu produto/serviço</option>
                        <option value="3">Melhoria de processo e ganho de performance</option>
                        <option value="4">Cursos, capacitações e eventos de networking</option>

                    </select>

                </div>

            </div>


            <br/>
            <br/>

            <h3>Localização </h3>

            <hr/>


            <div class="row">
                <div class="col-sm-4 inline-block "><input type="text" name="zipcode" placeholder="CEP"
                                                           class="form-control cep" required/></div>

            </div>


            <div class="row">
                <div class="col-sm-8 inline-block "><input type="text" name="street" placeholder="Endereço"
                                                           class="form-control " required/></div>

                <div class="col-sm-4 inline-block "><input type="text" name="number" placeholder="Número"
                                                           class="form-control " required/></div>
            </div>

            <div class="row">
                <div class="col-sm-6 inline-block "><input type="text" name="complement" placeholder="Complemento"
                                                           class="form-control " /></div>

                <div class="col-sm-6 inline-block "><input type="text" name="neighborhood" placeholder="Bairro"
                                                          class="form-control " required/></div>
            </div>


            <div class="row">
                <div class="col-sm-6 inline-block "><input type="text" name="city" placeholder="Cidade"
                                                           class="form-control " required /></div>
            </div>


            <br style="clear:both;"/>



            <div class="row ">
                <button class="btn btn-info col-md-12" type="submit">Enviar</button>
            </div>

        </form>

    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('#is_formalized').change(function () {
            if ($(this).val() == 1) {
                $('#only_formalized').show();
                $('#not_formalized').hide();
            } else {
                $('#not_formalized').show();
                $('#only_formalized').hide();
            }
        })
    });

</script>
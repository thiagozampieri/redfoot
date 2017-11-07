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
                                                           class="form-control " required/></div>
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
                    <select id="main_market" name="main_market" class="form-control select2" required>
                        <option>Selecione...</option>

                        <?php foreach(StartupHelper::getCategoryOptions() as $key => $option): ?>
                            <option value="<?= $key ?>"><?= $option; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-sm-6 inline-block ">
                    <label> Mercado Complementar </label>
                    <select id="complementary_market" name="complementary_market[]" class="form-control select2-multiple" multiple required>
                        <option>Selecione...</option>
                        <?php foreach(StartupHelper::getCategoryOptions() as $key => $option): ?>
                                <option value="<?= $key ?>"><?= $option; ?></option>
                        <?php endforeach; ?>
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

                <div class="col-sm-6 inline-block "><select name="uf" class="form-control from-control-lg" style="height: 100%!important" required>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="DF">Distrito Federal</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                    </select></div>
            </div>


            <br style="clear:both;"/>



            <div class="row ">
                <button class="btn btn-info col-md-12" type="submit">Enviar</button>
            </div>

        </form>

    </div>
</div>

<script type="text/javascript">

    var last_valid_selection = null;
    $(document).ready(function () {


        $('#is_formalized').change(function () {
            if ($(this).val() == 1) {
                $('#only_formalized').show();
                $('#not_formalized').hide();
                $('#reason_formalized').removeAttr('required');
            } else {
                $('#not_formalized').show();
                $('#only_formalized').hide();
                $('#reason_formalized').attr('required', true);
            }
        })
    });

</script>
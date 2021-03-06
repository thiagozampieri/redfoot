<?php

/**
 * Created by PhpStorm.
 * User: thiagomzampieri
 * Date: 16/10/17
 * Time: 15:09
 */
class RegisterStartupController
{
    public function __construct()
    {
        switch ($_POST['action']) {
            case "save":
                $this->save();
                return;
            default:
                Message::msgError("Nenhuma ação encontrada");
        }

        Redirect::back();

    }

    public function save(){
        $data = new stdClass();
        $v_keys = array_keys($_POST);

        foreach ($v_keys as $key) {
            if ($key != 'action' & $key != 'complementary_market')
                $data->$key = htmlspecialchars($_POST[$key]);

            elseif ($key == 'complementary_market')
                $data->$key = ($_POST[$key]);
        }

        if ($data->password != $data->confirm_password) {
            Message::msgError("As senhas não combinam");
        } else {
            $startup = Startup::find($data->startup_id);
            if (is_null($startup) || $startup->id != $data->startup_id) {

                $uploaddir = 'media/';
                $image_path = $uploaddir . md5(basename($_FILES['file']['name'])) . basename($_FILES['file']['name']);

                $is_image = move_uploaded_file($_FILES['file']['tmp_name'], $image_path);
                if ($is_image) {

                    $startup = Startup::where(array('name' => $data->name));
                    if ($startup->count() <= 0 & $data->name != '') {

                        $startup = new Startup();
                        $startup->name = $data->name;
                        $startup->url = $data->url;
                        $startup->level = intval($data->level);
                        $startup->partners_number = intval($data->partners_number);
                        $startup->employees_number = intval($data->employees_number);
                        $startup->start_date = Util::formatDate($data->start_date);
                        $startup->is_formalized = intval($data->is_formalized);
                        $startup->fullname = $data->fullname;
                        $startup->document1 = Util::onlyNumbers($data->document1);
                        $startup->foundation_date = Util::formatDate($data->foundation_date);
                        $startup->reason_formalized = $data->reason_formalized ? $data->reason_formalized : 0;
                        $startup->contact_name = $data->contact_name;
                        $startup->email = $data->email;
                        $startup->phone = $data->phone;
                        $startup->billing_range = ($data->billing_range !== "" && $data->billing_range !== false) ? $data->billing_range : -1;
                        $startup->options_data = json_encode($data->options_data);
                        $startup->needs_text = $data->needs_text;
                        $startup->image_path = $image_path;
                        $startup->created_date = date('Y-m-d H:i:s');
                        $startup->status = 1;

                        $startup->save();

                        if ($startup->id > 0) {
                            $address = new Address();
                            $address->startup_id = $startup->id;
                            $address->type = 1;
                            $address->street = $data->street;
                            $address->number = $data->number;
                            $address->complement = $data->complement;
                            $address->neighborhood = $data->neighborhood;
                            $address->zipcode = Util::onlyNumbers($data->zipcode);
                            $address->city = $data->city;
                            $address->uf = $data->uf;

                            $geolocation = Geolocation::getByAddress($address);
                            //print_r($geolocation); exit();
                            $address->lat = $geolocation->lat;
                            $address->lng = $geolocation->lng;

                            $address->save();

                            $business = new Business();
                            $business->startup_id = $startup->id;
                            $business->main_market = intval($data->main_market);
                            $business->complementary_market = json_encode($data->complementary_market);
                            $business->current_moment = intval($data->current_moment);
                            $business->target_audience = $data->target_audience;
                            $business->business_model = intval($data->business_model);
                            $business->revenue_model = intval($data->revenue_model);
                            $business->save();

                            $investment = new Investment();
                            $investment->startup_id = $startup->id;
                            $investment->is_invested = intval($data->is_invested);
                            $investment->looking_for_investment = intval($data->looking_for_investment);
                            $investment->investment_data = json_encode($data->looking_for_investment);
                            $investment->save();

                            Message::msgSuccess("Cadastrado com Sucesso");
                        } else {
                            $startup = Startup::find($startup->id);
                            $startup->destroy();
                        }
                    } else {
                        Message::msgError("Não foi possível recadastrar startup");
                    }
                } else {
                    Message::msgError("Não foi possível fazer o upload de arquivo!");
                }
            } else {
                echo 'AQUI';
            }

            if ($startup->id > 0) {
                $entrepeneur = Entrepreneur::where(array('email' => $data->ent_email));
                if ($entrepeneur->count() <= 0) {

                    $entrepeneur = new Entrepreneur();
                    $entrepeneur->name = $data->ent_name;
                    $entrepeneur->email = $data->ent_email;
                    $entrepeneur->linkedin = $data->linkedin;
                    $entrepeneur->facebook = $data->facebook;
                    $entrepeneur->bound = $data->bound;
                    $entrepeneur->document1 = Util::onlyNumbers($data->ent_document1);
                    $entrepeneur->graduation = $data->graduation;
                    $entrepeneur->voluntary = $data->voluntary;
                    $entrepeneur->password = md5($data->password);
                    $entrepeneur->startup_id = $startup->id;
                    $entrepeneur->save();
                } else {
                    Message::msgError("Usuario já cadastrado!");
                }
            }
        }
    }
}
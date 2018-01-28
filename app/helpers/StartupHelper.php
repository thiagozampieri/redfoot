<?php
/**
 * Created by PhpStorm.
 * User: guilherme
 * Date: 07/11/17
 * Time: 11:18
 */

class StartupHelper
{

    /**
     * Retorna as opcoes de startups
     * @return array
     */
    static function getCategoryOptions()
    {
        return array(
            1 => "Advertising",
            2 => "Agronegócio",
            3 => "Automobilismo",
            4 => "BigData",
            5 => "Biotecnologia",
            6 => "Casa e Família",
            7 => "Cloud Computing",
            8 => "Comunicação e Mídia",
            9 => "Construção Civil",
            10 => "CRM",
            11 => "Direito",
            12 => "E-commerce",
            13 => "Educação",
            14 => "Energia",
            15 => "Entretenimento",
            16 => "Esportes",
            17 => "Eventos e Turismo",
            18 => "Finanças",
            19 => "Games",
            20 => "Hardware",
            21 => "Imobiliário",
            22 => "Indústria",
            23 => "Infantil",
            24 => "Internet",
            25 => "Logística e Mobilidade Urbana",
            26 => "Meio Ambiente",
            27 => "Mobile",
            28 => "Moda e Beleza",
            29 => "Nanotecnologia",
            30 => "Pets",
            31 => "Recrutamento",
            32 => "Recursos Humanos",
            33 => "Saúde e bem-estar",
            34 => "Social",
            35 => "Seguranca e Defesa",
            36 => "Seguros",
            37 => "Serviços Profissionais, científicos ou técnicos",
            38 => "TIC e Telecom",
            39 => "Transportes",
            40 => "Varejo / Atacado",
            41 => "Vendas e Marketing",
            42 => "Vídeo",
            43 => "Outros",
            0 => "Nenhuma",
        );
    }

    /**
     * Retorna as opcoes de GRADUAÇÃO
     * @return array
     */
    static function getGraduationOptions()
    {
        return array(
            0 => "Ensino Fundamental",
            1 => "Ensino Médio",
            2 => "Educação Profissional",
            3 => "Graduação (Tecnólogo)",
            4 => "Graduação (Bacharelado ou Licenciatura",
            5 => "Pós Graduação (Especialização)",
            6 => "Pós Graduação (Mestrado)",
            7 => "Pós Graduação (Doutorado)",
            8 => "Pós Graduação (Pós Doutorado)",
        );
    }

    /**
     * Retorna as opcoes de STARTUP
     * @return array
     */
    static function getStartupOptions()
    {
        $startups = Startup::all();
        $_options = array();
        while($startup = $startups->next()){
            $_options[$startup->id] = $startup->name;
        }
        return $_options;
    }
}
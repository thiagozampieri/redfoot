<?php

class Startup extends TORM\Model
{



}


StartupHelper::setTableName('startup');
StartupHelper::setPK('id');

StartupHelper::hasMany("address", array("class_name"=>"address"));
StartupHelper::hasOne("business", array("class_name"=>"business"));
StartupHelper::hasOne("investment");

<?php

class Startup extends TORM\Model
{



}


Startup::setTableName('startup');
Startup::setPK('id');

Startup::hasMany("address", array("class_name"=>"address"));
Startup::hasOne("business", array("class_name"=>"business"));
Startup::hasOne("investment");

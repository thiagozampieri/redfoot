<?php

class Address extends TORM\Model
{



}


Address::setTableName('address');
Address::setPK('startup_id');
Address::belongsTo("startup");
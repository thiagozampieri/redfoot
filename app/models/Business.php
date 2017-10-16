<?php

class Business extends TORM\Model
{



}


Business::setTableName('business');
Business::setPK('startup_id');
Business::belongsTo("startup");
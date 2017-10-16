<?php

class Investment extends TORM\Model
{



}


Investment::setTableName('investment');
Investment::setPK('startup_id');
Investment::belongsTo("startup");

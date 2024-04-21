<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\CommonModel;

class CityModel extends CommonModel
{
    protected $table = 'cities';
    protected $extraAllowedFields = ['region_id'];
}

<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Libraries\CommonModel;

class RegionModel extends CommonModel
{
    protected $table = 'regions';
    protected $extraAllowedFields = ['country_id'];
}

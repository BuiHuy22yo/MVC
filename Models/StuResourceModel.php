<?php

namespace MVC\Models;

use MVC\Models\StuModel;
use MVC\Core\ResourceModel;

class StuResourceModel extends ResourceModel
{
    public function __construct()
    {
        parent::_init('stu', 'id', new StuModel);
    }
}

<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\SkillModel;

class SkillController extends Controller
{

    public function index()
    {
        $userId = Helper::getUserIdFromSession();
        
        $skills = SkillModel::load()->all(null, $userId);

        View::render('skills/index.view', [
            'skills'    => $skills,
        ]);
    }

}
<?php

namespace App\Controllers;

use App\Helpers\Helper;
use App\Libraries\View;
use App\Models\EducationModel;

class EducationController extends Controller
{
    public function create()
    {
        
    }

    public function store()
    {
        $education = $_POST;

        $education['user_id'] = Helper::getUserIdFromSession();
        $education['created'] = date('Y-m-d H:i:s');
        $education['created_by'] = Helper::getUserIdFromSession();

        EducationModel::load()->store($education);
    }

    public function edit()
    {
        $educationId = Helper::getIdFromUrl('education');

        Helper::checkUserIdAgainstLoginId(EducationModel::class, $educationId);

        $education = EducationModel::load()->get($educationId);
        
        return View::render('educations/edit.view', [
            'education' => $education,
            'action'    => 'education/' . $educationId . '/update',
        ]);
    }

    public function update()
    {
         
    }

    public function show()
    {
        
    }
}
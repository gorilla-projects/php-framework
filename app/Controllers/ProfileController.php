<?php

namespace App\Controllers;

use App\Libraries\View;
use App\Helpers\Helper;
use App\Models\EducationModel;

class ProfileController
{
    public function index()
    {
        if (isset($_SESSION) && isset($_SESSION['user'])) {
            $userId = Helper::getUserIdFromSession();

            $educations = EducationModel::load()->userEducations($userId);

            return View::render('credentials/me.view', [
                'educations'    => $educations,
            ]);
        } else {
            header('Location: login');
        }
        
    }

    public function changeEmail()
    {

    }

}
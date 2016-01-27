<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeProject\Validators;

use Prettus\Validator\LaravelValidator;

/**
 * Description of ClientValidator
 *
 * @author ti
 */
class ProjectValidator extends LaravelValidator {

    protected $rules = [
        'owner_id' => 'required|integer',
        'client_id' => 'required|integer',
        'name' => 'required|max:255',
        'description' => 'required',
        'status' => 'required|integer',
        'progress' => 'required|integer',
        'due_date' => 'required|date',
    ];

}

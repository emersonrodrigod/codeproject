<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace CodeProject\Entities;

use \Illuminate\Database\Eloquent\Model;

/**
 * Description of Project
 *
 * @author ti
 */
class ProjectMember extends Model {

    protected $fillable = [
        'project_id',
        'member_id'
    ];

}

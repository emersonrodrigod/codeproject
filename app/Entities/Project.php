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
class Project extends Model {

    protected $fillable = [
        'owner_id',
        'client_id',
        'name',
        'description',
        'progress',
        'status',
        'due_date'
    ];

    public function notes() {
        return $this->hasMany(ProjectNote::class);
    }

    public function owner() {
        return $this->belongsTo(User::class);
    }

    public function client() {
        return $this->belongsTo(Client::class);
    }

}

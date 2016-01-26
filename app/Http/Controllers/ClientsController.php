<?php

namespace CodeProject\Http\Controllers;

use Illuminate\Http\Request;
use CodeProject\Http\Controllers\Controller;
use CodeProject\Entities\Client;
use CodeProject\Repositories\ClientRepository;

class ClientsController extends Controller {

    public function index(ClientRepository $repository) {
        return $repository->all();
    }

    public function store(Request $request) {
        return Client::create($request->all());
    }

    public function show($id) {
        return Client::find($id);
    }

    public function destroy($id) {
        Client::find($id)->delete();
    }

    public function update(Request $request) {
        
    }

}

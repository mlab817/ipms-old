<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\TenPointAgendaResource;
use App\Models\TenPointAgenda;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class TenPointAgendaController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return TenPointAgendaResource::collection(TenPointAgenda::all());
    }
}

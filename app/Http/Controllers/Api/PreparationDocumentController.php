<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\PreparationDocumentResource;
use App\Models\PreparationDocument;
use Illuminate\Http\Request;

class PreparationDocumentController extends Controller
{
    public function index()
    {
        $preparation_documents = PreparationDocument::all();

        return PreparationDocumentResource::collection($preparation_documents);
    }
}

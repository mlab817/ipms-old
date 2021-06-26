<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class ProjectAttachmentController extends Controller
{
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attachment $attachment, Request $request)
    {
        Storage::delete($attachment->download_url);

        $attachment->delete();

        Alert::success('Success', 'Successfully deleted attachment');

        if ($request->ajax()) {
            return response()->json('Success', 200);
        }

        return back();
    }

    public function download(Attachment $attachment)
    {
        return Storage::download($attachment->download_url);
    }
}

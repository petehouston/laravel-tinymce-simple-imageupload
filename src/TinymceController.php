<?php

namespace Petehouston\Tinymce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TinymceController extends Controller
{
    /**
     * Handle image upload from TinyMCE file browser window
     *
     * @param  Request $request
     * @return Response
     */
    public function uploadImage(Request $request)
    {
        $image = $request->file('image');

        $filename = 'image_'.time().'_'.$image->hashName();
        $image = $image->move(public_path('img'), $filename);

        return ("
            <script>
            top.$('.mce-btn.mce-open').parent().find('.mce-textbox').val('/img/".$filename."').closest('.mce-window').find('.mce-primary').click();
            </script>
        ");
    }

}
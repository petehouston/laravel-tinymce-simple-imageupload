<?php

if(! function_exists('mce_back'))
{
    /**
     * Respond a script back to TinyMCE
     *
     * @param  string $filename
     * @return string
     */
    function mce_back($filename)
    {
        return ("
            <script>
            top.$('.mce-btn.mce-open').parent().find('.mce-textbox').val('/". env('TINY_MCE_UPLOAD_DIRECTORY', 'img') ."/".$filename."').closest('.mce-window').find('.mce-primary').click();
            </script>
        ");
    }
}

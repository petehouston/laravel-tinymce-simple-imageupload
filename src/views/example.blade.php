<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TinyMCE Simple Image Upload</title>
    <link rel="stylesheet" href="http://bootswatch.com/flatly/bootstrap.min.css">
</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        TinyMCE Simple Image Upload
                    </div>
                    <div class="panel-body">
                        <form action="#">
                            <textarea name="content" id="" cols="30" rows="10" class="form-control"></textarea>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('mceImageUpload::upload_form')

<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
$().ready(function () {
    tinymce.init({
        selector: 'textarea',
        height: 300,
        theme: 'modern',
        plugins: [
            'image imagetools'
        ],
        toolbar1: 'styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            // trigger file upload form
            if (type == 'image') $('#formUpload input').click();
        }
    });

});
</script>
</body>
</html>
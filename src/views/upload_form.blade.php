<iframe id="frameUpload" name="frameUpload" style="display:none"></iframe>
<form id="formUpload" action="{{$upload_url or route('tinymce.imageupload')}}" target="frameUpload" method="post" enctype="multipart/form-data" style="width:0px;height:0;overflow:hidden">
    <input name="image" type="file" onchange="$('#formUpload').submit();this.value='';">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
</form>
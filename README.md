# laravel-tinymce-simple-imageupload

The simple image upload for TinyMCE in Laravel.

## Why made this?

Because, I use TinyMCE and basically, it is pretty hard to understand how to upload images directly to the editor while editing content. There are many TinyMCE image uploaders out there, but they are too complicated in functions, and I only need one core use-case, **pick up an image to upload**.

That's it, so I create this package for my projects to re-use. Well, if you want, you can use this too.

**This package works with Laravel 5.0+.**

## Installation

```
$ composer require "petehouston/laravel-tinymce-simple-imageupload"
```

For laravel version 5.4 and older, you need to register the service provider in  `config/app.php`.

```
    'providers' => [
        ...

        Petehouston\Tinymce\TinymceServiceProvider::class,

    ]
```

## Usage

In the view that contain setup for TinyMCE, you need to include the upload view, add this line at the bottom,

```
@include('mceImageUpload::upload_form')
```

Don't worry, this form is hidden from your view, no-one will see it because it is `display: none`.

Next step is to add this config to the `tinymce` object,

```
    tinymce.init({
        // .. your config here
        relative_urls: false,
        file_browser_callback: function(field_name, url, type, win) {
            // trigger file upload form
            if (type == 'image') $('#formUpload input').click();
        }
    });
```

That's all, now you should be able to upload image directly to the editor while writing content.

**You can publish view in case you need to customize in `resources/views` directory**

```
$ php artisan vendor:publish --provider=Petehouston\Tinymce\TinymceServiceProvider
```

### Try example

There is a setup example in the package, you can try in your project by adding a sample route,

```
Route::get('/tinymce_example', function () {
    return view('mceImageUpload::example');
});
```

### Some notes

**The image upload handler**

I setup already a controller [`Petehouston\Tinymce\TinymceController`](https://github.com/petehouston/laravel-tinymce-simple-imageupload/blob/master/src/TinymceController.php) which implements a method for image uploading.

As you can see it will store all uploaded images in `public/img` directory, the name is like a concatenated hash,

```
$filename = 'image_'.time().'_'.$image->hashName();
```

The default route for handling image upload is `/tinymce/simple-image-upload`.

**Customize upload url and controller**

If you don't want to pre-config of the package, make yours.

While including the uploading form, pass in the url of handling post image upload

```
@include('mceImageUpload::upload_form', ['upload_url' => 'YOUR_URL_FOR_HANDLING_IMAGE_UPLOAD'])
```

Add a method for handling image upload that **should return the same result** as in [`Petehouston\Tinymce\TinymceController`](https://github.com/petehouston/laravel-tinymce-simple-imageupload/blob/master/src/TinymceController.php).



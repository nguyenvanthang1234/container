<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">



    <script src="https://cdn.tiny.cloud/1/h2rginht50w8ickwrr7ovmmgx6jdwx2nixnu5ystpbxk17sn/tinymce/6/tinymce.min.js"
        referrerpolicy="origin"></script>
    <script>
      var editor_config = {
    path_absolute : "http://localhost/laravelpro/thangvan.vn/public/",
    selector: 'textarea',
    relative_urls: false,
    height:300,
    plugins: [
      "advlist autolink lists link image charmap print preview hr anchor pagebreak",
      "searchreplace wordcount visualblocks visualchars code fullscreen",
      "insertdatetime media nonbreaking save table directionality",
      "emoticons template paste textpattern",
      'image'
    ],
    toolbar: 'insertfile | undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help | image',

    file_picker_callback : function(callback, value, meta) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = editor_config.path_absolute + 'laravel-filemanager?editor=' + meta.fieldname;
      if (meta.filetype == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.openUrl({
        url : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no",
        onMessage: (api, message) => {
          callback(message.content);
        }
      });
    }
  };

  tinymce.init(editor_config);


    </script>


    <title>Document</title>
</head>

<body>
    <div class="container">

        <h1>them bai viet</h1>

        {{-- @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>

            </div>
        @endif --}}
        {{-- la phan laravelCollection  --}}
        {!! Form::open(['url' => 'post/store', 'method' => 'POST', 'files' => true]) !!}

        <div class="form-group">
            {!! Form::label('title', 'Tiêu đề') !!}
            {!! Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Nhập tiêu đề']) !!}
            @error('title')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror

        </div>

        <div class="form-group">
            {!! Form::label('content', 'Nội dung') !!}
            {!! Form::textarea('content', '', ['class' => 'form-control', 'placeholder' => 'Nhập nội dung']) !!}
            @error('content')
                <small class="form-text text-danger">{{ $message }}</small>
            @enderror

        </div>


        <div class="form-group">
            {!! Form::file('file', ['class' => 'form-control-file']) !!}
        </div>



        <div class="form-group">
            {!! Form::submit('Submit', ['name' => 'sm-add', 'class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}

</body>

</html>

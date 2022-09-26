<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/filepond/css/filepond.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/filepond/css/filepond-image-preview.css') }}">
    <title>Document</title>
</head>
<body>
    <input type="file" name="image[]" id="image" multiple>
</body>
<script src="{{ asset('assets/filepond/js/filepond.min.js') }}"></script>
<script src="{{ asset('assets/filepond/js/filepond-image-preview.min.js') }}"></script>
<script src="{{ asset('assets/filepond/js/filepond-image-exif-orientation.js') }}"></script>

    <script>
        FilePond.registerPlugin(FilePondPluginImageExifOrientation, FilePondPluginImagePreview);
        const inputElement = document.querySelector('#image');
        const pond = FilePond.create( inputElement, {
            imagePreviewHeight: 180,
        });

        FilePond.setOptions({
            server: {
                process: {
                    url: '{{ route('image.store') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    onload: function (responce) {
                        return JSON.parse(responce);
                    },
                },
                revert: {
                    url: '{{ route('image.destroy') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                },
            }
        })
    </script>
</html>
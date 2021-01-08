<script>
  window.addEventListener('DOMContentLoaded', (event) => {
    $('#summernote').summernote({
      height: 300,
      toolbar: [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'strikethrough', 'superscript', 'subscript', 'clear']],
        ['fontname', ['fontname']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ol', 'ul', 'paragraph', 'height']],
        ['insert', ['link', 'img', 'picture', 'table']],
        ['view', ['undo', 'redo', 'fullscreen', 'codeview', 'help']]
      ],
      codemirror: {
        lineWrapping: true,
      },
      callbacks: {
        onImageUpload: function(image) {
          data = new FormData();
          data.append("file", image[0]);
          $.ajax({
            data: data,
            type: "POST",
            url: "/user/uploads/media/",
            cache: false,
            contentType: false,
            processData: false,
            success: function(url) {
              console.log(url);
              var image = $('<img>').attr('src', "/uploads/media/"+url).attr('alt', '');
              $('#summernote').summernote("insertNode", image[0]);
            }
          });
        }
      }
    });
  });
</script>
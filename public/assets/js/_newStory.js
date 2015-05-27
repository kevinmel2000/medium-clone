$(document).ready(function()
{
	var $summernote = $('.summernote');
	$summernote.summernote({
		height: 400,                 // set editor height
		minHeight: 400,             // set minimum height of editor
		maxHeight: null,             // set maximum height of editor

		focus: true,
		toolbar: [
		    //[groupname, [button list]]
		    ['style',['style']],
		    ['insert',['picture','link','video']],
		    ['style', ['bold', 'italic', 'underline', 'clear']],
		    ['font', ['strikethrough', 'superscript', 'subscript']],
		    ['color', ['color']],
		    ['para', ['ul', 'ol', 'paragraph']],
		    ['misc',['fullscreen']],
		  ],
		onImageUpload: function(files) {
		    console.log('image upload:', files);
		    // upload image to server and create imgNode...
		    $summernote.summernote('insertNode', "<img src='http://blog.adeh.in/images/melindah-ratna1432084777.png'/>");
		}
	});
$('.summernote').on('summernote.image.upload', function(customEvent, files) {
  console.log('image upload:', files);
});

});
tinymce.init({
    selector: '.textarea1',
    plugins: [
        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
        'searchreplace wordcount visualblocks visualchars code fullscreen',
        'insertdatetime media nonbreaking save table contextmenu directionality',
        'emoticons template paste textcolor colorpicker textpattern imagetools uploadimage paste formula'
    ],

    toolbar: 'bold italic fontselect fontsizeselect | alignleft aligncenter alignright bullist numlist  backcolor forecolor | formula code | imagetools link image paste ',
    fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt',
    paste_data_images: true,

    images_upload_handler: function(blobInfo, success, failure) {
        success('data:' + blobInfo.blob().type + ';base64,' + blobInfo.base64());
    },
    image_class_list: [{
        title: 'Responsive',
        value: 'img-responsive'
    }],
    setup: function(editor) {
        editor.on('change', function() {
            tinymce.triggerSave();
        });
    }
});

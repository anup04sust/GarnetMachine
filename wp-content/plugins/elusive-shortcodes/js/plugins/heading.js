tinymce.PluginManager.add('els_heading', function(editor, url) {
    editor.addButton('els_heading', {
        tooltip: 'Heading',
        icon: 'bs-heading',
        onclick: function() {
          console.log(url + '/heading.html');
            tinymce.activeEditor.windowManager.open({
                title: 'Heading',
                url: url + '/heading.html',
                width: 480,
                height: 320
            });
        }
    });
});
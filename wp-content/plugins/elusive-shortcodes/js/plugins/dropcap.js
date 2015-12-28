tinymce.PluginManager.add('els_dropcap', function(editor, url) {
    editor.addButton('els_dropcap', {
        tooltip: 'Dropcap',
        icon: 'bs-dropcap',
        onclick: function() {
          console.log(url + '/dropcap.html');
            tinymce.activeEditor.windowManager.open({
                title: 'Dropcap',
                url: url + '/dropcap.html',
                width: 480,
                height: 380
            });
        }
    });
});

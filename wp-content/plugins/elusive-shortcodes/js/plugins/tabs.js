tinymce.PluginManager.add('els_tabs', function(editor, url) {
    editor.addButton('els_tabs', {
        tooltip: 'Tabs',
        icon: 'bs-tabs',
        onclick: function() {
            tinymce.activeEditor.windowManager.open({
                title: 'Tabs',
                url: url + '/tabs.html',
                width: 680,
                height: 320
            });
        }
    });
});
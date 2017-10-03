(function() {
    tinymce.PluginManager.add('cshero_tinymce', function( editor, url ) {
        editor.addButton( 'cshero_tinymce', {
            text: 'CMS Highlight',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'Higlighted Style 1',
                    value: 'cms-higlighted-style1',
                    onclick: function() {
                        editor.insertContent('<span class="'+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<span>');
                    }
                },
                {
                    text: 'Higlighted Style 2',
                    value: 'cms-higlighted-style2',
                    onclick: function() {
                        editor.insertContent('<span class="'+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<span>');
                    }
                },
                {
                    text: 'Higlighted Style 3',
                    value: 'cms-higlighted-style3',
                    onclick: function() {
                        editor.insertContent('<span class="'+this.value()+'">'+tinyMCE.activeEditor.selection.getContent()+'<span>');
                    }
                },
           ]
        });
    });
})();
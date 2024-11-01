(function() {
	tinymce.PluginManager.add('tnp_mce_button', function(ed, url) {
	  ed.addButton('tnp_mce_button', {
				Title : 'ThumbNails PRO',
				Text: 'Insert ThumbNails Pro Shortcode',
	      image : url + '/tnp-icon.png',
	      cmd: 'tnpshortcode'
	  });
	
	  ed.addCommand('tnpshortcode', function() {
			var win=ed.windowManager.open({
		  title: 'Insert TNP Shortcode',
		  body: [{
		      type: 'textbox',
		      name: 'textboxurl',
		      id: 'textboxurlID',
		      label: 'URL to capture',
		      value: getSelectionText()
		  	},
				{
		      type: 'textbox',
		      name: 'textboxsize',
		      id: 'textboxsizeID',
		      label: 'Thumbnail Size',
		      value: thumb_size
		  	}
		  ],	  
		  width: 520,
		  height: 120,
		  onsubmit: function(e) {
					var shortcode = '[tnptag';
					if ( e.data.textboxsize!='' ) shortcode = shortcode + ' size=' + e.data.textboxsize;
					shortcode = shortcode + ']';
					shortcode = shortcode + e.data.textboxurl;
					shortcode = shortcode + '[/tnptag]';
		      ed.insertContent(
		          shortcode
		      );
		  	}
		  });
		});
	});
})();

function getSelectionText() {
    var text = "";
    var activeEl = document.activeElement;
    var activeElTagName = activeEl ? activeEl.tagName.toLowerCase() : null;

    if (activeElTagName == "iframe") {
			var idoc= activeEl.contentDocument || activeEl.contentWindow.document;
			var iwin= activeEl.contentWindow || activeEl.contentDocument.defaultView;

		
			if ( idoc.getSelection ) text = idoc.getSelection().toString();
			if ( ( text=='' ) && ( iwin.getSelection ) ) text=iwin.getSelection().toString();
			
			return text;
		}
		
    if (
      (activeElTagName == "textarea") || (activeElTagName == "input" &&
      /^(?:text|search|password|tel|url)$/i.test(activeEl.type)) &&
      (typeof activeEl.selectionStart == "number")
    ) {
        text = activeEl.value.slice(activeEl.selectionStart, activeEl.selectionEnd);
    } else if (window.getSelection) {
        text = window.getSelection().toString();
    }
    return text;
}


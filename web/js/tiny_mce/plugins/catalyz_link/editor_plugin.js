(function() {
	tinymce.create('tinymce.plugins.catalyz_linkPlugin', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('catalyz_link');

			ed.addCommand('catalyz_link', function() {
				ed.windowManager.open({
					file : url + '/dialog.htm',
					width : 950 + parseInt(ed.getLang('example.delta_width', 0)),
					height : 350 + parseInt(ed.getLang('example.delta_height', 0)),
					inline : 1
				}, {
					plugin_url : url // Plugin absolute URL
				});
			});

			// Register example button
			ed.addButton('catalyz_link', {
				title : "catalyz_link.desc",
				cmd : 'catalyz_link',
				image : url + '/img/link.png'
			});

			ed.onNodeChange.add(function(ed, cm, n, co) {
				cm.setDisabled('catalyz_link', co && n.nodeName != 'A');
				cm.setActive('catalyz_link', n.nodeName == 'A' && !n.name);
			});
		},

		/**
		 * Returns information about the plugin as a name/value array.
		 * The current keys are longname, author, authorurl, infourl and version.
		 *
		 * @return {Object} Name/value array containing information about the plugin.
		 */
		getInfo : function() {
			return {
				longname : 'catalyz_link plugin',
				author : 'Catalyz <sh@catalyz.fr>',
				authorurl : 'http://www.catalyz.fr/',
				infourl : 'http://www.catalyz.fr/',
				version : "1.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('catalyz_link', tinymce.plugins.catalyz_linkPlugin);
})();
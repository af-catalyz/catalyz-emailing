/**
 * $Id: editor_plugin_src.js 201 2007-02-12 15:56:56Z spocke $
 *
 * @author Moxiecode
 * @copyright Copyright © 2004-2008, Moxiecode Systems AB, All rights reserved.
 */

(function() {
	tinymce.create('tinymce.plugins.linknodePlugin', {
		/**
		 * Initializes the plugin, this will be executed after the plugin has been created.
		 * This call is done before the editor instance has finished it's initialization so use the onInit event
		 * of the editor instance to intercept that event.
		 *
		 * @param {tinymce.Editor} ed Editor instance that the plugin is initialized in.
		 * @param {string} url Absolute URL to where the plugin is located.
		 */
		init : function(ed, url) {
			// Register the command so that it can be invoked by using tinyMCE.activeEditor.execCommand('linknode');

			ed.addCommand('linknode', function() {
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
			ed.addButton('linknode', {
				title : 'linknode.desc',
				cmd : 'linknode',
				image : url + '/img/linknode.png'
			});

			ed.onNodeChange.add(function(ed, cm, n, co) {
				cm.setDisabled('linknode', co && n.nodeName != 'A');
				cm.setActive('linknode', n.nodeName == 'A' && !n.name);
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
				longname : 'linknode plugin',
				author : 'Jean Roussel <jroussel@waterproof.fr>',
				authorurl : 'http://www.waterproof.fr/',
				infourl : 'http://www.waterproof.fr/',
				version : "1.0"
			};
		}
	});

	// Register plugin
	tinymce.PluginManager.add('linknode', tinymce.plugins.linknodePlugin);
})();
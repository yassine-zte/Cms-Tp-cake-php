(function(){

	tinymce.create('tinymce.plugins.image',{

		init : function(ed , url){

			ed.addCommand('open_image',function(){
                    //alert(ed.settings.image_explorer);
				
				var el = ed.selection.getNode();
				var url= ed.settings.image_explorer;
				if(el.nodeName == 'IMG'){
                    url= ed.settings.image_edit;
                    url+='?src='+ed.dom.getAttrib(el,'src')+'&alt='+ed.dom.getAttrib(el,'alt')+'&class='+ed.dom.getAttrib(el,'class');
                   }

				ed.windowManager.open({

					//file  : ed.settings.image_explorer,
					file : url,
					id    : 'image',
					width :  1000,
					height:   600,
					inline : true,
					title:'insérer une image'
				   },{
					plugin_url: url
				});
				
              });

			ed.addButton('image',{
				title : 'insérer une image ' ,
				cmd : 'open_image'
			})
		}

	});

	tinymce.PluginManager.add('image',tinymce.plugins.image);

})();
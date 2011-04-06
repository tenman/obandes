
function horizontal(){
var class_list = [];
var uniq = {};
        jQuery('div[class^="horizon"]').each(function(){
                var class_name = this.className;

                if(!uniq[class_name]){
                        uniq[class_name]=true;
                        class_list.push(this.className);
                }
        });
        jQuery(class_list).each(function(i){

          jQuery('div[class="'+ this + '"]').wrap('<td class="' + this + '"></td>');
          jQuery('td[class="'+ this + '"]').wrapAll('<table border="0" width="100%" id="' + this + '" ><tr></tr></table>');

        jQuery('td[class="'+ this + '"]:first').addClass("col1");
        jQuery('td[class="'+ this + '"]:last').addClass("last");		
		jQuery('td[class="'+ this + '"]:nth-child(2)').addClass("col2");
		jQuery('td[class="'+ this + '"]:nth-child(3)').addClass("col3");
		jQuery('td[class="'+ this + '"]:nth-child(4)').addClass("col4");
		jQuery('td[class="'+ this + '"]:nth-child(5)').addClass("col5");

        jQuery('table[class="'+ this + '"]').addClass("DOM");

        });


        jQuery('h2[id^="horizon"]').css("cursor","pointer");

        jQuery('h2[id^="horizon"]').hover(
            function(){
                var target = jQuery(this).attr("id");
                var text = jQuery(this).text();
                jQuery('div.'+target).css("text-decoration", "underline");
        },
            function(){
                var target = jQuery(this).attr("id");
                var text = jQuery(this).text();
                jQuery('div.'+target).css("text-decoration", "none");
        });

        jQuery('h2[id^="horizon"]').click(function(){
            var target = jQuery(this).attr("id");
            var text = jQuery(this).text();
            jQuery('div.'+target).toggle("slow");

        });
		/* for ie8*/
		jQuery('article .content img').removeAttr("height");
}


jQuery(function($){
var class_list = [];
var uniq = {};
        $('div[class^="horizon"]').each(function(){
                var class_name = this.className;

                if(!uniq[class_name]){
                        uniq[class_name]=true;
                        class_list.push(this.className);
                }
        });
        $(class_list).each(function(i){

          $('div[class="'+ this + '"]').wrap('<td class="' + this + '"></td>');
          $('td[class="'+ this + '"]').wrapAll('<table border="0" width="100%" id="' + this + '" summary="layout table"><tr></tr></table>');

        $('td[class="'+ this + '"]:first').addClass("menu");
        $('td[class="'+ this + '"]:last').addClass("aside");
        $('table[class="'+ this + '"]').addClass("DOM");

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
})();

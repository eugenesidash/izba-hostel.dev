;(function ( $, window, document, undefined ){
    var
        pluginName = 'tabulous',
        defaults = {effect: 'scale'};
    // $('<style>body { background-color: red; color: white; }</style>').appendTo('head');
    function Plugin(element,options){
        this.element = element;
        this.$elem = $(this.element);
        this.options = $.extend({},defaults,options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }
    Plugin.prototype = {
        init: function(){
            var links = this.$elem.find('a').not('[target=_blank]');
            var firstchild = this.$elem.find('li:first-child').find('a');
            //var lastchild = this.$elem.find('li:last-child').after('<span class="tabulousclear"></span>');
            var tab_content;
            //
            if (this.options.effect == 'scale'){
                tab_content = this.$elem.find('div').not(':first').not(':nth-child(1)').addClass('hidescale');
            } else if (this.options.effect == 'slideLeft') {
                tab_content = this.$elem.find('div').not(':first').not(':nth-child(1)').addClass('hideleft');
            } else if (this.options.effect == 'scaleUp') {
                tab_content = this.$elem.find('div').not(':first').not(':nth-child(1)').addClass('hidescaleup');
            } else if (this.options.effect == 'flip') {
                tab_content = this.$elem.find('div').not(':first').not(':nth-child(1)').addClass('hideflip');
            }
            var rootdiv = this.$elem.find('.tabs-container:first');
            var firstdivheight = rootdiv.find('div:first').height('200px');
            var alldivs = this.$elem.find('div:first').find('div');
            alldivs.css({'position': 'absolute','top':'0'});
            rootdiv.css('height',firstdivheight+'px');
            firstchild.addClass('tabulous_active');
            links.bind('click', {myOptions: this.options}, function(e){
                e.preventDefault();
                var $options = e.data.myOptions;
                var effect = $options.effect;
                var mythis = $(this);
                var thisform = mythis.parent().parent().parent();
                var thislink = mythis.attr('href');
                rootdiv.addClass('transition');
                links.removeClass('tabulous_active');
                mythis.addClass('tabulous_active');
                var thisdivheight = thisform.find('div'+thislink).height('200px');
                if(effect == 'scale'){
                    alldivs.removeClass('showscale').addClass('make_transist').addClass('hidescale');
                    thisform.find('div'+thislink).addClass('make_transist').addClass('showscale');
                } else if (effect == 'slideLeft') {
                    alldivs.removeClass('showleft').addClass('make_transist').addClass('hideleft');
                    thisform.find('div'+thislink).addClass('make_transist').addClass('showleft');
                } else if (effect == 'scaleUp') {
                    alldivs.removeClass('showscaleup').addClass('make_transist').addClass('hidescaleup');
                    thisform.find('div'+thislink).addClass('make_transist').addClass('showscaleup');
                } else if (effect == 'flip') {
                    alldivs.removeClass('showflip').addClass('make_transist').addClass('hideflip');
                    thisform.find('div'+thislink).addClass('make_transist').addClass('showflip');
                }
                rootdiv.css('height',thisdivheight+'px');
            });
        }
    };
    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function(options){
        return this.each(function(){
            new Plugin(this,options);
        });
    };
})( jQuery, window, document );

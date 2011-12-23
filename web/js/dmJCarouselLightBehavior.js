(function($) {    
    
    var methods = {        
        init: function(behavior) {                       
            var $this = $(this), data = $this.data('dmJCarouselLightBehavior');
            if (data && behavior.dm_behavior_id != data.dm_behavior_id) { // There is attached the same, so we must report it
                alert('You can not attach jCarousel light behavior to same content'); // TODO TheCelavi - adminsitration mechanizm for this? Reporting error
            };
            $this.data('dmJCarouselLightBehavior', behavior);
        },
        
        start: function(behavior) {  
            var $this = $(this);
            // Cycle does not have a good destroy method :(            
            // This is memory mess, so it would be convinient to have view behavior and admin behavior
            var $copy = $this.clone(true, true);
            var $parent = $this.parent();
            $copy.data('dmJCarouselLightBehaviorPreviousDOM', $this.detach());            
            $parent.append($copy);
            $copy.children().wrapAll('<div class="jCarouselLightWrapper"></div>');
            $copy.addClass('jCarouselContainer');
            if (behavior.showNavigation) {
                behavior.btnPrev = $('<div class="jCarouselNavigation previous">prev</div>');                
                behavior.btnNext = $('<div class="jCarouselNavigation next">next</div>');
                $copy.before(behavior.btnPrev);
                $copy.after(behavior.btnNext);
                if (behavior.vertical) $('div.jCarouselNavigation', $copy).addClass('vertical');
                else $('div.jCarouselNavigation', $copy).addClass('horizontal');
            }
            $copy.jCarouselLite(behavior);
        },
        stop: function(behavior) {
            var $this = $(this);
            if (behavior.showNavigation) {
                behavior.btnPrev.remove();                
                behavior.btnNext.remove();
            }
            $this.replaceWith($this.data('dmJCarouselLightBehaviorPreviousDOM'));            
        },
        destroy: function(behavior) {            
            var $this = $(this);
            $this.data('dmJCarouselLightBehavior', null);
            $this.data('dmJCarouselLightBehaviorPreviousDOM', null)
        }
    }
    
    $.fn.dmJCarouselLightBehavior = function(method, behavior){
        
        return this.each(function() {
            if ( methods[method] ) {
                return methods[ method ].apply( this, [behavior]);
            } else if ( typeof method === 'object' || ! method ) {
                return methods.init.apply( this, [method] );
            } else {
                $.error( 'Method ' +  method + ' does not exist on jQuery.dmJCarouselLightBehavior' );
            }  
        });
    };

    $.extend($.dm.behaviors, {        
        dmJCarouselLightBehavior: {
            init: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior, true) + ' ' + behavior.inner_target).dmJCarouselLightBehavior('init', behavior);
            },
            start: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior, true) + ' ' + behavior.inner_target).dmJCarouselLightBehavior('start', behavior);
            },
            stop: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior, true) + ' ' + behavior.inner_target).dmJCarouselLightBehavior('stop', behavior);
            },
            destroy: function(behavior) {
                $($.dm.behaviorsManager.getCssXPath(behavior, true) + ' ' + behavior.inner_target).dmJCarouselLightBehavior('destroy', behavior);
            }
        }
    });
    
})(jQuery);
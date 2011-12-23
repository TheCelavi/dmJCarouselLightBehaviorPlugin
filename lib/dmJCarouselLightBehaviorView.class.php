<?php
/**
 * @author TheCelavi
 */
class dmJCarouselLightBehaviorView extends dmBehaviorBaseView {
    
    public function configure() {
        $this->addRequiredVar(array('mouseWheel', 'auto', 'speed', 'easing', 'vertical', 'circular', 'visible', 'start', 'scroll', 'hoverPause', 'itemWidth', 'itemHeight', 'showNavigation'));
    }

    protected function filterBehaviorVars(array $vars = array()) {
        $vars = parent::filterBehaviorVars($vars);  
        $vars['start'] = $vars['start'] - 1;
        return $vars;
    }
    
    public function getJavascripts() {
        $vars = $this->getBehaviorVars();
        return array_merge(
            parent::getJavascripts(),
            ($vars['mouseWheel']) ? array('dmJCarouselLightBehaviorPlugin.mousewheel') : array(),
            array(
                'lib.easing',                
                'dmJCarouselLightBehaviorPlugin.jcarousellight',
                'dmJCarouselLightBehaviorPlugin.launch'
            )            
        );
    }   
    
}


<?php
/**
 * @author TheCelavi
 */
class dmJCarouselLightBehaviorForm extends dmBehaviorBaseForm {
        
    public function configure() {
        $this->widgetSchema['inner_target'] = new sfWidgetFormInputText();
        $this->validatorSchema['inner_target'] = new sfValidatorString(array(
            'required' => false
        ));
        
        $this->widgetSchema['itemWidth'] = new sfWidgetFormInputText();
        $this->validatorSchema['itemWidth'] = new sfValidatorInteger(array(
            'min'=>100
        ));
        
        $this->widgetSchema['itemHeight'] = new sfWidgetFormInputText();
        $this->validatorSchema['itemHeight'] = new sfValidatorInteger(array(
            'min'=>100
        ));
        
        $this->widgetSchema['mouseWheel'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['mouseWheel'] = new sfValidatorBoolean();
        
        $this->widgetSchema['auto'] = new sfWidgetFormInputText();
        $this->validatorSchema['auto'] = new sfValidatorInteger(array(
            'min'=>500
        ));
        
        $this->widgetSchema['speed'] = new sfWidgetFormInputText();
        $this->validatorSchema['speed'] = new sfValidatorInteger(array(
            'min'=>0
        ));
        
        $this->widgetSchema['easing'] = new dmWidgetFormChoiceEasing();
        $this->validatorSchema['easing'] = new dmValidatorChoiceEasing(array(
            'required' => true
        ));
        
        $this->widgetSchema['vertical'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['vertical'] = new sfValidatorBoolean();
        
        $this->widgetSchema['circular'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['circular'] = new sfValidatorBoolean();
        
        $this->widgetSchema['visible'] = new sfWidgetFormInputText();
        $this->validatorSchema['visible'] = new sfValidatorNumber(array(
            'min'=>1
        ));
        
        $this->widgetSchema['start'] = new sfWidgetFormInputText();
        $this->validatorSchema['start'] = new sfValidatorInteger(array(
            'min'=>1
        ));
        
        $this->widgetSchema['scroll'] = new sfWidgetFormInputText();
        $this->validatorSchema['scroll'] = new sfValidatorInteger(array(
            'min'=>1
        ));   
        
        $this->widgetSchema['hoverPause'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['hoverPause'] = new sfValidatorBoolean();
        
        $this->widgetSchema['showNavigation'] = new sfWidgetFormInputCheckbox();
        $this->validatorSchema['showNavigation'] = new sfValidatorBoolean();
        
        $this->getWidgetSchema()->setLabels(array(
            'auto' => 'Auto scroll interval',
            'speed' => 'Scroll speed',
            'start' => 'Start from',
            'hoverPause' => 'Pause on hover'
        ));
        
        $this->getWidgetSchema()->setHelps(array(
            'mouseWheel'=>'Enable/disable mouse wheel support',            
            'speed' => 'Speed of scrolling in ms',
            'start' => 'Number of starting item',
            'scroll' => 'Number of items to scroll at once',
            'hoverPause' => 'Does mouse hover should pause scrolling if auto scroll is set to true',
            'auto' => 'Interval in ms for auto scroll or 0 for no auto scroll'
        )); 
        if (!$this->getDefault('itemWidth')) $this->setDefault ('itemWidth', 100);
        if (!$this->getDefault('itemHeight')) $this->setDefault ('itemHeight', 100);
        if (!$this->getDefault('mouseWheel')) $this->setDefault ('mouseWheel', true);
        if (!$this->getDefault('auto')) $this->setDefault ('auto', 500);
        if (!$this->getDefault('speed')) $this->setDefault ('speed', 800);
        if (!$this->getDefault('easing')) $this->setDefault ('easing', 'jswing');
        if (!$this->getDefault('vertical')) $this->setDefault ('vertical', false);
        if (!$this->getDefault('circular')) $this->setDefault ('circular', true);
        if (!$this->getDefault('visible')) $this->setDefault ('visible', 1);
        if (!$this->getDefault('start')) $this->setDefault ('start', 1);
        if (!$this->getDefault('scroll')) $this->setDefault ('scroll', 1);
        if (!$this->getDefault('hoverPause')) $this->setDefault ('hoverPause', true);
        if (!$this->getDefault('showNavigation')) $this->setDefault ('showNavigation', true);
        
        parent::configure();
    }
    
}


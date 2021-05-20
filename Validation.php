<?php
    
    /**
     * Validation 
     *
     */
     
    class Validation {
        
        /**
         * @var array $patterns
         */
        public $patterns = array(
            'alpha'         => '[a-zA-Z ]+',
            'int'           => '[0-9]+',
            'email'         => '(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$'
        );
        
        /**
         * @var array $errors
         */
        public $errors = array();
        
        /**
         * 
         * @param string $name
         * @return this
         */
        public function name($name){
            
            $this->name = $name;
            return $this;
        
        }
        
        /**
         * Field Value
         * 
         * @param mixed $value
         * @return this
         */
        public function value($value){
            
            $this->value = $value;
            return $this;
        
        }
        
       
        
        /**
         * Pattern to apply to the recognition
         * of the regular expression
         * 
         * @param string $name nome del pattern
         * @return this
         */
        public function pattern($name){
            
            if($name == 'array'){
                
                if(!is_array($this->value)){
                    $this->errors[] = $this->name.' Invalid.<br />';
                }
            
            }else{
            
                $regex = '/^('.$this->patterns[$name].')$/u';
                if($this->value != '' && !preg_match($regex, $this->value)){
                    $this->errors[] = $this->name.' Invalid.<br />';
                }
                
            }
            return $this;
            
        }
        
        
        
        /**
         * Required field
         * 
         * @return this
         */
        public function required(){
            
            if((isset($this->file) && $this->file['error'] == 4) || ($this->value == '' || $this->value == null)){
                $this->errors[] = $this->name.' Field required<br />.';
            }            
            return $this;
            
        }
         
        /**
         * Validated fields
         * 
         * @return boolean
         */
        public function isSuccess(){
            if(empty($this->errors)) return true;
        }
        
        /**
         * Validation errors
         * 
         * @return array $this->errors
         */
        public function getErrors(){
            if(!$this->isSuccess()) return $this->errors;
        }
        
        /**
         * View errors in Html format
         * 
         * @return string $html
         */
        public function displayErrors(){
            
                foreach($this->getErrors() as $error){
                    $html = $error.'<br>';
                }
            return $html;
            
        }
        
        /**
         *
         * @return booelan|string
         */
        public function result(){
            
            if(!$this->isSuccess()){
               
                foreach($this->getErrors() as $error){
                    echo "$error\n";
                }
                exit;
                
            }else{
                return true;
            }
        
        }
        
        /**
         * Integer
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_int($value){
            if(filter_var($value, FILTER_VALIDATE_INT)) return true;
        }
        
        
        /**
         * 
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_alpha($value){
            if(filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z ]+$/")))) return true;
        }
        
        /**
         * e-mail
         *
         * @param mixed $value
         * @return boolean
         */
        public static function is_email($value){
           // if(filter_var($value, FILTER_VALIDATE_EMAIL)) return true;
            if(filter_var($value, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => "/^[a-zA-Z ]+$/")))) return true;
        }
        
    } 
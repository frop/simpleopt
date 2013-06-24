<?php

class SimpleOpt{
    private $options;

    public function __construct($shortopts, array $longopts){
        $this->options = getopt($shortopts, $longopts);
    }
    
    final function getOption($opt, $default, $required = false){
        if (isset($this->options[$opt])){
            return $this->options[$opt];
        }else{
            if ($required){
                die("-$opt is required\n");
            }else{
                return $default;
            }
        }
    }

    final function getRequiredOption($opt){
        return $this->getOption($opt, NULL, true);
    }
}


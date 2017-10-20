# custom-policy-example-bundle

This repository contains example of integration the custom policy with UI for eZ Platform v1.X and v2.X. 

## Installation

1. Add the following repository to `composer.json`:
```json
"repositories": [
    { 
        "type": "vcs", 
        "url": "https://github.com/adamwojs/custom-policy-example-bundle.git" 
    }
]
```
2. Require the bundle with composer 
```shell
composer require "adamwojs/custom-policy-example-bundle" "dev-master"
```
3. Enable the bundle in the kernel:

```php
<?php
// app/AppKernel.php

public function registerBundles()
{
    $bundles = array(
        // ...
        new AdamWojs\CustomPolicyExampleBundle\CustomPolicyExampleBundle(),  
        // ...
    );
    
    // ...
}
```

4. Done. In the "Add a new policy" form you will be able to select "Custom module / Custom function" 

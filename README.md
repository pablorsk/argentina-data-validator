# Argentina Data Validator

Validate Argentina CBU and CUIT/CUIL

## Installation

Add the ArgentinaDataGenerator library to your `composer.json` file:

    composer require pablorsk/argentina-data-validator --dev

## Usage

### Without framework

    <?php
    echo \ArgentinaDataValidator\Cuit::isValid(20305423174)) ? 'valido' : 'no valido';  // valido
    
### Laravel

    <?php
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'cuit' => 'cuit',
        ]);
    
        // The entity post is valid...
    }

<?php

// Define the base path for the Twig files
$baseDir = __DIR__ . '/resources/views/partials/form-elements';

// Ensure the directory exists
if (!is_dir($baseDir)) {
    mkdir($baseDir, 0755, true);
}

// Define the Twig file contents
$twigFiles = [
    'input-default.twig' => <<<EOT
<div class="form-group">
    <input type="text" class="form-control input-default" placeholder="input-default">
</div>
EOT,
    'input-rounded.twig' => <<<EOT
<div class="form-group">
    <input type="text" class="form-control input-rounded" placeholder="input-rounded">
</div>
EOT,
    'textarea.twig' => <<<EOT
<div class="form-group">
    <textarea class="form-control" rows="4" id="comment"></textarea>
</div>
EOT,
    'input-size.twig' => <<<EOT
<div class="form-group">
    <input class="form-control form-control-lg" type="text" placeholder="form-control-lg">
</div>
<div class="form-group">
    <input class="form-control" type="text" placeholder="Default input">
</div>
<div class="form-group">
    <input class="form-control form-control-sm" type="text" placeholder="form-control-sm">
</div>
EOT,
    'select-size.twig' => <<<EOT
<div class="form-group">
    <select class="form-control form-control-lg">
        <option>Option 1</option>
        <option>Option 2</option>
        <option>Option 3</option>
    </select>
</div>
<div class="form-group">
    <select class="form-control">
        <option>Option 1</option>
        <option>Option 2</option>
        <option>Option 3</option>
    </select>
</div>
<div class="form-group">
    <select class="form-control form-control-sm">
        <option>Option 1</option>
        <option>Option 2</option>
        <option>Option 3</option>
    </select>
</div>
EOT,
    'horizontal-form.twig' => <<<EOT
<div class="form-row">
    <div class="form-group col-md-6">
        <label>First Name</label>
        <input type="text" class="form-control" placeholder="First Name">
    </div>
    <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" class="form-control" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
        <label>Password</label>
        <input type="password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group col-md-6">
        <label>City</label>
        <input type="text" class="form-control" placeholder="City">
    </div>
</div>
EOT,
    'vertical-form.twig' => <<<EOT
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="email" class="form-control" placeholder="Email">
    </div>
</div>
<div class="form-group row">
    <label class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" placeholder="Password">
    </div>
</div>
EOT,
    'readonly.twig' => <<<EOT
<div class="form-group">
    <input class="form-control" type="text" placeholder="Readonly input here…" readonly>
</div>
EOT,
    'checkboxes.twig' => <<<EOT
<div class="form-group">
    <div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" id="check1" checked>
        <label class="form-check-label" for="check1">Option 1</label>
    </div>
    <div class="form-check mb-2">
        <input type="checkbox" class="form-check-input" id="check2">
        <label class="form-check-label" for="check2">Option 2</label>
    </div>
</div>
EOT,
    'radio-buttons.twig' => <<<EOT
<div class="form-group">
    <div class="radio">
        <label><input type="radio" name="optradio"> Option 1</label>
    </div>
    <div class="radio">
        <label><input type="radio" name="optradio"> Option 2</label>
    </div>
</div>
EOT,
    'form-grid.twig' => <<<EOT
<div class="row">
    <div class="col-sm-6">
        <input type="text" class="form-control" placeholder="First name">
    </div>
    <div class="col-sm-6 mt-2 mt-sm-0">
        <input type="text" class="form-control" placeholder="Last name">
    </div>
</div>
EOT,
    'input-group.twig' => <<<EOT
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">@</span>
    </div>
    <input type="text" class="form-control" placeholder="Username">
</div>
EOT,
    'custom-select.twig' => <<<EOT
<div class="form-group">
    <label>Custom Select</label>
    <select class="custom-select">
        <option selected>Choose...</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
    </select>
</div>
EOT,
];

// Write each file to the directory
foreach ($twigFiles as $filename => $content) {
    file_put_contents("$baseDir/$filename", $content);
}

echo "Twig files created successfully in $baseDir\n";

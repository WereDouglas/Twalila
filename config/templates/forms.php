<?php
/**
 * Created by PhpStorm.
 * User: Douglas
 * Date: 05/29/21
 * Time: 10:01 AM
 */

return [
    'inputContainer' => '<div class="px-1"><div class="form-group">{{content}}</div></div>',
    'input' => '<input class="form-control" type="{{type}}" name="{{name}}" data-error-message="{{customValidityMessage}}" {{attrs}}/>',
    'error' => '<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><i class="material-icons">close</i></button><span><b> Danger - </b>{{content}}</span></div>',
    'errorList' => '<ul>{{content}}</ul>',
    'errorItem' => '<li>{{text}}</li>',
    'inputSubmit' => '<input class="button" type="{{type}}" {{attrs}}/>',
    'submitContainer' => '<div class="property-submit-button">{{content}}</div>',
    'select' => '<div class="input-box"><select class="select single-select" name="{{name}}"{{attrs}}>{{content}}</select></div>',
    'option' => '<option value="{{value}}"{{attrs}}>{{text}}</option>',
    'optgroup' => '<optgroup label="{{label}}"{{attrs}}>{{content}}</optgroup>',
    'selectMultiple' => '<select class="form-control" name="{{name}}[]" multiple="multiple"{{attrs}}>{{content}}</select>',
    'textarea' => '<textarea class="form-control" rows="5" name="{{name}}"{{attrs}}>{{value}}</textarea>',
    'checkbox' => '<input type="checkbox" name="{{name}}" value="{{value}}"{{attrs}}>',
    'radio' => '<input class="mx-2" type="radio" name="{{name}}" value="{{value}}"{{attrs}}>',
    'radioWrapper' => '<div class="btn-group mr-3">{{label}}</div>',
    'file' => '<input class="form-control" type="file" name="{{name}}"{{attrs}}>'
];


<?php
$fields = ['markup', 'code', 'fileName', 'content'];
foreach ($fields as $field) {
    if (array_key_exists($field, $_POST)) {
        $templateData[$field] = Request::input($field);
    }
}



    protected function resolveTypeClassName($type)
    {
        $types = [
            'page'    => '\Cms\Classes\Page',
            'partial' => '\Cms\Classes\Partial',
            'layout'  => '\Cms\Classes\Layout',
            'content' => '\Cms\Classes\Content',
            'asset'   => '\Cms\Classes\Asset',
        ];

        if (!array_key_exists($type, $types)) {
            throw new ApplicationException(trans('cms::lang.template.invalid_type'));
        }

        return $types[$type];
    }


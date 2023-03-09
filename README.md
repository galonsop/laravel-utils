
## Laravel Utilities
Author: Germán Alonso Pérez [g.alonso.per@gmail.com](mailto:g.alonso.per@gmail.com)

## Usage
If you need to use DataTable, you would need to include the DataTable scripts for this package to work. There is a view that includes them:
```

```
Inject this object to your view, customizing its parameters:
```
$dataTables_config = [
    [
    'selector' => '.data-table',
    'url' => route('url'),
    'columns' => [
            ['data' => 'id', 'name' => 'id', 'th' => 'No'],
            ['data' => 'name', 'name' => 'name', 'th' => 'Name'],
            ['data' => 'email', 'name' => 'email', 'th' => 'Email'],
            ['data' => 'group_name', 'name' => 'group_name', 'th' => 'Group'],
            ['data' => 'country', 'name' => 'country', 'th' => 'Country', 'orderable' => "false"],
            ['data' => 'organization', 'name' => 'organization', 'th' => 'Organization', 'orderable' => "false"],
            ['data' => 'action', 'name' => 'action', 'orderable' => "false", 'searchable' => "false",
            'th' => 'Actions', 'th_width' => '100px'],
        ]
    ]
];
```
In your main view, just before the </body> tag, include the script view:
```
@include('datatable-utilities:script')
```

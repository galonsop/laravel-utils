<div class="table-responsive">
    <table class="table table-bordered data-table">
        <thead>
        <tr>
            @foreach($dataTable['columns'] as $column)
                <th {{ isset($column['th_width']) ? "width={$column['th_width']}" : "" }} >
                    {{ $column['th'] }}
                </th>
            @endforeach
        </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>

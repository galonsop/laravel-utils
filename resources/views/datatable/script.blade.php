@isset($dataTables_config)
    <script type="text/javascript">
        var dataTables = []
        $(function () {
            let index = 0;
            @foreach($dataTables_config as $dataTable)
            var columns = [];

            @foreach($dataTable['columns'] as $column)
            var column = {};
            @foreach($column as $key => $value)
                    @if($value == "true")
                column["{{ $key }}"] = true;
            @elseif($value == "false")
                column["{{ $key }}"] = false;
            @else
                column["{{ $key }}"] = "{{ $value }}";
            @endif
            @endforeach
            columns.push(column);
            @endforeach
            var table = $('{{ $dataTable['selector'] }}').eq(index).DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ $dataTable['url'] }}",
                columns: columns
            });
            dataTables.push(table);
            index += 1;
            @endforeach

        });
    </script>

@endisset
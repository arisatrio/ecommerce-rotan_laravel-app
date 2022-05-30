<div>
    <table id="datatables" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 5%;">#</th>
                {{ $columns }}
                <th style="width: 15%;">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    @push('css-script')
        <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
    @endpush
    @push('js-script')
        <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    @endpush
</div>
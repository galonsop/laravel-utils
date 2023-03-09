@if (session()->has('success'))
    <div class="p-3">
        <div class="alert alert-success">
            <ul>
                <li>{{ session()->get('success') }}</li>
            </ul>
        </div>
    </div>
@endif

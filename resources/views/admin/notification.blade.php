@if (Session::has('success'))

<div class="alert alert-success">
    <p>{{session('success')}}</p>
</div>

@push('scripts')
<script>
    toastr.options = { "progressBar": true, "closeButton": true };
    toastr.success("{{ Session::get('success') }}", "Notification", {timeout: 5000});
</script>
@endpush

@endif

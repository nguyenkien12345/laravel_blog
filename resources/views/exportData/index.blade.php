<form action="{{url('upload-csv')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="file" name="file"><br>
    <input type="submit" value="Import CSV" name="import_csv" class="btn btn-warning">
</form>

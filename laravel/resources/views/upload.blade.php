	



	<form action="{{ route('contoh_upload') }}" method="post" enctype="multipart/form-data">
        <input type="file" name="file_upload" id="file_upload">
        <input type="submit" value="Upload" name="submit">
        <input type="hidden" value="{{ csrf_token() }}" name="_token">
    </form>
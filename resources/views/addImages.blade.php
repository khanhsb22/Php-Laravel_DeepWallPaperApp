<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="content">
        <h3>Add new images</h3>
        <br>
        <form style="margin-top: 20px;" action="addImageFile" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="allFiles[]" multiple />
            <br>
            <label for="">Choose a category:</label>

            <select name="categorys" id="">
                @foreach ($data as $item)
                    <option value="{{ $item->name }}">{{ $item->name }}</option>
                @endforeach
            </select>

            <br><br>

            <button style="margin-top: 20px;" type="submit" name="add" class="btn btn-success">Add</button>
            <button style="margin-top: 20px;" type="submit" name="continue" class="btn btn-warning">Continue</button>
            <button style="margin-top: 20px;" type="submit" name="homepage" class="btn btn-danger">Home page</button>
            
        </form>
        
        @if ($success == "true")
        <br>
            {{ "Add all field success !" }}
        @endif
       

    </div>

</body>

<style>
    .content {
        max-width: 1000px;
        margin: auto;
    }
</style>

</html>

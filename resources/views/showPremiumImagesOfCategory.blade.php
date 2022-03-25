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
    @php
        $count = 0;
    @endphp
    <div>
        <div class="div1">
            <h3>All Premium Image Of Category "{{ $name }}"</h3>
        </div>
        <div class="div2">
            <p id="array_length"></p>
            <a href="#" class="btn btn-success" id="delete">Delete images selected</a>
        </div>
        <div class="div3">
            @foreach ($data as $item)
                <div class="div4">
                    <img src="{{ url('image_app/' . $item['filename']) }}" alt="Empty" width="150" height="200" />
                    <br>
                    <input class="chk1" type="checkbox" value="{{ $item['id'] }}">
                    <label for="">{{ $item['id'] }}</label>
                </div>
            @endforeach
        </div>

        {{-- Jquery --}}
        <script>
            $('input[class^="chk"]').click(function() {
                // For int array
                var arr = getValueForLength();
                $('#array_length').html('You selected: ' + arr.length);
                console.log(arr);

                // For json
                var data = getValue();
                console.log(data);
            })

            function getValueForLength() {
                var chkArray = [];
                var data = {};
                $('input[class^="chk"]:checkbox:checked').each(function(i) {
                    chkArray[i] = parseInt($(this).val());
                });
                return chkArray;
            }

            function getValue() {
                var data = [];
                $('input[class^="chk"]:checkbox:checked').each(function(i) {
                    item = {};
                    item["id"] = parseInt($(this).val());
                    data.push(item);
                });
                return data;
            }

            $('#delete').click(function() {
                var data = getValue();
                const myJSON = JSON.stringify(data); // convert jsonarray jquery to string
                console.log(myJSON);

                $(this).attr("href", "http://localhost:8000/deletePremiumItems/" + myJSON);
            })
        </script>
    </div>
</body>

<style>
    .div1 {
        padding: 16px;
        float: left;
        width: 50%;
        /* background-color: rgb(53, 16, 187); */
    }

    .div2 {
        padding-top: 28px;
        padding-right: 16px;
        text-align: right;
        float: right;
        width: 50%;
        /* background-color: rgb(21, 180, 127); */
    }

    .div3 {
        text-align: center;
        width: 100%;
        margin-top: 50px;
        display: inline-block;
    }

    .div4 {
        width: 20%;
        float: left;
    }

    input[type=checkbox] {
        margin: 10px;
        transform: scale(1.7);
    }

</style>


</html>

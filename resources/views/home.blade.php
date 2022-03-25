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

    <div style="display: flex">
        <h1 style="margin: 30px;">All Category</h1>
        <a href="createNewCategory" class="btn btn-primary" id="a1">
            Create new category
        </a>
        <a href="addImages" class="btn btn-warning" id="a1">
            Add new images
        </a>
        <a href="addPremiumImages" class="btn btn-danger" id="a1">
            Add new premium images
        </a>
        <a href="/logout" class="btn btn-info" id="a1">
            Logout
        </a>
    </div>
    
    @php
        $count = 0;
    @endphp

    <div class="main_div">
        
        @foreach ($categorys as $item)
            @php
                $count++;
            @endphp
            <a href="/showImagesOfCategory/{{ $item['name'] }}" class="btn btn-success" id="a_category">{{ $item['name'] }}</a>
            @php
                if ($count % 5 == 0) {
                    echo '</br></br>';
                }
            @endphp
        @endforeach
    </div>

    @php
        $count_2 = 0;
    @endphp

    <div class="main_div_2">
        
        @foreach ($categorys as $item)
            @php
                $count_2++;
            @endphp
            <a href="/showPremiumImagesOfCategory/{{ $item['name'] }}" 
            class="btn btn-info" id="a_premium_category">{{ $item['name'] }} <br>premium</a>
            @php
                if ($count_2 % 5 == 0) {
                    echo '</br></br>';
                }
            @endphp
        @endforeach
    </div>


</body>

</html>

<style>
    #a_category {
        width: 100px;
        height: 100px;
        padding-top: 35px;
        margin-right: 20px;
    }

    #a_premium_category {
        width: 100px;
        height: 100px;
        padding-top: 30px;
        margin-right: 20px;
    }

    .main_div {
        display: table;
        margin: 0 auto;
        margin-top: 50px;
    }

    .main_div_2 {
        display: table;
        margin: 0 auto;
        margin-top: 50px;
        padding-bottom: 50px;
    }

    #a1 {
        height: 40px; 
        display: inline-block; 
        padding-top: 8px;
        margin-top: 27px;
        margin-left: 30px;
    }


</style>

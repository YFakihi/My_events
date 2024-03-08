{{-- 


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .content-container {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="content-container">
      <div class="flex font-sans">
       
        <h1 class="flex-auto font-medium text-slate-900">
            {{ $event->title }}
        </h1>
        <div class="content-container">
          <div class="description-container w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
              {{ $event->description }}
          </div>
  
          @if(strlen($event->description) > 50)
              <p class="read-more-link" onclick="toggleDescription()">Read more</p>
          @endif
      </div><br>
        <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
            {{ $event->address }}
        </div><br>
        <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
            {{ $event->date }}
        </div><br>
        <div class="w-full flex-none mt-2 order-1 text-3xl font-bold text-violet-600">
            {{ $event->capacity }}
        </div>
            
          
          </div>
       
         <form action="{{ route('events.bookNow', ['eventId' => $event->id]) }}" method="POST">
            @csrf
            <div class="flex space-x-4 mb-5 text-sm font-medium">
                <div class="flex-auto flex space-x-4">
                    <button class="h-10 px-6 font-semibold rounded-full bg-violet-600 text-white" type="submit">
                        Reserve now
                    </button>
                </div>
            </div>
        </form>
      </div>
    </div>
</body>
</html> --}}

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <style>
        body{background-color: rgb(71, 179, 182)}.card{border:none}.product{background-color: #eee}.brand{font-size: 13px}.act-price{color:red;font-weight: 700}.dis-price{text-decoration: line-through}.about{font-size: 14px}.color{margin-bottom:10px}label.radio{cursor: pointer}label.radio input{position: absolute;top: 0;left: 0;visibility: hidden;pointer-events: none}label.radio span{padding: 2px 9px;border: 2px solid #ff0000;display: inline-block;color: #ff0000;border-radius: 3px;text-transform: uppercase}label.radio input:checked+span{border-color: #ff0000;background-color: #ff0000;color: #fff}.btn-danger{background-color: #ff0000 !important;border-color: #ff0000 !important}.btn-danger:hover{background-color: #da0606 !important;border-color: #da0606 !important}.btn-danger:focus{box-shadow: none}.cart i{margin-right: 10px}
    </style>
    <div class="container mt-5 mb-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="images p-3">
                                <div class=" text-center"> 
                                    <img src="{{asset('images/even.jpg')}}" alt="test" width="420">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="product p-4">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div>
                                </div>
                                <div class="mt-4 mb-3"> <span class="text-uppercase text-muted brand">Orianz</span>
                                    <h5 class="text-uppercase">Men's slim fit t-shirt</h5>
                                    <div class="price d-flex flex-row align-items-center"> <span class="act-price">$20</span>
                                    </div>
                                </div>
                                <p class="about">Shop from a wide range of t-shirt from orianz. Pefect for your everyday use, you could pair it with a stylish pair of jeans or trousers complete the look.</p>
                              
                                <form action="{{ route('events.bookNow', ['eventId' => $event->id]) }}" method="POST">
                                    @csrf
                                    <div class="flex space-x-4 mb-5 text-sm font-medium">
                                        <div class="flex-auto flex space-x-4">
                                            <button style="border-radius: 999px; padding: 10px 20px; background-color:rgb(71, 179, 182); color:#fff; font-weight: bold;">Save Changes</button>
                                        </div>
                                    </div>
                                </form>       
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    function change_image(image){

var container = document.getElementById("main-image");

container.src = image.src;
}



document.addEventListener("DOMContentLoaded", function(event) {







});
</script>
</html>

@extends("layout.layout")
@section('content')  
        <div class="relative  items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
          <h1>how you doing</h1>
          <p>{{$type}} - {{$base}} -{{$cooking}}</p>

          @if ($cooking > 5)
            <p>this pizza is expensive</p>

            @elseif ($cooking < 15)
             <p>i go buy</p>
         
          @endif
                        
        </div>
        @endsection
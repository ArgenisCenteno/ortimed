@extends('layouts.app')

@section('content')
<section class="content">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{$producto->nombre}}</h3>

                    <div class="col-12 ">
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                                @foreach ($producto->imagenes as $imagen)
                                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                        <img class="d-block w-100" src="{{ asset($imagen->url) }}" alt="Product Image">
                                    </div>
                                @endforeach                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleSlidesOnly" role="button"
                                data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleSlidesOnly" role="button"
                                data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>


                    </div>

                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">L{{$producto->nombre}}</h3>
                    <p>{{$producto->descripcion}}</p>
                    <hr>
                    <h4>{{$producto->subcategoria->categoria->nombre}}</h4>

                    <h4 class="mt-3"><small>{{$producto->subcategoria->nombre}}</small></h4>

                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                            {{$producto->precio_venta}}
                        </h2>
                        <h4 class="mt-0">
                            <small>{{$producto->precio_venta}} </small>
                        </h4>
                    </div>
                    <div class="mt-4">
                        <form action="{{ route('carrito.agregar', $producto->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-lg btn-flat">
                                <i class="fas fa-cart-plus fa-lg mr-2"></i>
                                Agregar a carrito
                            </button>
                        </form>

                    </div>
                    <div class="mt-4 product-share">
                        <a href="#" class="text-gray">
                            <i class="fab fa-facebook-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fab fa-twitter-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-envelope-square fa-2x"></i>
                        </a>
                        <a href="#" class="text-gray">
                            <i class="fas fa-rss-square fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
            {{-- <div class="row mt-4">
                <nav class="w-100">
                    <div class="nav nav-tabs" id="product-tab" role="tablist">
                        <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc"
                            role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                        <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                            href="#product-comments" role="tab" aria-controls="product-comments"
                            aria-selected="false">Comments</a>
                        <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating"
                            role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
                    </div>
                </nav>
                <div class="tab-content p-3" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                        aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices
                        posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a
                        eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel.
                        Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed
                        venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus.
                        Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit
                        mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies
                        neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc
                        vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros,
                        vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus.
                    </div>
                    <div class="tab-pane fade" id="product-comments" role="tabpanel"
                        aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed
                        condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut
                        commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis
                        elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare,
                        eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod
                        lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget,
                        ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui.
                        Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
                    <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab">
                        Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean
                        elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque.
                        Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod
                        neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh
                        rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl.
                        Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit,
                        at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta
                        lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper.
                        Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
                </div>
            </div>--}}
        </div>

    </div>

</section>

@endsection
@include('layout.script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('js/adminlte.js') }}"></script>
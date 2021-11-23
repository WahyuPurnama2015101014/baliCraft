<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BaliCraft</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body style="background: url(img/bg.jpg);" class="bg-gray-400 font-sans leading-normal tracking-normal">
    <!--Nav-->
    <nav class="bg-gray-800 p-2 mt-0 w-full">
        <!-- Add this to make the nav fixed: "fixed z-10 top-0" -->
        <div class="container mx-auto flex flex-wrap items-center">
            <div class="flex w-full md:w-1/2 justify-center md:justify-start text-white font-extrabold">
                <img src="{{ asset('img/Picture1.png') }}" width="50" alt="logo">
                <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                    <span class="text-2xl pl-2"><i class="em em-grinning"></i> BaliCraft</span>
                </a>
            </div>
            <div class="flex w-full pt-2 content-center justify-between md:w-1/2 md:justify-end">
                <ul class="list-reset flex justify-between flex-1 md:flex-none items-center">
                    <li class="mr-3">
                        <a class="inline-block py-2 px-4 text-white no-underline" href="#">Home</a>
                    </li>
                    <!-- <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">Galeri Kerajinan</a>
                    </li> -->
                    <li class="mr-3">
                        <a class="inline-block text-gray-600 no-underline hover:text-gray-200 hover:text-underline py-2 px-4" href="#">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Hero-->
    <div class="hero flex flex-col container mx-auto items-center my-12 md:my-24">
        <!--Left Col-->
        <div class="flex flex-row w-full justify-center pt-12 pb-10">
            <img src="{{ asset('img/Picture1.png') }}" width="200" alt="logo">
            <a class="text-white no-underline hover:text-white hover:no-underline" href="#">
                <span class="text-9xl pl-2"> <b>BaliCraft</b></span>
            </a>
            <!-- <button class="bg-transparent hover:bg-gray-900 text-gray-900 hover:text-white rounded shadow hover:shadow-lg py-2 px-4 border border-gray-900 hover:border-transparent">Super Button</button> -->
        </div>
        <span class="text-white text-5xl pl-2 mb-10"> <b>Kumpulan karya kerajinan Bali</b></span>
        <span class=" pl-2 mb-10"></span>
        <span class=" pl-2 mb-10"></span>
    </div>

    <!--Container-->
    <div class="bg-gray-600 h-auto flex flex-col">
        <div class="flex flex-row">
            @foreach($barang as $b)
            <div class="container flex flex-col mx-auto pt-24 md:pt-16 px-6">
                <div class="rounded-lg w-96 h-96 block" style="background-image: url(storage/{{$b->gambar}});background-size:cover;"></div>
                <h5>{{$b->nama_kerajinan}}</h5>
                <!-- <p>Harga : Rp. //{{$b->harga}}</p>
                <p>Bahan : //{{$b->bahan}}</p>
                <p>//{{$b->keterangan}}</p> -->
            </div>
            @endforeach
        </div>
        <div class="flex flex-row">
            @foreach($barang as $b)
            <div class="container flex flex-col mx-auto pt-24 md:pt-16 px-6">
                <div class="rounded-lg w-96 h-96 block" style="background-image: url(storage/{{$b->gambar}}); background-size:cover;"></div>
                <h5>{{$b->nama_kerajinan}}</h5>
                <!-- <p>Harga : Rp. //{{$b->harga}}</p>
                <p>Bahan : //{{$b->bahan}}</p>
                <p>//{{$b->keterangan}}</p> -->
            </div>
            @endforeach
        </div>
        <div class="m-4"> {{$barang->links()}} </div>
    </div>
    <!--footer-->
    <div class=" bg-black w-screen h-auto flex ">
        <span class="text-white text-1xl pl-2 mb-10">copyrights @BaliCraft</span>
    </div>
</body>

</html>
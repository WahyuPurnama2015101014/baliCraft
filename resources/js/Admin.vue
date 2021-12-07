<template>
    <div>
    <div class="w-full ">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-compass mr-3"></i> {{$title}}
        </p>
    </div>
    <div class="w-full flex">
        <table class=" bg-white">
            <tr>
                <td>Jumlah barang saat ini</td>
                <td>:</td>
                <td>{{$jB}}</td>
            </tr>
            <tr>
                <td>Jumlah pengrajin saat ini</td>
                <td>:</td>
                <td>{{$jP}}</td>
            </tr>
        </table>
        <div class="flex ml-3">
            <a href="{{route('brg.create')}}">
                <button class="w-full bg-green-600 text-white font-semibold py-2 mr-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i> Tambah Data Barang
                </button>
            </a>
            <a href="{{route('peng.create')}}">
                <button class="w-full bg-green-600 text-white font-semibold py-2 ml-1 rounded-lg shadow-lg hover:shadow-xl hover:bg-gray-300 hover:text-black flex items-center justify-center">
                    <i class="fas fa-plus mr-3"></i> Tambah Data Pengrajin
                </button>
            </a>
        </div>
    </div>
    </div>
</template>
